<?php

namespace NfeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use NfeBundle\Entity\LoteRps;

class LoteRPSController extends Controller
{
    public function listagemAction(Request $Request)
    {
        $LotesRps = $this->getDoctrine()
            ->getRepository('NfeBundle:LoteRps')
            ->findBy(array(), array('data_cadastro' => 'DESC'));
        
        $loterps = array();
        if (is_array($LotesRps) && count($LotesRps)) {
            foreach ($LotesRps as $LoteRps) {
                $loterps[] = array(
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
            }
        }
        
        return $this->render(
            'NfeBundle:Page:lote-rps-listagem.html.twig',
            array('loterps' => $loterps)
        );
    }
}