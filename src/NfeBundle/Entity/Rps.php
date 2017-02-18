<?php
/**
 * File that brings the Rps class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     Rps
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity;

/**
 * Rps class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class Rps
{
    /**
     * @var integer
     */
    protected $id_rps;
    /**
     * @var integer
     */
    protected $id_lote_rps;
    /**
     * @var LoteRps
     */
    protected $lote_rps;
    /**
     * @var string
     */
    protected $identificacao_venda;
    /**
     * @var integer
     */
    protected $tipo_rps;
    /**
     * @var string
     */
    protected $serie_rps;
    /**
     * @var DateTime
     */
    protected $data_emissao;
    /**
     * @var integer
     */
    protected $status_rps;
    /**
     * @var integer
     */
    protected $tipo_identificao_tomador;
    /**
     * @var integer
     */
    protected $identificacao_tomador;
    /**
     * @var string
     */
    protected $inscricao_municipal_tomador;
    /**
     * @var string
     */
    protected $inscricao_estadual_tomador;
    /**
     * @var string
     */
    protected $nome_tomador;
    /**
     * @var string
     */
    protected $tipo_endereco_tomador;
    /**
     * @var string
     */
    protected $endereco_tomador;
    /**
     * @var string
     */
    protected $numero_endereco_tomador;
    /**
     * @var string
     */
    protected $complemento_endereco_tomador;
    /**
     * @var string
     */
    protected $bairro_tomador;
    /**
     * @var string
     */
    protected $cidade_tomador;
    /**
     * @var string
     */
    protected $uf_tomador;
    /**
     * @var string
     */
    protected $cep_tomador;
    /**
     * @var string
     */
    protected $telefone_tomador;
    /**
     * @var string
     */
    protected $email_tomador;
    /**
     * @var integer
     */
    protected $tipo_tributacao_servico;
    /**
     * @var string
     */
    protected $cidade_prestacao_servico;
    /**
     * @var string
     */
    protected $uf_prestacao_servico;
    /**
     * @var integer
     */
    protected $regime_especial_tributacao;
    /**
     * @var integer
     */
    protected $opcao_pelo_simples;
    /**
     * @var integer
     */
    protected $incentivo_cultural;
    /**
     * @var string
     */
    protected $codigo_servico_federal;
    /**
     * @var integer
     */
    protected $codigo_pais;
    /**
     * @var integer
     */
    protected $codigo_beneficio;
    /**
     * @var string
     */
    protected $codigo_servico_municipal;
    /**
     * @var integer
     */
    protected $aliquota;
    /**
     * @var integer
     */
    protected $valor_servicos;
    /**
     * @var integer
     */
    protected $valor_deducoes;
    /**
     * @var integer
     */
    protected $valor_desconto_condicionado;
    /**
     * @var integer
     */
    protected $valor_desconto_incondicionado;
    /**
     * @var integer
     */
    protected $valor_cofins;
    /**
     * @var integer
     */
    protected $valor_csll;
    /**
     * @var integer
     */
    protected $valor_inss;
    /**
     * @var integer
     */
    protected $valor_irpj;
    /**
     * @var integer
     */
    protected $valor_pis_pasep;
    /**
     * @var integer
     */
    protected $valor_outras_retencoes_federais;
    /**
     * @var integer
     */
    protected $valor_iss;
    /**
     * @var integer
     */
    protected $iss_retido;
    /**
     * @var DateTime
     */
    protected $data_competencia;
    /**
     * @var string
     */
    protected $codigo_obra;
    /**
     * @var string
     */
    protected $anotacao_responsabilidade_tecnica;
    /**
     * @var string
     */
    protected $serie_rps_substituido;
    /**
     * @var integer
     */
    protected $numero_rps_susbtituido;
    /**
     * @var string
     */
    protected $discriminacao_servico;
    
    
    
    

    /**
     * Get idRps
     *
     * @return integer
     */
    public function getIdRps()
    {
        return $this->id_rps;
    }

    /**
     * Set issRetido
     *
     * @param integer $issRetido
     *
     * @return Rps
     */
    public function setIssRetido($issRetido)
    {
        $this->iss_retido = $issRetido;

        return $this;
    }

    /**
     * Get issRetido
     *
     * @return integer
     */
    public function getIssRetido()
    {
        return $this->iss_retido;
    }

    /**
     * Set tipoRps
     *
     * @param integer $tipoRps
     *
     * @return Rps
     */
    public function setTipoRps($tipoRps)
    {
        $this->tipo_rps = $tipoRps;

        return $this;
    }

    /**
     * Get tipoRps
     *
     * @return integer
     */
    public function getTipoRps()
    {
        return $this->tipo_rps;
    }

    /**
     * Set opcaoPeloSimples
     *
     * @param integer $opcaoPeloSimples
     *
     * @return Rps
     */
    public function setOpcaoPeloSimples($opcaoPeloSimples)
    {
        $this->opcao_pelo_simples = $opcaoPeloSimples;

        return $this;
    }

    /**
     * Get opcaoPeloSimples
     *
     * @return integer
     */
    public function getOpcaoPeloSimples()
    {
        return $this->opcao_pelo_simples;
    }

    /**
     * Set statusRps
     *
     * @param integer $statusRps
     *
     * @return Rps
     */
    public function setStatusRps($statusRps)
    {
        $this->status_rps = $statusRps;

        return $this;
    }

    /**
     * Get statusRps
     *
     * @return integer
     */
    public function getStatusRps()
    {
        return $this->status_rps;
    }

    /**
     * Set tipoIdentificaoTomador
     *
     * @param integer $tipoIdentificaoTomador
     *
     * @return Rps
     */
    public function setTipoIdentificaoTomador($tipoIdentificaoTomador)
    {
        $this->tipo_identificao_tomador = $tipoIdentificaoTomador;

        return $this;
    }

    /**
     * Get tipoIdentificaoTomador
     *
     * @return integer
     */
    public function getTipoIdentificaoTomador()
    {
        return $this->tipo_identificao_tomador;
    }

    /**
     * Set incentivoCultural
     *
     * @param integer $incentivoCultural
     *
     * @return Rps
     */
    public function setIncentivoCultural($incentivoCultural)
    {
        $this->incentivo_cultural = $incentivoCultural;

        return $this;
    }

    /**
     * Get incentivoCultural
     *
     * @return integer
     */
    public function getIncentivoCultural()
    {
        return $this->incentivo_cultural;
    }

    /**
     * Set tipoTributacaoServico
     *
     * @param integer $tipoTributacaoServico
     *
     * @return Rps
     */
    public function setTipoTributacaoServico($tipoTributacaoServico)
    {
        $this->tipo_tributacao_servico = $tipoTributacaoServico;

        return $this;
    }

    /**
     * Get tipoTributacaoServico
     *
     * @return integer
     */
    public function getTipoTributacaoServico()
    {
        return $this->tipo_tributacao_servico;
    }

    /**
     * Set regimeEspecialTributacao
     *
     * @param integer $regimeEspecialTributacao
     *
     * @return Rps
     */
    public function setRegimeEspecialTributacao($regimeEspecialTributacao)
    {
        $this->regime_especial_tributacao = $regimeEspecialTributacao;

        return $this;
    }

    /**
     * Get regimeEspecialTributacao
     *
     * @return integer
     */
    public function getRegimeEspecialTributacao()
    {
        return $this->regime_especial_tributacao;
    }

    /**
     * Set ufPrestacaoServico
     *
     * @param string $ufPrestacaoServico
     *
     * @return Rps
     */
    public function setUfPrestacaoServico($ufPrestacaoServico)
    {
        $this->uf_prestacao_servico = $ufPrestacaoServico;

        return $this;
    }

    /**
     * Get ufPrestacaoServico
     *
     * @return string
     */
    public function getUfPrestacaoServico()
    {
        return $this->uf_prestacao_servico;
    }

    /**
     * Set codigoServicoFederal
     *
     * @param string $codigoServicoFederal
     *
     * @return Rps
     */
    public function setCodigoServicoFederal($codigoServicoFederal)
    {
        $this->codigo_servico_federal = $codigoServicoFederal;

        return $this;
    }

    /**
     * Get codigoServicoFederal
     *
     * @return string
     */
    public function getCodigoServicoFederal()
    {
        return $this->codigo_servico_federal;
    }

    /**
     * Set aliquota
     *
     * @param integer $aliquota
     *
     * @return Rps
     */
    public function setAliquota($aliquota)
    {
        $this->aliquota = $aliquota;

        return $this;
    }

    /**
     * Get aliquota
     *
     * @return integer
     */
    public function getAliquota()
    {
        return $this->aliquota;
    }

    /**
     * Set codigoServicoMunicipal
     *
     * @param string $codigoServicoMunicipal
     *
     * @return Rps
     */
    public function setCodigoServicoMunicipal($codigoServicoMunicipal)
    {
        $this->codigo_servico_municipal = $codigoServicoMunicipal;

        return $this;
    }

    /**
     * Get codigoServicoMunicipal
     *
     * @return string
     */
    public function getCodigoServicoMunicipal()
    {
        return $this->codigo_servico_municipal;
    }

    /**
     * Set identificacaoTomador
     *
     * @param integer $identificacaoTomador
     *
     * @return Rps
     */
    public function setIdentificacaoTomador($identificacaoTomador)
    {
        $this->identificacao_tomador = $identificacaoTomador;

        return $this;
    }

    /**
     * Get identificacaoTomador
     *
     * @return integer
     */
    public function getIdentificacaoTomador()
    {
        return $this->identificacao_tomador;
    }

    /**
     * Set valorServicos
     *
     * @param integer $valorServicos
     *
     * @return Rps
     */
    public function setValorServicos($valorServicos)
    {
        $this->valor_servicos = $valorServicos;

        return $this;
    }

    /**
     * Get valorServicos
     *
     * @return integer
     */
    public function getValorServicos()
    {
        return $this->valor_servicos;
    }

    /**
     * Set dataEmissao
     *
     * @param \DateTime $dataEmissao
     *
     * @return Rps
     */
    public function setDataEmissao($dataEmissao)
    {
        $this->data_emissao = $dataEmissao;

        return $this;
    }

    /**
     * Get dataEmissao
     *
     * @return \DateTime
     */
    public function getDataEmissao()
    {
        return $this->data_emissao;
    }

    /**
     * Set dataCompetencia
     *
     * @param \DateTime $dataCompetencia
     *
     * @return Rps
     */
    public function setDataCompetencia($dataCompetencia)
    {
        $this->data_competencia = $dataCompetencia;

        return $this;
    }

    /**
     * Get dataCompetencia
     *
     * @return \DateTime
     */
    public function getDataCompetencia()
    {
        return $this->data_competencia;
    }

    /**
     * Set cidadePrestacaoServico
     *
     * @param string $cidadePrestacaoServico
     *
     * @return Rps
     */
    public function setCidadePrestacaoServico($cidadePrestacaoServico)
    {
        $this->cidade_prestacao_servico = $cidadePrestacaoServico;

        return $this;
    }

    /**
     * Get cidadePrestacaoServico
     *
     * @return string
     */
    public function getCidadePrestacaoServico()
    {
        return $this->cidade_prestacao_servico;
    }

    /**
     * Set discriminacaoServico
     *
     * @param string $discriminacaoServico
     *
     * @return Rps
     */
    public function setDiscriminacaoServico($discriminacaoServico)
    {
        $this->discriminacao_servico = $discriminacaoServico;

        return $this;
    }

    /**
     * Get discriminacaoServico
     *
     * @return string
     */
    public function getDiscriminacaoServico()
    {
        return $this->discriminacao_servico;
    }

    /**
     * Set ufTomador
     *
     * @param string $ufTomador
     *
     * @return Rps
     */
    public function setUfTomador($ufTomador)
    {
        $this->uf_tomador = $ufTomador;

        return $this;
    }

    /**
     * Get ufTomador
     *
     * @return string
     */
    public function getUfTomador()
    {
        return $this->uf_tomador;
    }

    /**
     * Set codigoBeneficio
     *
     * @param integer $codigoBeneficio
     *
     * @return Rps
     */
    public function setCodigoBeneficio($codigoBeneficio)
    {
        $this->codigo_beneficio = $codigoBeneficio;

        return $this;
    }

    /**
     * Get codigoBeneficio
     *
     * @return integer
     */
    public function getCodigoBeneficio()
    {
        return $this->codigo_beneficio;
    }

    /**
     * Set tipoEnderecoTomador
     *
     * @param string $tipoEnderecoTomador
     *
     * @return Rps
     */
    public function setTipoEnderecoTomador($tipoEnderecoTomador)
    {
        $this->tipo_endereco_tomador = $tipoEnderecoTomador;

        return $this;
    }

    /**
     * Get tipoEnderecoTomador
     *
     * @return string
     */
    public function getTipoEnderecoTomador()
    {
        return $this->tipo_endereco_tomador;
    }

    /**
     * Set codigoPais
     *
     * @param integer $codigoPais
     *
     * @return Rps
     */
    public function setCodigoPais($codigoPais)
    {
        $this->codigo_pais = $codigoPais;

        return $this;
    }

    /**
     * Get codigoPais
     *
     * @return integer
     */
    public function getCodigoPais()
    {
        return $this->codigo_pais;
    }

    /**
     * Set serieRps
     *
     * @param string $serieRps
     *
     * @return Rps
     */
    public function setSerieRps($serieRps)
    {
        $this->serie_rps = $serieRps;

        return $this;
    }

    /**
     * Get serieRps
     *
     * @return string
     */
    public function getSerieRps()
    {
        return $this->serie_rps;
    }

    /**
     * Set serieRpsSubstituido
     *
     * @param string $serieRpsSubstituido
     *
     * @return Rps
     */
    public function setSerieRpsSubstituido($serieRpsSubstituido)
    {
        $this->serie_rps_substituido = $serieRpsSubstituido;

        return $this;
    }

    /**
     * Get serieRpsSubstituido
     *
     * @return string
     */
    public function getSerieRpsSubstituido()
    {
        return $this->serie_rps_substituido;
    }

    /**
     * Set idLoteRps
     *
     * @param integer $idLoteRps
     *
     * @return Rps
     */
    public function setIdLoteRps($idLoteRps)
    {
        $this->id_lote_rps = $idLoteRps;

        return $this;
    }

    /**
     * Get idLoteRps
     *
     * @return integer
     */
    public function getIdLoteRps()
    {
        return $this->id_lote_rps;
    }

    /**
     * Set cepTomador
     *
     * @param string $cepTomador
     *
     * @return Rps
     */
    public function setCepTomador($cepTomador)
    {
        $this->cep_tomador = $cepTomador;

        return $this;
    }

    /**
     * Get cepTomador
     *
     * @return string
     */
    public function getCepTomador()
    {
        return $this->cep_tomador;
    }

    /**
     * Set numeroEnderecoTomador
     *
     * @param string $numeroEnderecoTomador
     *
     * @return Rps
     */
    public function setNumeroEnderecoTomador($numeroEnderecoTomador)
    {
        $this->numero_endereco_tomador = $numeroEnderecoTomador;

        return $this;
    }

    /**
     * Get numeroEnderecoTomador
     *
     * @return string
     */
    public function getNumeroEnderecoTomador()
    {
        return $this->numero_endereco_tomador;
    }

    /**
     * Set telefoneTomador
     *
     * @param string $telefoneTomador
     *
     * @return Rps
     */
    public function setTelefoneTomador($telefoneTomador)
    {
        $this->telefone_tomador = $telefoneTomador;

        return $this;
    }

    /**
     * Get telefoneTomador
     *
     * @return string
     */
    public function getTelefoneTomador()
    {
        return $this->telefone_tomador;
    }

    /**
     * Set numeroRpsSusbtituido
     *
     * @param integer $numeroRpsSusbtituido
     *
     * @return Rps
     */
    public function setNumeroRpsSusbtituido($numeroRpsSusbtituido)
    {
        $this->numero_rps_susbtituido = $numeroRpsSusbtituido;

        return $this;
    }

    /**
     * Get numeroRpsSusbtituido
     *
     * @return integer
     */
    public function getNumeroRpsSusbtituido()
    {
        return $this->numero_rps_susbtituido;
    }

    /**
     * Set valorIss
     *
     * @param integer $valorIss
     *
     * @return Rps
     */
    public function setValorIss($valorIss)
    {
        $this->valor_iss = $valorIss;

        return $this;
    }

    /**
     * Get valorIss
     *
     * @return integer
     */
    public function getValorIss()
    {
        return $this->valor_iss;
    }

    /**
     * Set valorPisPasep
     *
     * @param integer $valorPisPasep
     *
     * @return Rps
     */
    public function setValorPisPasep($valorPisPasep)
    {
        $this->valor_pis_pasep = $valorPisPasep;

        return $this;
    }

    /**
     * Get valorPisPasep
     *
     * @return integer
     */
    public function getValorPisPasep()
    {
        return $this->valor_pis_pasep;
    }

    /**
     * Set valorOutrasRetencoesFederais
     *
     * @param integer $valorOutrasRetencoesFederais
     *
     * @return Rps
     */
    public function setValorOutrasRetencoesFederais($valorOutrasRetencoesFederais)
    {
        $this->valor_outras_retencoes_federais = $valorOutrasRetencoesFederais;

        return $this;
    }

    /**
     * Get valorOutrasRetencoesFederais
     *
     * @return integer
     */
    public function getValorOutrasRetencoesFederais()
    {
        return $this->valor_outras_retencoes_federais;
    }

    /**
     * Set valorInss
     *
     * @param integer $valorInss
     *
     * @return Rps
     */
    public function setValorInss($valorInss)
    {
        $this->valor_inss = $valorInss;

        return $this;
    }

    /**
     * Get valorInss
     *
     * @return integer
     */
    public function getValorInss()
    {
        return $this->valor_inss;
    }

    /**
     * Set valorIrpj
     *
     * @param integer $valorIrpj
     *
     * @return Rps
     */
    public function setValorIrpj($valorIrpj)
    {
        $this->valor_irpj = $valorIrpj;

        return $this;
    }

    /**
     * Get valorIrpj
     *
     * @return integer
     */
    public function getValorIrpj()
    {
        return $this->valor_irpj;
    }

    /**
     * Set valorCofins
     *
     * @param integer $valorCofins
     *
     * @return Rps
     */
    public function setValorCofins($valorCofins)
    {
        $this->valor_cofins = $valorCofins;

        return $this;
    }

    /**
     * Get valorCofins
     *
     * @return integer
     */
    public function getValorCofins()
    {
        return $this->valor_cofins;
    }

    /**
     * Set valorCsll
     *
     * @param integer $valorCsll
     *
     * @return Rps
     */
    public function setValorCsll($valorCsll)
    {
        $this->valor_csll = $valorCsll;

        return $this;
    }

    /**
     * Get valorCsll
     *
     * @return integer
     */
    public function getValorCsll()
    {
        return $this->valor_csll;
    }

    /**
     * Set valorDescontoIncondicionado
     *
     * @param integer $valorDescontoIncondicionado
     *
     * @return Rps
     */
    public function setValorDescontoIncondicionado($valorDescontoIncondicionado)
    {
        $this->valor_desconto_incondicionado = $valorDescontoIncondicionado;

        return $this;
    }

    /**
     * Get valorDescontoIncondicionado
     *
     * @return integer
     */
    public function getValorDescontoIncondicionado()
    {
        return $this->valor_desconto_incondicionado;
    }

    /**
     * Set valorDescontoCondicionado
     *
     * @param integer $valorDescontoCondicionado
     *
     * @return Rps
     */
    public function setValorDescontoCondicionado($valorDescontoCondicionado)
    {
        $this->valor_desconto_condicionado = $valorDescontoCondicionado;

        return $this;
    }

    /**
     * Get valorDescontoCondicionado
     *
     * @return integer
     */
    public function getValorDescontoCondicionado()
    {
        return $this->valor_desconto_condicionado;
    }

    /**
     * Set valorDeducoes
     *
     * @param integer $valorDeducoes
     *
     * @return Rps
     */
    public function setValorDeducoes($valorDeducoes)
    {
        $this->valor_deducoes = $valorDeducoes;

        return $this;
    }

    /**
     * Get valorDeducoes
     *
     * @return integer
     */
    public function getValorDeducoes()
    {
        return $this->valor_deducoes;
    }

    /**
     * Set inscricaoEstadualTomador
     *
     * @param string $inscricaoEstadualTomador
     *
     * @return Rps
     */
    public function setInscricaoEstadualTomador($inscricaoEstadualTomador)
    {
        $this->inscricao_estadual_tomador = $inscricaoEstadualTomador;

        return $this;
    }

    /**
     * Get inscricaoEstadualTomador
     *
     * @return string
     */
    public function getInscricaoEstadualTomador()
    {
        return $this->inscricao_estadual_tomador;
    }

    /**
     * Set anotacaoResponsabilidadeTecnica
     *
     * @param string $anotacaoResponsabilidadeTecnica
     *
     * @return Rps
     */
    public function setAnotacaoResponsabilidadeTecnica($anotacaoResponsabilidadeTecnica)
    {
        $this->anotacao_responsabilidade_tecnica = $anotacaoResponsabilidadeTecnica;

        return $this;
    }

    /**
     * Get anotacaoResponsabilidadeTecnica
     *
     * @return string
     */
    public function getAnotacaoResponsabilidadeTecnica()
    {
        return $this->anotacao_responsabilidade_tecnica;
    }

    /**
     * Set codigoObra
     *
     * @param string $codigoObra
     *
     * @return Rps
     */
    public function setCodigoObra($codigoObra)
    {
        $this->codigo_obra = $codigoObra;

        return $this;
    }

    /**
     * Get codigoObra
     *
     * @return string
     */
    public function getCodigoObra()
    {
        return $this->codigo_obra;
    }

    /**
     * Set inscricaoMunicipalTomador
     *
     * @param string $inscricaoMunicipalTomador
     *
     * @return Rps
     */
    public function setInscricaoMunicipalTomador($inscricaoMunicipalTomador)
    {
        $this->inscricao_municipal_tomador = $inscricaoMunicipalTomador;

        return $this;
    }

    /**
     * Get inscricaoMunicipalTomador
     *
     * @return string
     */
    public function getInscricaoMunicipalTomador()
    {
        return $this->inscricao_municipal_tomador;
    }

    /**
     * Set identificacaoVenda
     *
     * @param string $identificacaoVenda
     *
     * @return Rps
     */
    public function setIdentificacaoVenda($identificacaoVenda)
    {
        $this->identificacao_venda = $identificacaoVenda;

        return $this;
    }

    /**
     * Get identificacaoVenda
     *
     * @return string
     */
    public function getIdentificacaoVenda()
    {
        return $this->identificacao_venda;
    }

    /**
     * Set cidadeTomador
     *
     * @param string $cidadeTomador
     *
     * @return Rps
     */
    public function setCidadeTomador($cidadeTomador)
    {
        $this->cidade_tomador = $cidadeTomador;

        return $this;
    }

    /**
     * Get cidadeTomador
     *
     * @return string
     */
    public function getCidadeTomador()
    {
        return $this->cidade_tomador;
    }

    /**
     * Set complementoEnderecoTomador
     *
     * @param string $complementoEnderecoTomador
     *
     * @return Rps
     */
    public function setComplementoEnderecoTomador($complementoEnderecoTomador)
    {
        $this->complemento_endereco_tomador = $complementoEnderecoTomador;

        return $this;
    }

    /**
     * Get complementoEnderecoTomador
     *
     * @return string
     */
    public function getComplementoEnderecoTomador()
    {
        return $this->complemento_endereco_tomador;
    }

    /**
     * Set bairroTomador
     *
     * @param string $bairroTomador
     *
     * @return Rps
     */
    public function setBairroTomador($bairroTomador)
    {
        $this->bairro_tomador = $bairroTomador;

        return $this;
    }

    /**
     * Get bairroTomador
     *
     * @return string
     */
    public function getBairroTomador()
    {
        return $this->bairro_tomador;
    }

    /**
     * Set emailTomador
     *
     * @param string $emailTomador
     *
     * @return Rps
     */
    public function setEmailTomador($emailTomador)
    {
        $this->email_tomador = $emailTomador;

        return $this;
    }

    /**
     * Get emailTomador
     *
     * @return string
     */
    public function getEmailTomador()
    {
        return $this->email_tomador;
    }

    /**
     * Set nomeTomador
     *
     * @param string $nomeTomador
     *
     * @return Rps
     */
    public function setNomeTomador($nomeTomador)
    {
        $this->nome_tomador = $nomeTomador;

        return $this;
    }

    /**
     * Get nomeTomador
     *
     * @return string
     */
    public function getNomeTomador()
    {
        return $this->nome_tomador;
    }

    /**
     * Set enderecoTomador
     *
     * @param string $enderecoTomador
     *
     * @return Rps
     */
    public function setEnderecoTomador($enderecoTomador)
    {
        $this->endereco_tomador = $enderecoTomador;

        return $this;
    }

    /**
     * Get enderecoTomador
     *
     * @return string
     */
    public function getEnderecoTomador()
    {
        return $this->endereco_tomador;
    }

    /**
     * Set loteRps
     *
     * @param \NfeBundle\Entity\LoteRps $loteRps
     *
     * @return Rps
     */
    public function setLoteRps(\NfeBundle\Entity\LoteRps $loteRps = null)
    {
        $this->lote_rps = $loteRps;

        return $this;
    }

    /**
     * Get loteRps
     *
     * @return \NfeBundle\Entity\LoteRps
     */
    public function getLoteRps()
    {
        return $this->lote_rps;
    }
}
