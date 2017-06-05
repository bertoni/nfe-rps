<?php
/**
 * File that brings the NF Return Rps class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfReturnRps
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

/**
 * NF Return Rps class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnRps
{
    protected $tipo_registro = 20;
    protected $numero_nf;
    protected $status_nf;
    protected $codigo_verificacao;
    protected $data_emissao_nf;
    protected $tipo_rps;
    protected $serie_rps;
    protected $numero_rps;
    protected $data_emissao_rps;
    protected $tipo_identificacao_prestador;
    protected $identificacao_prestador;
    protected $inscricao_municipal_prestador;
    protected $inscricao_estadual_prestador;
    protected $razao_prestador;
    protected $nome_prestador;
    protected $tipo_endereco_prestador;
    protected $endereco_prestador;
    protected $numero_endereco_prestador;
    protected $complemento_endereco_prestador;
    protected $bairro_prestador;
    protected $cidade_prestador;
    protected $uf_prestador;
    protected $cep_prestador;
    protected $telefone_prestador;
    protected $email_prestador;
    protected $tipo_identificacao_tomador;
    protected $identificacao_tomador;
    protected $inscricao_municipal_tomador;
    protected $inscricao_estadual_tomador;
    protected $nome_tomador;
    protected $tipo_endereco_tomador;
    protected $endereco_tomador;
    protected $numero_endereco_tomador;
    protected $complemento_endereco_tomador;
    protected $bairro_tomador;
    protected $cidade_tomador;
    protected $uf_tomador;
    protected $cep_tomador;
    protected $telefone_tomador;
    protected $email_tomador;
    protected $tipo_tributacao;
    protected $cidade_prestacao;
    protected $uf_prestacao;
    protected $regime_especial;
    protected $opcao_simples;
    protected $incentivo_cultural;
    protected $codigo_servico_federal;
    protected $codigo_beneficio;
    protected $codigo_servico_municipal;
    protected $aliquota;
    protected $valor_servicos;
    protected $valor_deducoes;
    protected $valor_desconto_condicionado;
    protected $valor_desconto_incondicionado;
    protected $valor_cofins;
    protected $valor_csll;
    protected $valor_inss;
    protected $valor_irpj;
    protected $valor_pis_pasep;
    protected $valor_outras_retencoes;
    protected $valor_iss;
    protected $valor_credito;
    protected $iss_retido;
    protected $data_cancelamento;
    protected $data_competencia;
    protected $numero_guia;
    protected $data_quitacao;
    protected $lote;
    protected $codigo_obra;
    protected $anotacao_tecnica;
    protected $nf_substituido;
    protected $nf_substituto;
    protected $discriminacao_servicos;

    public function getTipoRegistro()
    {
        return $this->tipo_registro;
    }

    public function getNumeroNf()
    {
        return $this->numero_nf;
    }

    public function setNumeroNf($numero_nf)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $numero_nf)) {
            throw new \Exception('Número da NF inválido');
        }
        $this->numero_nf = (int)$numero_nf;
        return $this;
    }

    public function getStatusNf()
    {
        return $this->status_nf;
    }

    public function setStatusNf($status_nf)
    {
        if (!preg_match('/^[1-2]{1}$/', $status_nf)) {
            throw new \Exception('Status da NF inválido');
        }
        $this->status_nf = (int)$status_nf;
        return $this;
    }

    public function getCodigoVerificacao()
    {
        return $this->codigo_verificacao;
    }

    public function setCodigoVerificacao($codigo_verificacao)
    {
        if (!preg_match('/^.{1,9}$/', $codigo_verificacao)) {
            throw new \Exception('Código de Verificação da NF inválido');
        }
        $this->codigo_verificacao = $codigo_verificacao;
        return $this;
    }

    public function getDataEmissaoNf()
    {
        return $this->data_emissao_nf;
    }

    public function setDataEmissaoNf(\DateTime $data_emissao_nf)
    {
        $this->data_emissao_nf = $data_emissao_nf;
        return $this;
    }

    public function getTipoRps()
    {
        return $this->tipo_rps;
    }

    public function setTipoRps($tipo_rps)
    {
        if (!preg_match('/^[0-2]{1}$/', $tipo_rps)) {
            throw new \Exception('Tipo do RPS inválido');
        }
        $this->tipo_rps = (int)$tipo_rps;
        return $this;
    }

    public function getSerieRps()
    {
        return $this->serie_rps;
    }

    public function setSerieRps($serie_rps)
    {
        if (strlen($serie_rps) > 5) {
            throw new \Exception('Série do RPS inválido');
        }
        $this->serie_rps = $serie_rps;
        return $this;
    }

    public function getNumeroRps()
    {
        return $this->numero_rps;
    }

    public function setNumeroRps($numero_rps)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $numero_rps)) {
            throw new \Exception('Número do RPS inválido');
        }
        $this->numero_rps = (int)$numero_rps;
        return $this;
    }

    public function getDataEmissaoRps()
    {
        return $this->data_emissao_rps;
    }

    public function setDataEmissaoRps(\DateTime $data_emissao_rps)
    {
        $this->data_emissao_rps = $data_emissao_rps;
        return $this;
    }

    public function getTipoIdentificacaoPrestador()
    {
        return $this->tipo_identificacao_prestador;
    }

    public function setTipoIdentificacaoPrestador($tipo_identificacao_prestador)
    {
        if (!preg_match('/^[1-2]{1}$/', $tipo_identificacao_prestador)) {
            throw new \Exception('Tipo de identificação do Prestador inválido');
        }
        $this->tipo_identificacao_prestador = (int)$tipo_identificacao_prestador;
        return $this;
    }

    public function getIdentificacaoPrestador()
    {
        return $this->identificacao_prestador;
    }

    public function setIdentificacaoPrestador($identificacao_prestador)
    {
        if (!preg_match('/^[0-9]{0,14}$/', $identificacao_prestador)) {
            throw new \Exception('Identificação do Prestador inválido');
        }
        $this->identificacao_prestador = (int)$identificacao_prestador;
        return $this;
    }

    public function getInscricaoMunicipalPrestador()
    {
        return $this->inscricao_municipal_prestador;
    }

    public function setInscricaoMunicipalPrestador($inscricao_municipal_prestador)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $inscricao_municipal_prestador)) {
            throw new \Exception('Inscrição Municipal do Prestador inválido');
        }
        $this->inscricao_municipal_prestador = (int)$inscricao_municipal_prestador;
        return $this;
    }

    public function getInscricaoEstadualPrestador()
    {
        return $this->inscricao_estadual_prestador;
    }

    public function setInscricaoEstadualPrestador($inscricao_estadual_prestador)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $inscricao_estadual_prestador)) {
            throw new \Exception('Inscrição Estadual do Prestador inválido');
        }
        $this->inscricao_estadual_prestador = (int)$inscricao_estadual_prestador;
        return $this;
    }

    public function getRazaoPrestador()
    {
        return $this->razao_prestador;
    }

    public function setRazaoPrestador($razao_prestador)
    {
        if (strlen($razao_prestador) > 115) {
            throw new \Exception('Razão Social do Prestador inválido');
        }
        $this->razao_prestador = $razao_prestador;
        return $this;
    }

    public function getNomePrestador()
    {
        return $this->nome_prestador;
    }

    public function setNomePrestador($nome_prestador)
    {
        if (strlen($nome_prestador) > 60) {
            throw new \Exception('Nome do Prestador inválido');
        }
        $this->nome_prestador = $nome_prestador;
        return $this;
    }

    public function getTipoEnderecoPrestador()
    {
        return $this->tipo_endereco_prestador;
    }

    public function setTipoEnderecoPrestador($tipo_endereco_prestador)
    {
        if (strlen($tipo_endereco_prestador) > 3) {
            throw new \Exception('Tipo de Endereço do Prestador inválido');
        }
        $this->tipo_endereco_prestador = $tipo_endereco_prestador;
        return $this;
    }

    public function getEnderecoPrestador()
    {
        return $this->endereco_prestador;
    }

    public function setEnderecoPrestador($endereco_prestador)
    {
        if (strlen($endereco_prestador) > 125) {
            throw new \Exception('Endereço do Prestador inválido');
        }
        $this->endereco_prestador = $endereco_prestador;
        return $this;
    }

    public function getNumeroEnderecoPrestador()
    {
        return $this->numero_endereco_prestador;
    }

    public function setNumeroEnderecoPrestador($numero_endereco_prestador)
    {
        if (strlen($numero_endereco_prestador) > 10) {
            throw new \Exception('Número do Endereço do Prestador inválido');
        }
        $this->numero_endereco_prestador = $numero_endereco_prestador;
        return $this;
    }

    public function getComplementoEnderecoPrestador()
    {
        return $this->complemento_endereco_prestador;
    }

    public function setComplementoEnderecoPrestador($complemento_endereco_prestador)
    {
        if (strlen($complemento_endereco_prestador) > 60) {
            throw new \Exception('Complemento do Endereço do Prestador inválido');
        }
        $this->complemento_endereco_prestador = $complemento_endereco_prestador;
        return $this;
    }

    public function getBairroPrestador()
    {
        return $this->bairro_prestador;
    }

    public function setBairroPrestador($bairro_prestador)
    {
        if (strlen($bairro_prestador) > 72) {
            throw new \Exception('Bairro do Prestador inválido');
        }
        $this->bairro_prestador = $bairro_prestador;
        return $this;
    }

    public function getCidadePrestador()
    {
        return $this->cidade_prestador;
    }

    public function setCidadePrestador($cidade_prestador)
    {
        if (strlen($cidade_prestador) > 50) {
            throw new \Exception('Cidade do Prestador inválido');
        }
        $this->cidade_prestador = $cidade_prestador;
        return $this;
    }

    public function getUfPrestador()
    {
        return $this->uf_prestador;
    }

    public function setUfPrestador($uf_prestador)
    {
        if (strlen($uf_prestador) > 2) {
            throw new \Exception('UF do Prestador inválido');
        }
        $this->uf_prestador = $uf_prestador;
        return $this;
    }

    public function getCepPrestador()
    {
        return $this->cep_prestador;
    }

    public function setCepPrestador($cep_prestador)
    {
        if (!preg_match('/^[0-9]{0,8}$/', $cep_prestador)) {
            throw new \Exception('CEP do Prestador inválido');
        }
        $this->cep_prestador = (int)$cep_prestador;
        return $this;
    }

    public function getTelefonePrestador()
    {
        return $this->telefone_prestador;
    }

    public function setTelefonePrestador($telefone_prestador)
    {
        if (strlen($telefone_prestador) > 11) {
            throw new \Exception('Telefone do Prestador inválido');
        }
        $this->telefone_prestador = $telefone_prestador;
        return $this;
    }

    public function getEmailPrestador()
    {
        return $this->email_prestador;
    }

    public function setEmailPrestador($email_prestador)
    {
        if (strlen($email_prestador) > 80) {
            throw new \Exception('Email do Prestador inválido');
        }
        $this->email_prestador = $email_prestador;
        return $this;
    }

    public function getTipoIdentificacaoTomador()
    {
        return $this->tipo_identificacao_tomador;
    }

    public function setTipoIdentificacaoTomador($tipo_identificacao_tomador)
    {
        if (!preg_match('/^[1-3]{1}$/', $tipo_identificacao_tomador)) {
            throw new \Exception('Tipo de identificação do Tomador inválido');
        }
        $this->tipo_identificacao_tomador = (int)$tipo_identificacao_tomador;
        return $this;
    }

    public function getIdentificacaoTomador()
    {
        return $this->identificacao_tomador;
    }

    public function setIdentificacaoTomador($identificacao_tomador)
    {
        if (!preg_match('/^[0-9]{0,14}$/', $identificacao_tomador)) {
            throw new \Exception('Identificação do Tomador inválido');
        }
        $this->identificacao_tomador = (int)$identificacao_tomador;
        return $this;
    }

    public function getInscricaoMunicipalTomador()
    {
        return $this->inscricao_municipal_tomador;
    }

    public function setInscricaoMunicipalTomador($inscricao_municipal_tomador)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $inscricao_municipal_tomador)) {
            throw new \Exception('Inscrição Municipal do Tomador inválido');
        }
        $this->inscricao_municipal_tomador = (int)$inscricao_municipal_tomador;
        return $this;
    }

    public function getInscricaoEstadualTomador()
    {
        return $this->inscricao_estadual_tomador;
    }

    public function setInscricaoEstadualTomador($inscricao_estadual_tomador)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $inscricao_estadual_tomador)) {
            throw new \Exception('Inscrição Estadual do Tomador inválido');
        }
        $this->inscricao_estadual_tomador = (int)$inscricao_estadual_tomador;
        return $this;
    }

    public function getNomeTomador()
    {
        return $this->nome_tomador;
    }

    public function setNomeTomador($nome_tomador)
    {
        if (strlen($nome_tomador) > 115) {
            throw new \Exception('Nome do Tomador inválido');
        }
        $this->nome_tomador = $nome_tomador;
        return $this;
    }

    public function getTipoEnderecoTomador()
    {
        return $this->tipo_endereco_tomador;
    }

    public function setTipoEnderecoTomador($tipo_endereco_tomador)
    {
        if (strlen($tipo_endereco_tomador) > 3) {
            throw new \Exception('Tipo de Endereço do Tomador inválido');
        }
        $this->tipo_endereco_tomador = $tipo_endereco_tomador;
        return $this;
    }

    public function getEnderecoTomador()
    {
        return $this->endereco_tomador;
    }

    public function setEnderecoTomador($endereco_tomador)
    {
        if (strlen($endereco_tomador) > 125) {
            throw new \Exception('Endereço do Tomador inválido');
        }
        $this->endereco_tomador = $endereco_tomador;
        return $this;
    }

    public function getNumeroEnderecoTomador()
    {
        return $this->numero_endereco_tomador;
    }

    public function setNumeroEnderecoTomador($numero_endereco_tomador)
    {
        if (strlen($numero_endereco_tomador) > 10) {
            throw new \Exception('Número do Endereço do Tomador inválido');
        }
        $this->numero_endereco_tomador = $numero_endereco_tomador;
        return $this;
    }

    public function getComplementoEnderecoTomador()
    {
        return $this->complemento_endereco_tomador;
    }

    public function setComplementoEnderecoTomador($complemento_endereco_tomador)
    {
        if (strlen($complemento_endereco_tomador) > 60) {
            throw new \Exception('Complemento do Endereço do Tomador inválido');
        }
        $this->complemento_endereco_tomador = $complemento_endereco_tomador;
        return $this;
    }

    public function getBairroTomador()
    {
        return $this->bairro_tomador;
    }

    public function setBairroTomador($bairro_tomador)
    {
        if (strlen($bairro_tomador) > 72) {
            throw new \Exception('Bairro do Tomador inválido');
        }
        $this->bairro_tomador = $bairro_tomador;
        return $this;
    }

    public function getCidadeTomador()
    {
        return $this->cidade_tomador;
    }

    public function setCidadeTomador($cidade_tomador)
    {
        if (strlen($cidade_tomador) > 50) {
            throw new \Exception('Cidade do Tomador inválido');
        }
        $this->cidade_tomador = $cidade_tomador;
        return $this;
    }

    public function getUfTomador()
    {
        return $this->uf_tomador;
    }

    public function setUfTomador($uf_tomador)
    {
        if (strlen($uf_tomador) > 2) {
            throw new \Exception('UF do Tomador inválido');
        }
        $this->uf_tomador = $uf_tomador;
        return $this;
    }

    public function getCepTomador()
    {
        return $this->cep_tomador;
    }

    public function setCepTomador($cep_tomador)
    {
        if (!preg_match('/^[0-9]{0,8}$/', $cep_tomador)) {
            throw new \Exception('CEP do Tomador inválido');
        }
        $this->cep_tomador = (int)$cep_tomador;
        return $this;
    }

    public function getTelefoneTomador()
    {
        return $this->telefone_tomador;
    }

    public function setTelefoneTomador($telefone_tomador)
    {
        if (strlen($telefone_tomador) > 11) {
            throw new \Exception('Telefone do Tomador inválido');
        }
        $this->telefone_tomador = $telefone_tomador;
        return $this;
    }

    public function getEmailTomador()
    {
        return $this->email_tomador;
    }

    public function setEmailTomador($email_tomador)
    {
        if (strlen($email_tomador) > 80) {
            throw new \Exception('Email do Tomador inválido');
        }
        $this->email_tomador = $email_tomador;
        return $this;
    }

    public function getTipoTributacao()
    {
        return $this->tipo_tributacao;
    }

    public function setTipoTributacao($tipo_tributacao)
    {
        if (!preg_match('/^0[1-6]{1}$/', $tipo_tributacao)) {
            throw new \Exception('Tipo de Trbutação de serviços inválido');
        }
        $this->tipo_tributacao = (int)$tipo_tributacao;
        return $this;
    }

    public function getCidadePrestacao()
    {
        return $this->cidade_prestacao;
    }

    public function setCidadePrestacao($cidade_prestacao)
    {
        if (!preg_match('/^.{1,50}$/', $cidade_prestacao)) {
            throw new \Exception('Cidade da Prestação de serviços inválida');
        }
        $this->cidade_prestacao = $cidade_prestacao;
        return $this;
    }

    public function getUfPrestacao()
    {
        return $this->uf_prestacao;
    }

    public function setUfPrestacao($uf_prestacao)
    {
        if (!preg_match('/^[a-zA-Z]{2}$/', $uf_prestacao)) {
            throw new \Exception('UF da Prestação de serviços inválida');
        }
        $this->uf_prestacao = $uf_prestacao;
        return $this;
    }

    public function getRegimeEspecial()
    {
        return $this->regime_especial;
    }

    public function setRegimeEspecial($regime_especial)
    {
        if (!preg_match('/^0[0-5]{1}$/', $regime_especial)) {
            throw new \Exception('Regime Especial de Tributação inválida');
        }
        $this->regime_especial = (int)$regime_especial;
        return $this;
    }

    public function getOpcaoSimples()
    {
        return $this->opcao_simples;
    }

    public function setOpcaoSimples($opcao_simples)
    {
        if (!preg_match('/^[0-1]{1}$/', $opcao_simples)) {
            throw new \Exception('Opção Especial pelo Simples inválido');
        }
        $this->opcao_simples = (int)$opcao_simples;
        return $this;
    }

    public function getIncentivoCultural()
    {
        return $this->incentivo_cultural;
    }

    public function setIncentivoCultural($incentivo_cultural)
    {
        if (!preg_match('/^[0-1]{1}$/', $incentivo_cultural)) {
            throw new \Exception('Incentivo Cultural inválido');
        }
        $this->incentivo_cultural = (int)$incentivo_cultural;
        return $this;
    }

    public function getCodigoServicoFederal()
    {
        return $this->codigo_servico_federal;
    }

    public function setCodigoServicoFederal($codigo_servico_federal)
    {
        if (!preg_match('/^.{1,4}$/', $codigo_servico_federal)) {
            throw new \Exception('Código do Serviço Federal inválido');
        }
        $this->codigo_servico_federal = $codigo_servico_federal;
        return $this;
    }

    public function getCodigoBeneficio()
    {
        return $this->codigo_beneficio;
    }

    public function setCodigoBeneficio($codigo_beneficio)
    {
        if (!preg_match('/^[0-9]{0,3}$/', $codigo_beneficio)) {
            throw new \Exception('Código do Benefício inválido');
        }
        $this->codigo_beneficio = (int)$codigo_beneficio;
        return $this;
    }

    public function getCodigoServicoMunicipal()
    {
        return $this->codigo_servico_municipal;
    }

    public function setCodigoServicoMunicipal($codigo_servico_municipal)
    {
        if (!preg_match('/^.{1,6}$/', $codigo_servico_municipal)) {
            throw new \Exception('Código do Serviço Municipal inválido');
        }
        $this->codigo_servico_municipal = $codigo_servico_municipal;
        return $this;
    }

    public function getAliquota()
    {
        return $this->aliquota;
    }

    public function setAliquota($aliquota)
    {
        if (!preg_match('/^[0-9]{0,5}$/', $aliquota)) {
            throw new \Exception('Aliquota inválida');
        }
        $this->aliquota = (int)$aliquota;
        return $this;
    }

    public function getValorServicos()
    {
        return $this->valor_servicos;
    }

    public function setValorServicos($valor_servicos)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_servicos)) {
            throw new \Exception('Valor dos Serviços inválido');
        }
        $this->valor_servicos = (int)$valor_servicos;
        return $this;
    }

    public function getValorDeducoes()
    {
        return $this->valor_deducoes;
    }

    public function setValorDeducoes($valor_deducoes)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_deducoes)) {
            throw new \Exception('Valor das Deduções inválido');
        }
        $this->valor_deducoes = (int)$valor_deducoes;
        return $this;
    }

    public function getValorDescontoCondicionado()
    {
        return $this->valor_desconto_condicionado;
    }

    public function setValorDescontoCondicionado($valor_desconto_condicionado)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_desconto_condicionado)) {
            throw new \Exception('Valor do Desconto Condicionado inválido');
        }
        $this->valor_desconto_condicionado = (int)$valor_desconto_condicionado;
        return $this;
    }

    public function getValorDescontoIncondicionado()
    {
        return $this->valor_desconto_incondicionado;
    }

    public function setValorDescontoIncondicionado($valor_desconto_incondicionado)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_desconto_incondicionado)) {
            throw new \Exception('Valor do Desconto Incondicionado inválido');
        }
        $this->valor_desconto_incondicionado = (int)$valor_desconto_incondicionado;
        return $this;
    }

    public function getValorCofins()
    {
        return $this->valor_cofins;
    }

    public function setValorCofins($valor_cofins)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_cofins)) {
            throw new \Exception('Valor do COFINS inválido');
        }
        $this->valor_cofins = (int)$valor_cofins;
        return $this;
    }

    public function getValorCsll()
    {
        return $this->valor_csll;
    }

    public function setValorCsll($valor_csll)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_csll)) {
            throw new \Exception('Valor do CSLL inválido');
        }
        $this->valor_csll = (int)$valor_csll;
        return $this;
    }

    public function getValorInss()
    {
        return $this->valor_inss;
    }

    public function setValorInss($valor_inss)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_inss)) {
            throw new \Exception('Valor do INSS inválido');
        }
        $this->valor_inss = (int)$valor_inss;
        return $this;
    }

    public function getValorIrpj()
    {
        return $this->valor_irpj;
    }

    public function setValorIrpj($valor_irpj)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_irpj)) {
            throw new \Exception('Valor do IRPJ inválido');
        }
        $this->valor_irpj = (int)$valor_irpj;
        return $this;
    }

    public function getValorPisPasep()
    {
        return $this->valor_pis_pasep;
    }

    public function setValorPisPasep($valor_pis_pasep)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_pis_pasep)) {
          throw new \Exception('Valor do PIS/PASEP inválido');
        }
        $this->valor_pis_pasep = (int)$valor_pis_pasep;
        return $this;
    }

    public function getValorOutrasRetencoes()
    {
        return $this->valor_outras_retencoes;
    }

    public function setValorOutrasRetencoes($valor_outras_retencoes)
    {
      if (!preg_match('/^[0-9]{0,15}$/', $valor_outras_retencoes)) {
        throw new \Exception('Valor de Outras Retenções inválido');
      }
      $this->valor_outras_retencoes = (int)$valor_outras_retencoes;
      return $this;
    }

    public function getValorIss()
    {
        return $this->valor_iss;
    }

    public function setValorIss($valor_iss)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_iss)) {
          throw new \Exception('Valor do ISS inválido');
        }
        $this->valor_iss = (int)$valor_iss;
        return $this;
    }

    public function getValorCredito()
    {
        return $this->valor_credito;
    }

    public function setValorCredito($valor_credito)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $valor_credito)) {
            throw new \Exception('Valor do Crédito inválido');
        }
        $this->valor_credito = (int)$valor_credito;
        return $this;
    }

    public function getIssRetido()
    {
        return $this->iss_retido;
    }

    public function setIssRetido($iss_retido)
    {
        if (!preg_match('/^[0-1]{1}$/', $iss_retido)) {
            throw new \Exception('Valor do ISS inválido');
        }
        $this->iss_retido = (int)$iss_retido;
        return $this;
    }

    public function getDataCancelamento()
    {
        return $this->data_cancelamento;
    }

    public function setDataCancelamento(\DateTime $data_cancelamento = null)
    {
        $this->data_cancelamento = $data_cancelamento;
        return $this;
    }

    public function getDataCompetencia()
    {
        return $this->data_competencia;
    }

    public function setDataCompetencia(\DateTime $data_competencia = null)
    {
        $this->data_competencia = $data_competencia;
        return $this;
    }

    public function getNumeroGuia()
    {
        return $this->numero_guia;
    }

    public function setNumeroGuia($numero_guia)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $numero_guia)) {
            throw new \Exception('Numero da Guia inválido');
        }
        $this->numero_guia = (int)$numero_guia;
        return $this;
    }

    public function getDataQuitacao()
    {
        return $this->data_quitacao;
    }

    public function setDataQuitacao(\DateTime $data_quitacao = null)
    {
        $this->data_quitacao = $data_quitacao;
        return $this;
    }

    public function getLote()
    {
        return $this->lote;
    }

    public function setLote($lote)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $lote)) {
            throw new \Exception('Lote inválido');
        }
        $this->lote = (int)$lote;
        return $this;
    }

    public function getCodigoObra()
    {
        return $this->codigo_obra;
    }

    public function setCodigoObra($codigo_obra)
    {
        if (strlen($codigo_obra) > 15) {
            throw new \Exception('Código da Obra inválido');
        }
        $this->codigo_obra = $codigo_obra;
        return $this;
    }

    public function getAnotacaoTecnica()
    {
        return $this->anotacao_tecnica;
    }

    public function setAnotacaoTecnica($anotacao_tecnica)
    {
        if (strlen($anotacao_tecnica) > 15) {
            throw new \Exception('Anotação Técnica inválida');
        }
        $this->anotacao_tecnica = $anotacao_tecnica;
        return $this;
    }

    public function getNfSubstituido()
    {
        return $this->nf_substituido;
    }

    public function setNfSubstituido($nf_substituido)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $nf_substituido)) {
            throw new \Exception('Número da Nf Substituido inválida');
        }
        $this->nf_substituido = (int)$nf_substituido;
        return $this;
    }

    public function getNfSubstituto()
    {
        return $this->nf_substituto;
    }

    public function setNfSubstituto($nf_substituto)
    {
        if (!preg_match('/^[0-9]{0,15}$/', $nf_substituto)) {
            throw new \Exception('Número da Nf Substituto inválida');
        }
        $this->nf_substituto = (int)$nf_substituto;
        return $this;
    }

    public function getDiscriminacaoServicos()
    {
        return $this->discriminacao_servicos;
    }

    public function setDiscriminacaoServicos($discriminacao_servicos)
    {
        if (strlen($discriminacao_servicos) > 4000) {
            throw new \Exception('Discriminacao Servicos inválido');
        }
        $this->discriminacao_servicos = $discriminacao_servicos;
        return $this;
    }
}
