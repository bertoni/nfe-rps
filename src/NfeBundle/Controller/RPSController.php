<?php

namespace NfeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use NfeBundle\Entity\Rps;
use NfeBundle\Entity\Importacao;
use \DateTime as DateTime;

class RPSController extends Controller
{
    public function listagemAction(Request $Request)
    {
        $Rps = $this->getDoctrine()
            ->getRepository('NfeBundle:Rps')
            ->findBy(array(), array('data_criacao' => 'DESC'));
        
        $rps = array();
        if (is_array($Rps) && count($Rps)) {
            foreach ($Rps as $itemRps) {
                $rps[] = array(
                    'id_rps'                => $itemRps->getIdRps(),
                    'identificacao_venda'   => $itemRps->getIdentificacaoVenda(),
                    'nome_tomador'          => $itemRps->getNomeTomador(),
                    'discriminacao_servico' => $itemRps->getDiscriminacaoServico(),
                    'valor_servicos'        => $itemRps->getValorServicos(),
                    'data_criacao'          => $itemRps->getDataCriacao()->format('d/m/Y H:i:s'),
                    'id_lote_rps'           => $itemRps->getIdLoteRps(),
                    'data_emissao'          => $itemRps->getDataEmissao()->format('d/m/Y H:i:s'),
                    'serie_rps'             => $itemRps->getSerieRps(),
                    'numero_nf'             => $itemRps->getNumeroNf()
                );
            }
        }
        
        return $this->render(
            'NfeBundle:Page:rps-listagem.html.twig',
            array('rps' => $rps)
        );
    }

    public function uploadCsvAction(Request $Request)
    {
        $erro = '';
        $file = $Request->files->get('file');
        if ($file) {
            if ($file->getClientMimeType() != 'text/csv') {
                $erro .= '<li>Formato incorreto</li>';
            }
            if (!$file->isValid()) {
                $erro .= '<li>Arquivo Inválido</li>';
            }
            if ($file->getError()) {
                $erro .= '<li>Arquivo não importado</li>';
            }
            
            if (!strlen($erro)) {
                $newFile = $file->move(__DIR__ . '/../Resources/public/upload/csv', time() . '.csv');
                $Importacao = new Importacao();
                $Importacao->setDataImportacao(new \DateTime())
                    ->setNomeArquivo($newFile->getFilename());
                
                try {
                    $this->getDoctrine()->getManager()->persist($Importacao);
                    $this->getDoctrine()->getManager()->flush();
                    
                    register_shutdown_function(
                        'NfeBundle\Business\UploadRpsProcess::staticProcessSheetRps',
                        $Importacao,
                        Yaml::parse(file_get_contents(__DIR__ . '/../Resources/config/field_csv.yml')),
                        $this->getDoctrine()->getManager(),
                        $this->get('logger')
                    );
                    
                    return $this->render('NfeBundle:Page:upload-csv-sucesso.html.twig');
                } catch (\Exception $e) {
                    $erro .= '<li>Não foi possível fazer o upload do arquivo</li>';
                    $erro .= '<li>' . $e->getMessage() . '</li>';
                }
                
            }
        }
        return $this->render('NfeBundle:Page:upload-csv.html.twig', array('erro' => $erro));
    }
}