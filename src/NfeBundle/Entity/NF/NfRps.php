<?php
/**
 * File that brings the NF Rps class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfRps
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

/**
 * NF Rps class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfRps
{
    protected $tipo_registro = 20;
    protected $tipo_rps;
    protected $serie_rps;
    protected $numero_rps;
    protected $data_emissao;
    protected $status_rps;
    protected $tipo_identificacao_tomador;
    protected $identificacao_tomador;
    protected $inscricao_municipal_tomador;
    protected $inscricao_estadual_tomador;
    protected $nome_tomador;
    protected $tipo_endereco;
    protected $endereco;
    protected $numero_endereco;
    protected $complemento_endereco;
    protected $bairro;
    protected $cidade;
    protected $uf;
    protected $cep;
    protected $telefone;
    protected $email;
    protected $tipo_tributacao;
    protected $cidade_prestacao;
    protected $uf_prestacao;
    protected $regime_especial;
    protected $opcao_simples;
    protected $incentivo_cultural;
    protected $codigo_servico_federal;
    protected $codigo_pais;
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
    protected $iss_retido;
    protected $data_competencia;
    protected $codigo_obra;
    protected $anotacao_tecnica;
    protected $serie_rps_substituido;
    protected $numero_rps_substituido;
    protected $discriminacao_servicos;

    public function getTipoRegistro()
    {
        return $this->tipo_registro;
    }

    public function getTipoRps()
    {
        return $this->tipo_rps;
    }

    public function setTipoRps($tipo_rps)
    {
        if (!preg_match('/^[0-1]{1}$/', $tipo_rps)) {
            throw new \Exception('Tipo do RPS inválido');
        }
        $this->tipo_rps = $tipo_rps;
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
        $this->numero_rps = $numero_rps;
        return $this;
    }

    public function getDataEmissao()
    {
        return $this->data_emissao;
    }
    
    public function setDataEmissao(\DateTime $data_emissao)
    {
        $this->data_emissao = $data_emissao;
        return $this;
    }

    public function getStatusRps()
    {
        return $this->status_rps;
    }
    
    public function setStatusRps($status_rps)
    {
        if (!preg_match('/^[1-2]{1}$/', $status_rps)) {
            throw new \Exception('Status do RPS inválido');
        }
        $this->status_rps = $status_rps;
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
        $this->tipo_identificacao_tomador = $tipo_identificacao_tomador;
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
        $this->identificacao_tomador = $identificacao_tomador;
        return $this;
    }

    public function getInscricaoMunicipalTomador()
    {
        return $this->inscricao_municipal_tomador;
    }
    
    public function setInscricaoMunicipalTomador($inscricao_municipal_tomador)
    {
        if (strlen($inscricao_municipal_tomador) > 15) {
            throw new \Exception('Inscrição Municipal do Tomador inválido');
        }
        $this->inscricao_municipal_tomador = $inscricao_municipal_tomador;
        return $this;
    }

    public function getInscricaoEstadualTomador()
    {
        return $this->inscricao_estadual_tomador;
    }
    
    public function setInscricaoEstadualTomador($inscricao_estadual_tomador)
    {
        if (strlen($inscricao_estadual_tomador) > 15) {
            throw new \Exception('Inscrição Estadual do Tomador inválido');
        }
        $this->inscricao_estadual_tomador = $inscricao_estadual_tomador;
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

    public function getTipoEndereco()
    {
        return $this->tipo_endereco;
    }
    
    public function setTipoEndereco($tipo_endereco)
    {
        if (strlen($tipo_endereco) > 3) {
            throw new \Exception('Tipo de Endereço do Tomador inválido');
        }
        $this->tipo_endereco = $tipo_endereco;
        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
    
    public function setEndereco($endereco)
    {
        if (strlen($endereco) > 125) {
            throw new \Exception('Endereço do Tomador inválido');
        }
        $this->endereco = $endereco;
        return $this;
    }

    public function getNumeroEndereco()
    {
        return $this->numero_endereco;
    }
    
    public function setNumeroEndereco($numero_endereco)
    {
        if (strlen($numero_endereco) > 10) {
            throw new \Exception('Endereço do Tomador inválido');
        }
        $this->numero_endereco = $numero_endereco;
        return $this;
    }

    public function getComplementoEndereco()
    {
        return $this->complemento_endereco;
    }
    
    public function setComplementoEndereco($complemento_endereco)
    {
        if (strlen($complemento_endereco) > 60) {
            throw new \Exception('Endereço do Tomador inválido');
        }
        $this->complemento_endereco = $complemento_endereco;
        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }
    
    public function setBairro($bairro)
    {
        if (strlen($bairro) > 72) {
            throw new \Exception('Bairro do Tomador inválido');
        }
        $this->bairro = $bairro;
        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
    
    public function setCidade($cidade)
    {
        if (strlen($cidade) > 50) {
            throw new \Exception('Cidade do Tomador inválido');
        }
        $this->cidade = $cidade;
        return $this;
    }

    public function getUf()
    {
        return $this->uf;
    }
    
    public function setUf($uf)
    {
        if (strlen($uf) > 2) {
            throw new \Exception('UF do Tomador inválido');
        }
        $this->uf = $uf;
        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }
    
    public function setCep($cep)
    {
        if (strlen($cep) > 8) {
            throw new \Exception('CEP do Tomador inválido');
        }
        $this->cep = $cep;
        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    
    public function setTelefone($telefone)
    {
        if (strlen($telefone) > 11) {
            throw new \Exception('Telefone do Tomador inválido');
        }
        $this->telefone = $telefone;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        if (strlen($email) > 80) {
            throw new \Exception('Email do Tomador inválido');
        }
        $this->email = $email;
        return $this;
    }

    public function getTipoTributacao()
    {
        return $this->tipo_tributacao;
    }
    
    public function setTipoTributacao($tipo_tributacao)
    {
        if (!preg_match('/^[1-6]{1}$/', $tipo_tributacao)) {
            throw new \Exception('Tipo de Trbutação de serviços inválido');
        }
        $this->tipo_tributacao = $tipo_tributacao;
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
        if (!preg_match('/^[0-6]{1}$/', $regime_especial)) {
            throw new \Exception('Regime Especial de Tributação inválida');
        }
        $this->regime_especial = $regime_especial;
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
        $this->opcao_simples = $opcao_simples;
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
        $this->incentivo_cultural = $incentivo_cultural;
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

    public function getCodigoPais()
    {
        return $this->codigo_pais;
    }
    
    public function setCodigoPais($codigo_pais)
    {
        if (strlen($codigo_pais) > 5) {
            throw new \Exception('Código do Pais inválido');
        }
        $this->codigo_pais = $codigo_pais;
        return $this;
    }

    public function getCodigoBeneficio()
    {
        return $this->codigo_beneficio;
    }
    
    public function setCodigoBeneficio($codigo_beneficio)
    {
        if (strlen($codigo_beneficio) > 3) {
            throw new \Exception('Código do Benefício inválido');
        }
        $this->codigo_beneficio = $codigo_beneficio;
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
        if (!preg_match('/^[0-9]{1,5}$/', $aliquota)) {
            throw new \Exception('Aliquota inválida');
        }
        $this->aliquota = $aliquota;
        return $this;
    }

    public function getValorServicos()
    {
        return $this->valor_servicos;
    }
    
    public function setValorServicos($valor_servicos)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $valor_servicos)) {
            throw new \Exception('Valor dos Serviços inválido');
        }
        $this->valor_servicos = $valor_servicos;
        return $this;
    }

    public function getValorDeducoes()
    {
        return $this->valor_deducoes;
    }
    
    public function setValorDeducoes($valor_deducoes)
    {
        if (strlen($valor_deducoes) > 15) {
            throw new \Exception('Valor das Deduções inválido');
        }
        $this->valor_deducoes = $valor_deducoes;
        return $this;
    }

    public function getValorDescontoCondicionado()
    {
        return $this->valor_desconto_condicionado;
    }
    
    public function setValorDescontoCondicionado($valor_desconto_condicionado)
    {
        if (strlen($valor_desconto_condicionado) > 15) {
            throw new \Exception('Valor do Desconto Condicionado inválido');
        }
        $this->valor_desconto_condicionado = $valor_desconto_condicionado;
        return $this;
    }

    public function getValorDescontoIncondicionado()
    {
        return $this->valor_desconto_incondicionado;
    }
    
    public function setValorDescontoIncondicionado($valor_desconto_incondicionado)
    {
        if (strlen($valor_desconto_incondicionado) > 15) {
            throw new \Exception('Valor do Desconto Incondicionado inválido');
        }
        $this->valor_desconto_incondicionado = $valor_desconto_incondicionado;
        return $this;
    }

    public function getValorCofins()
    {
        return $this->valor_cofins;
    }
    
    public function setValorCofins($valor_cofins)
    {
        if (strlen($valor_cofins) > 15) {
            throw new \Exception('Valor do COFINS inválido');
        }
        $this->valor_cofins = $valor_cofins;
        return $this;
    }

    public function getValorCsll()
    {
        return $this->valor_csll;
    }
    
    public function setValorCsll($valor_csll)
    {
        if (strlen($valor_csll) > 15) {
            throw new \Exception('Valor do CSLL inválido');
        }
        $this->valor_csll = $valor_csll;
        return $this;
    }

    public function getValorInss()
    {
        return $this->valor_inss;
    }
    
    public function setValorInss($valor_inss)
    {
        if (strlen($valor_inss) > 15) {
            throw new \Exception('Valor do INSS inválido');
        }
        $this->valor_inss = $valor_inss;
        return $this;
    }

    public function getValorIrpj()
    {
        return $this->valor_irpj;
    }
    
    public function setValorIrpj($valor_irpj)
    {
        if (strlen($valor_irpj) > 15) {
            throw new \Exception('Valor do IRPJ inválido');
        }
        $this->valor_irpj = $valor_irpj;
        return $this;
    }

    public function getValorPisPasep()
    {
        return $this->valor_pis_pasep;
    }
    
    public function setValorPisPasep($valor_pis_pasep)
    {
        if (strlen($valor_pis_pasep) > 15) {
            throw new \Exception('Valor do PIS/PASEP inválido');
        }
        $this->valor_pis_pasep = $valor_pis_pasep;
        return $this;
    }

    public function getValorOutrasRetencoes()
    {
        return $this->valor_outras_retencoes;
    }
    
    public function setValorOutrasRetencoes($valor_outras_retencoes)
    {
        if (strlen($valor_outras_retencoes) > 15) {
            throw new \Exception('Valor de Outras Retenções inválido');
        }
        $this->valor_outras_retencoes = $valor_outras_retencoes;
        return $this;
    }

    public function getValorIss()
    {
        return $this->valor_iss;
    }
    
    public function setValorIss($valor_iss)
    {
        if (strlen($valor_iss) > 15) {
            throw new \Exception('Valor do ISS inválido');
        }
        $this->valor_iss = $valor_iss;
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
        $this->iss_retido = $iss_retido;
        return $this;
    }

    public function getDataCompetencia()
    {
        return $this->data_competencia;
    }
    
    public function setDataCompetencia(\DateTime $data_competencia)
    {
        $this->data_competencia = $data_competencia;
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

    public function getSerieRpsSubstituido()
    {
        return $this->serie_rps_substituido;
    }
    
    public function setSerieRpsSubstituido($serie_rps_substituido)
    {
        if (strlen($serie_rps_substituido) > 5) {
            throw new \Exception('Série do RPS Substituído inválido');
        }
        $this->serie_rps_substituido = $serie_rps_substituido;
        return $this;
    }

    public function getNumeroRpsSubstituido()
    {
        return $this->numero_rps_substituido;
    }
    
    public function setNumeroRpsSubstituido($numero_rps_substituido)
    {
        if (strlen($numero_rps_substituido) > 15) {
            throw new \Exception('Número do RPS Substituído inválido');
        }
        $this->numero_rps_substituido = $numero_rps_substituido;
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