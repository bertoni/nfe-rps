<?php

namespace NfeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Yaml\Yaml;
use NfeBundle\Entity\LoteRps;
use NfeBundle\Entity\Rps;
use NfeBundle\Business\FileRpsProcess;
use NfeBundle\Business\ReturnRpsProcess;

class LoteRPSController extends Controller
{
    public function listagemAction(Request $Request)
    {
        return $this->render('NfeBundle:Page:lote-rps-listagem.html.twig');
    }

    public function listagemPaginacaoAction($page, Request $Request)
    {
      $qtd_per_page = 20;
      $search_begin = ($page < 2 ? 0 : (($page-1) * $qtd_per_page));
      $content      = '';
      $twig         = $this->container->get('templating');

      $LotesRps = $this->getDoctrine()
          ->getRepository('NfeBundle:LoteRps')
          ->findBy(array(), array('id_lote_rps' => 'DESC'), $qtd_per_page, $search_begin);
      if (is_array($LotesRps) && count($LotesRps)) {
          foreach ($LotesRps as $LoteRps) {
              $loterps = array(
                  'id_lote_rps'          => $LoteRps->getIdLoteRps(),
                  'enviado'              => $LoteRps->getEnviado(),
                  'data_cadastro'        => $LoteRps->getDataCadastro()->format('d/m/Y H:i:s'),
                  'data_periodo_inicial' => ($LoteRps->getDataPeriodoInicial() instanceof \DateTime
                      ? $LoteRps->getDataPeriodoInicial()->format('d/m/Y H:i:s') : ''),
                  'data_periodo_final'   => ($LoteRps->getDataPeriodoFinal() instanceof \DateTime
                      ? $LoteRps->getDataPeriodoFinal()->format('d/m/Y H:i:s') : ''),
                  'valor_total'          => $LoteRps->getValorTotal(),
                  'valor_deducao'        => $LoteRps->getValorDeducao(),
                  'valor_iss'            => $LoteRps->getValorIss(),
                  'valor_credito'        => $LoteRps->getValorCredito()
              );
              $content .= $twig->render('NfeBundle:Include:lote-rps-linha.html.twig', array('lote' => $loterps));
          }
      }

      return new Response($content, 200);
    }

    public function criarAction(Request $Request)
    {
        $return = array('message' => '');
        $Rps = $this->getDoctrine()
            ->getRepository('NfeBundle:Rps')
            ->getRpsWithoutLote();

        if (is_array($Rps) && count($Rps)) {
            $LoteRps = new LoteRps();
            $LoteRps->setEnviado(0)
                ->setDataCadastro(new \DateTime());

            try {
                $this->getDoctrine()->getManager()->persist($LoteRps);
                $this->getDoctrine()->getManager()->flush();
            } catch (\Exception $e) {
                $return['message'] = 'Não foi possível gerar o lote';
                return new JsonResponse($return, 400);
            }

            foreach ($Rps as $rps) {
                $rps->setIdLoteRps($LoteRps->getIdLoteRps());
            }

            try {
                $this->getDoctrine()->getManager()->flush();

                $return['message'] = 'Lote ' . $LoteRps->getIdLoteRps() . ' gerado com sucesso';
                return new JsonResponse($return, 200);
            } catch (\Exception $e) {
                $this->getDoctrine()->getManager()->remove($LoteRps);
                $this->getDoctrine()->getManager()->flush();

                $return['message'] = 'Não foi possível gerar o lote';
                return new JsonResponse($return, 400);
            }
        }

        $return['message'] = 'Não há RPS para ser gerado o lote';
        return new JsonResponse($return, 400);
    }

    public function arquivoAction($id, Request $Request)
    {
        $return = array('message' => '');

        $LoteRps = $this->getDoctrine()
            ->getRepository('NfeBundle:LoteRps')
            ->find($id);

        if (!$LoteRps instanceof loteRps) {
            $return['message'] = 'Lote não encontrado';
            return new JsonResponse($return, 400);
        }

        if (is_file(__DIR__ . '/../Resources/public/upload/loterps/' . $id . '.txt')) {
            $return['message'] = 'Lote encontrado com sucesso';
            $return['link']    = '/bundles/nfe/upload/loterps/' . $id . '.txt?time=' . time();
            return new JsonResponse($return, 200);
        }

        $FileRpsProcess = new FileRpsProcess();

        try {
            $FileRpsProcess->generateFileRps(
                $LoteRps,
                __DIR__ . '/../Resources/public/upload/loterps/' . $id . '.txt',
                Yaml::parse(file_get_contents(__DIR__ . '/../Resources/config/file_rps.yml')),
                $this->getDoctrine()->getManager(),
                $this->get('logger')
            );
        } catch (\Exception $e) {
            $return['message'] = $e->getMessage();
            return new JsonResponse($return, 400);
        }

        $return['message'] = 'Lote encontrado com sucesso';
        $return['link']    = '/bundles/nfe/upload/loterps/' . $id . '.txt?time=' . time();
        return new JsonResponse($return, 200);
    }

    public function retornoAction($id, Request $Request)
    {
    	$erro = '';

    	$LoteRps = $this->getDoctrine()
	    	->getRepository('NfeBundle:LoteRps')
	    	->find($id);

    	if (!$LoteRps instanceof loteRps) {
    		$erro .= '<li>Lote não encontrado</li>';
    	}
    	if ($LoteRps->getEnviado()) {
    		$erro .= '<li>Lote já enviado</li>';
    	}

    	$file = $Request->files->get('file');
    	if ($file) {
    		if ($file->getClientMimeType() != 'text/plain') {
    			$erro .= '<li>Formato incorreto</li>';
    		}
    		if (!$file->isValid()) {
    			$erro .= '<li>Arquivo Inválido</li>';
    		}
    		if ($file->getError()) {
    			$erro .= '<li>Arquivo não importado</li>';
    		}

    		if (!strlen($erro)) {
    			try {
    				$newFile = $file->move(__DIR__ . '/../Resources/public/upload/retorno', $id. '.txt');
    			} catch (\Exception $e) {
    				$erro .= '<li>Não foi possível fazer o upload do arquivo</li>';
    				$erro .= '<li>' . $e->getMessage() . '</li>';
    			}

    			register_shutdown_function(
    				'NfeBundle\Business\ReturnRpsProcess::staticProcessReturnRps',
    				$LoteRps,
    				$this->getDoctrine()->getManager(),
    				$this->get('logger')
    			);

    			return $this->render('NfeBundle:Page:upload-lote-rps-return-sucesso.html.twig');
    		}
    	}
    	return $this->render('NfeBundle:Page:upload-lote-rps-return.html.twig', array('erro' => $erro));
    }
}
