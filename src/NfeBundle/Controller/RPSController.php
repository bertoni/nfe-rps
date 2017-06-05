<?php

namespace NfeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Yaml;
use NfeBundle\Entity\Rps;
use NfeBundle\Entity\Importacao;
use \DateTime as DateTime;

class RPSController extends Controller
{
    public function listagemAction(Request $Request)
    {
        return $this->render('NfeBundle:Page:rps-listagem.html.twig');
    }

    public function listagemPaginacaoAction($page, Request $Request)
    {
      $qtd_per_page = 20;
      $search_begin = ($page < 2 ? 0 : (($page-1) * $qtd_per_page));
      $content      = '';
      $twig         = $this->container->get('templating');

      $Rps = $this->getDoctrine()
          ->getRepository('NfeBundle:Rps')
          ->findBy(array(), array('id_rps' => 'DESC'), $qtd_per_page, $search_begin);
      if (is_array($Rps) && count($Rps)) {
          foreach ($Rps as $itemRps) {
              $rps = array(
                  'id_rps'                => $itemRps->getIdRps(),
                  'identificacao_venda'   => $itemRps->getIdentificacaoVenda(),
                  'nome_tomador'          => $itemRps->getNomeTomador(),
                  'discriminacao_servico' => $itemRps->getDiscriminacaoServico(),
                  'valor_servicos'        => $itemRps->getValorServicos(),
                  'data_criacao'          => $itemRps->getDataCriacao()->format('d/m/Y H:i:s'),
                  'id_lote_rps'           => $itemRps->getIdLoteRps(),
                  'data_emissao'          => $itemRps->getDataEmissao()->format('d/m/Y'),
                  'serie_rps'             => $itemRps->getSerieRps(),
                  'numero_nf'             => $itemRps->getNumeroNf(),
                  'codigo_verificacao'    => $itemRps->getCodigoVerificacao(),
                  'link_nf'               => $itemRps->getLinkNf()
              );
              $content .= $twig->render('NfeBundle:Include:rps-linha.html.twig', array('itemrps' => $rps));
          }
      }

      return new Response($content, 200);
    }

    public function editarAction($id, Request $Request)
    {
        $Rps = $this->getDoctrine()
            ->getRepository('NfeBundle:Rps')
            ->find($id);

        if (!$Rps instanceof Rps) {
            $this->addFlash(
                'notice',
                'RPS não encontrado'
            );
            return $this->redirectToRoute('nfe_rps_listagem', array(), 302);
        }

        if (strlen($Rps->getNumeroNf())) {
          $this->addFlash(
              'notice',
              'O RPS não já foi emitido e não pode ser alterado'
          );
          return $this->redirectToRoute('nfe_rps_listagem', array(), 302);
        }

        if ($Request->get('identificacao-venda') && $Request->get('id') == $id) {
            $identificacao_venda             = $Request->get('identificacao-venda');
            $tipo_rps                        = $Request->get('tipo-rps');
            $data_venda                      = $Request->get('data-venda');
            $tipo_identificacao_tomador      = $Request->get('tipo-identificacao-tomador');
            $identificacao_tomador           = $Request->get('identificacao-tomador');
            $inscricao_municipal_tomador     = $Request->get('inscricao-municipal-tomador');
            $inscricao_estadual_tomador      = $Request->get('inscricao-estadual-tomador');
            $nome_tomador                    = $Request->get('nome-tomador');
            $tipo_endereco_tomador           = $Request->get('tipo-endereco-tomador');
            $endereco_tomador                = $Request->get('endereco-tomador');
            $numero_endereco_tomador         = $Request->get('numero-endereco-tomador');
            $complemento_endereco_tomador    = $Request->get('complemento-endereco-tomador');
            $bairro_endereco_tomador         = $Request->get('bairro-endereco-tomador');
            $cidade_endereco_tomador         = $Request->get('cidade-endereco-tomador');
            $uf_endereco_tomador             = $Request->get('uf-endereco-tomador');
            $cep_endereco_tomador            = $Request->get('cep-endereco-tomador');
            $telefone_endereco_tomador       = $Request->get('telefone-endereco-tomador');
            $email_endereco_tomador          = $Request->get('email-endereco-tomador');
            $tipo_tributacao_servico         = $Request->get('tipo-tributacao-servico');
            $cidade_prestacao_servico        = $Request->get('cidade-prestacao-servico');
            $uf_prestacao_servico            = $Request->get('uf-prestacao-servico');
            $regime_especial_tributacao      = $Request->get('regime-especial-tributacao');
            $opcao_simples                   = $Request->get('opcao-simples');
            $incentivo_cultural              = $Request->get('incentivo-cultural');
            $codigo_servico_federal          = $Request->get('codigo-servico-federal');
            $codigo_pais                     = $Request->get('codigo-pais');
            $codigo_beneficio                = $Request->get('codigo-beneficio');
            $codigo_servico_municipal        = $Request->get('codigo-servico-municipal');
            $aliquota                        = $Request->get('aliquota');
            $valor_servicos                  = $Request->get('valor-servicos');
            $valor_deducao                   = $Request->get('valor-deducao');
            $valor_desconto_condicionado     = $Request->get('valor-desconto-condicionado');
            $valor_desconto_incondicionado   = $Request->get('valor-desconto-incondicionado');
            $valor_cofins                    = $Request->get('valor-cofins');
            $valor_csll                      = $Request->get('valor-csll');
            $valor_inss                      = $Request->get('valor-inss');
            $valor_irpj                      = $Request->get('valor-irpj');
            $valor_pis_pasep                 = $Request->get('valor-pis-pasep');
            $valor_outras_retencoes_federais = $Request->get('valor-outras-retencoes-federais');
            $valor_iss                       = $Request->get('valor-iss');
            $iss_retido                      = $Request->get('iss-retido');
            $data_competencia                = $Request->get('data-competencia');
            $codigo_obra                     = $Request->get('codigo-obra');
            $anotacao_tecnica                = $Request->get('anotacao-tecnica');
            $serie_rps_substituido           = $Request->get('serie-rps-substituido');
            $numero_rps_substituido          = $Request->get('numero-rps-substituido');
            $discriminacao_servicos          = $Request->get('discriminacao-servicos');
            try {
                $Rps->setIdentificacaoVenda(!empty($identificacao_venda) ? $identificacao_venda : null)
                    ->setTipoRps($tipo_rps)
                    ->setDataEmissao(new \DateTime($data_venda))
                    ->setTipoIdentificaoTomador($tipo_identificacao_tomador)
                    ->setIdentificacaoTomador($identificacao_tomador)
                    ->setInscricaoMunicipalTomador(!empty($inscricao_municipal_tomador) ? $inscricao_municipal_tomador : null)
                    ->setInscricaoEstadualTomador(!empty($inscricao_estadual_tomador) ? $inscricao_estadual_tomador : null)
                    ->setNomeTomador(!empty($nome_tomador) ? $nome_tomador : null)
                    ->setTipoEnderecoTomador(!empty($tipo_endereco_tomador) ? $tipo_endereco_tomador : null)
                    ->setEnderecoTomador(!empty($endereco_tomador) ? $endereco_tomador : null)
                    ->setNumeroEnderecoTomador(!empty($numero_endereco_tomador) ? $numero_endereco_tomador : null)
                    ->setComplementoEnderecoTomador(!empty($complemento_endereco_tomador) ? $complemento_endereco_tomador : null)
                    ->setBairroTomador(!empty($bairro_endereco_tomador) ? $bairro_endereco_tomador : null)
                    ->setCidadeTomador(!empty($cidade_endereco_tomador) ? $cidade_endereco_tomador : null)
                    ->setUfTomador(!empty($uf_endereco_tomador) ? $uf_endereco_tomador : null)
                    ->setCepTomador(!empty($cep_endereco_tomador) ? $cep_endereco_tomador : null)
                    ->setTelefoneTomador(!empty($telefone_endereco_tomador) ? $telefone_endereco_tomador : null)
                    ->setEmailTomador(!empty($email_endereco_tomador) ? $email_endereco_tomador : null)
                    ->setTipoTributacaoServico($tipo_tributacao_servico)
                    ->setCidadePrestacaoServico($cidade_prestacao_servico)
                    ->setUfPrestacaoServico($uf_prestacao_servico)
                    ->setRegimeEspecialTributacao($regime_especial_tributacao)
                    ->setOpcaoPeloSimples($opcao_simples)
                    ->setIncentivoCultural($incentivo_cultural)
                    ->setCodigoServicoFederal($codigo_servico_federal)
                    ->setCodigoPais(!empty($codigo_pais) ? $codigo_pais : null)
                    ->setCodigoBeneficio(!empty($codigo_beneficio) ? $codigo_beneficio : null)
                    ->setCodigoServicoMunicipal($codigo_servico_municipal)
                    ->setAliquota(preg_replace('/[^0-9]/', '', $aliquota))
                    ->setValorServicos(preg_replace('/[^0-9]/', '', $valor_servicos))
                    ->setValorDeducoes(empty($valor_deducao) ? null : preg_replace('/[^0-9]/', '', $valor_deducao))
                    ->setValorDescontoCondicionado(empty($valor_desconto_condicionado) ? null : preg_replace('/[^0-9]/', '', $valor_desconto_condicionado))
                    ->setValorDescontoIncondicionado(empty($valor_desconto_incondicionado) ? null : preg_replace('/[^0-9]/', '', $valor_desconto_incondicionado))
                    ->setValorCofins(empty($valor_cofins) ? null : preg_replace('/[^0-9]/', '', $valor_cofins))
                    ->setValorCsll(empty($valor_csll) ? null : preg_replace('/[^0-9]/', '', $valor_csll))
                    ->setValorInss(empty($valor_inss) ? null : preg_replace('/[^0-9]/', '', $valor_inss))
                    ->setValorIrpj(empty($valor_irpj) ? null : preg_replace('/[^0-9]/', '', $valor_irpj))
                    ->setValorPisPasep(empty($valor_pis_pasep) ? null : preg_replace('/[^0-9]/', '', $valor_pis_pasep))
                    ->setValorOutrasRetencoesFederais(empty($valor_outras_retencoes_federais) ? null : preg_replace('/[^0-9]/', '', $valor_outras_retencoes_federais))
                    ->setValorIss(empty($valor_iss) ? null : preg_replace('/[^0-9]/', '', $valor_iss))
                    ->setIssRetido($iss_retido)
                    ->setDataCompetencia(new \DateTime($data_competencia))
                    ->setCodigoObra(!empty($codigo_obra) ? $codigo_obra : null)
                    ->setAnotacaoResponsabilidadeTecnica(!empty($anotacao_tecnica) ? $anotacao_tecnica : null)
                    ->setSerieRpsSubstituido(!empty($serie_rps_substituido) ? $serie_rps_substituido : null)
                    ->setNumeroRpsSusbtituido(!empty($numero_rps_substituido) ? $numero_rps_substituido : null)
                    ->setDiscriminacaoServico($discriminacao_servicos);

                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('success', 'Dados salvos com sucesso');
            } catch (\Exception $e) {
                $this->addFlash('notice', $e->getMessage());
            }

        }

        $data = array(
            'allow_edit'                      => true,
            'id'                              => $Rps->getIdRps(),
            'identificacao_venda'             => $Rps->getIdentificacaoVenda(),
            'tipo_rps'                        => $Rps->getTipoRps(),
            'data_venda'                      => $Rps->getDataEmissao()->format('d-m-Y'),
            'tipo_identificacao_tomador'      => $Rps->getTipoIdentificaoTomador(),
            'identificacao_tomador'           => $Rps->getIdentificacaoTomador(),
            'inscricao_municipal_tomador'     => $Rps->getInscricaoMunicipalTomador(),
            'inscricao_estadual_tomador'      => $Rps->getInscricaoEstadualTomador(),
            'nome_tomador'                    => $Rps->getNomeTomador(),
            'tipo_endereco_tomador'           => $Rps->getTipoEnderecoTomador(),
            'endereco_tomador'                => $Rps->getEnderecoTomador(),
            'numero_endereco_tomador'         => $Rps->getNumeroEnderecoTomador(),
            'complemento_endereco_tomador'    => $Rps->getComplementoEnderecoTomador(),
            'bairro_endereco_tomador'         => $Rps->getBairroTomador(),
            'cidade_endereco_tomador'         => $Rps->getCidadeTomador(),
            'uf_endereco_tomador'             => $Rps->getUfTomador(),
            'cep_endereco_tomador'            => $Rps->getCepTomador(),
            'telefone_endereco_tomador'       => $Rps->getTelefoneTomador(),
            'email_endereco_tomador'          => $Rps->getEmailTomador(),
            'tipo_tributacao_servico'         => $Rps->getTipoTributacaoServico(),
            'cidade_prestacao_servico'        => $Rps->getCidadePrestacaoServico(),
            'uf_prestacao_servico'            => $Rps->getUfPrestacaoServico(),
            'regime_especial_tributacao'      => $Rps->getRegimeEspecialTributacao(),
            'opcao_simples'                   => $Rps->getOpcaoPeloSimples(),
            'incentivo_cultural'              => $Rps->getIncentivoCultural(),
            'codigo_servico_federal'          => $Rps->getCodigoServicoFederal(),
            'codigo_pais'                     => $Rps->getCodigoPais(),
            'codigo_beneficio'                => $Rps->getCodigoBeneficio(),
            'codigo_servico_municipal'        => $Rps->getCodigoServicoMunicipal(),
            'aliquota'                        => $Rps->getAliquota(),
            'valor_servicos'                  => $Rps->getValorServicos(),
            'valor_deducao'                   => $Rps->getValorDeducoes(),
            'valor_desconto_condicionado'     => $Rps->getValorDescontoCondicionado(),
            'valor_desconto_incondicionado'   => $Rps->getValorDescontoIncondicionado(),
            'valor_cofins'                    => $Rps->getValorCofins(),
            'valor_csll'                      => $Rps->getValorCsll(),
            'valor_inss'                      => $Rps->getValorInss(),
            'valor_irpj'                      => $Rps->getValorIrpj(),
            'valor_pis_pasep'                 => $Rps->getValorPisPasep(),
            'valor_outras_retencoes_federais' => $Rps->getValorOutrasRetencoesFederais(),
            'valor_iss'                       => $Rps->getValorIss(),
            'iss_retido'                      => $Rps->getIssRetido(),
            'data_competencia'                => $Rps->getDataCompetencia()->format('d-m-Y'),
            'codigo_obra'                     => $Rps->getCodigoObra(),
            'anotacao_tecnica'                => $Rps->getAnotacaoResponsabilidadeTecnica(),
            'serie_rps_substituido'           => $Rps->getSerieRpsSubstituido(),
            'numero_rps_substituido'          => $Rps->getNumeroRpsSusbtituido(),
            'discriminacao_servicos'          => $Rps->getDiscriminacaoServico()
        );

        if (strlen($Rps->getNumeroNf())) {
          $data['allow_edit'] = false;
        }

        return $this->render('NfeBundle:Page:rps-edicao.html.twig', $data);
    }

    public function importacaoListagemAction(Request $Request)
    {
        $Importacoes = $this->getDoctrine()
            ->getRepository('NfeBundle:Importacao')
            ->findBy(array(), array('data_importacao' => 'DESC'));

        $importacao = array();
        if (is_array($Importacoes) && count($Importacoes)) {
            foreach ($Importacoes as $Importacao) {
                $importacao[] = array(
                    'id_importacao'   => $Importacao->getIdImportacao(),
                    'data_importacao' => $Importacao->getDataImportacao()->format('d/m/Y H:i:s'),
                    'log'             => $Importacao->getLog()
                );
            }
        }

        return $this->render(
            'NfeBundle:Page:importacao-listagem.html.twig',
            array('importacao' => $importacao)
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
