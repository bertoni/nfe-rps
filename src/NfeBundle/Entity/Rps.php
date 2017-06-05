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
    protected $data_criacao;
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
    protected $codigo_verificacao;
    /**
     * @var integer
     */
    protected $numero_nf;
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
     * @var string
     */
    protected $link_nf;


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
     * @throws Exception
     */
    public function setIssRetido($issRetido)
    {
        if (!strlen($issRetido)) {
            throw new \Exception('ISS retido não informado');
        }
        if (!preg_match('/[0-1]{1}/', $issRetido)) {
            throw new \Exception('ISS retido inválido');
        }
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
     * @throws Exception
     */
    public function setTipoRps($tipoRps)
    {
        if (!strlen($tipoRps)) {
            throw new \Exception('Tipo RPS não informado');
        }
        if (!preg_match('/[0-1]{1}/', $tipoRps)) {
            throw new \Exception('Tipo RPS inválido');
        }
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
     * @throws Exception
     */
    public function setOpcaoPeloSimples($opcaoPeloSimples)
    {
        if (!strlen($opcaoPeloSimples)) {
            throw new \Exception('Opção pelo Simples não informado');
        }
        if (!preg_match('/[0-1]{1}/', $opcaoPeloSimples)) {
            throw new \Exception('Opção pelo Simples inválido');
        }
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
     * @throws Exception
     */
    public function setStatusRps($statusRps)
    {
        if (!strlen($statusRps)) {
            throw new \Exception('Status RPS não informado');
        }
        if (!preg_match('/[1-2]{1}/', $statusRps)) {
            throw new \Exception('Status RPS inválido');
        }
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
     * @throws Exception
     */
    public function setTipoIdentificaoTomador($tipoIdentificaoTomador)
    {
        if (!strlen($tipoIdentificaoTomador)) {
            throw new \Exception('Tipo Identificador do Tomador não informado');
        }
        if (!preg_match('/[1-2]{1}/', $tipoIdentificaoTomador)) {
            throw new \Exception('Tipo Identificador do Tomador inválido');
        }
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
     * @throws Exception
     */
    public function setIncentivoCultural($incentivoCultural)
    {
        if (!strlen($incentivoCultural)) {
            throw new \Exception('Incentivo Cultural não informado');
        }
        if (!preg_match('/[0-1]{1}/', $incentivoCultural)) {
            throw new \Exception('Incentivo Cultural inválido');
        }
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
     * @throws Exception
     */
    public function setTipoTributacaoServico($tipoTributacaoServico)
    {
        if (!strlen($tipoTributacaoServico)) {
            throw new \Exception('Tipo da Tributação do Serviço não informado');
        }
        if (!preg_match('/[1-6]{1}/', $tipoTributacaoServico)) {
            throw new \Exception('Tipo da Tributação do Serviço inválido');
        }
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
     * @throws Exception
     */
    public function setRegimeEspecialTributacao($regimeEspecialTributacao)
    {
        if (!strlen($regimeEspecialTributacao)) {
            throw new \Exception('Regime Especial da Tributação não informado');
        }
        if (!preg_match('/[0-6]{1}/', $regimeEspecialTributacao)) {
            throw new \Exception('Regime Especial da Tributação inválido');
        }
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
     * @throws Exception
     */
    public function setUfPrestacaoServico($ufPrestacaoServico)
    {
        if (!strlen($ufPrestacaoServico)) {
            throw new \Exception('UF da Prestação do Serviço não informado');
        }
        if (strlen($ufPrestacaoServico) != 2) {
            throw new \Exception('UF da Prestação do Serviço inválido');
        }
        $this->uf_prestacao_servico = mb_convert_case($ufPrestacaoServico, MB_CASE_UPPER, 'UTF-8');

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
     * @throws Exception
     */
    public function setCodigoServicoFederal($codigoServicoFederal)
    {
        $codigoServicoFederal = preg_replace('/[^0-9]/', '', $codigoServicoFederal);
        if (!strlen($codigoServicoFederal)) {
            throw new \Exception('Código do Serviço Federal não informado');
        }
        if (strlen($codigoServicoFederal) > 4) {
            throw new \Exception('Código do Serviço Federal inválido');
        }
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
     * @throws Exception
     */
    public function setAliquota($aliquota)
    {
        if (!strlen($aliquota)) {
            throw new \Exception('Alíquota não informado');
        }
        if (!is_numeric($aliquota) || $aliquota < 0 || $aliquota > 99999) {
            throw new \Exception('Alíquota inválida');
        }
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
     * @throws Exception
     */
    public function setCodigoServicoMunicipal($codigoServicoMunicipal)
    {
        $codigoServicoMunicipal = preg_replace('/[^0-9]/', '', $codigoServicoMunicipal);
        if (!strlen($codigoServicoMunicipal)) {
            throw new \Exception('Código do Serviço Municipal não informado');
        }
        if (strlen($codigoServicoMunicipal) > 6) {
            throw new \Exception('Código do Serviço Municipal inválido');
        }
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
     * @throws Exception
     */
    public function setIdentificacaoTomador($identificacaoTomador)
    {
        if (!strlen($identificacaoTomador)) {
            throw new \Exception('Identificação do Tomador não informado');
        }
        if (preg_match('/[^0-9]/', $identificacaoTomador)) {
            throw new \Exception('Identificação do Tomador inválido');
        }
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
     * @throws Exception
     */
    public function setValorServicos($valorServicos)
    {
        if (!strlen($valorServicos)) {
            throw new \Exception('Valor dos Serviços não informado');
        }
        if (!is_numeric($valorServicos) || $valorServicos < 0 || $valorServicos > 999999999999999) {
            throw new \Exception('Valor dos Serviços inválido');
        }
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
     * Set dataCriacao
     *
     * @param DateTime $dataCriacao
     *
     * @return Rps
     */
    public function setDataCriacao(\DateTime $dataCriacao)
    {
        $this->data_criacao = $dataCriacao;

        return $this;
    }

    /**
     * Get dataCriacao
     *
     * @return DateTime
     */
    public function getDataCriacao()
    {
        return $this->data_criacao;
    }

    /**
     * Set dataEmissao
     *
     * @param DateTime $dataEmissao
     *
     * @return Rps
     */
    public function setDataEmissao(\DateTime $dataEmissao)
    {
        $this->data_emissao = $dataEmissao;

        return $this;
    }

    /**
     * Get dataEmissao
     *
     * @return DateTime
     */
    public function getDataEmissao()
    {
        return $this->data_emissao;
    }

    /**
     * Set dataCompetencia
     *
     * @param DateTime $dataCompetencia
     *
     * @return Rps
     */
    public function setDataCompetencia(\DateTime $dataCompetencia)
    {
        $this->data_competencia = $dataCompetencia;

        return $this;
    }

    /**
     * Get dataCompetencia
     *
     * @return DateTime
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
     * @throws Exception
     */
    public function setCidadePrestacaoServico($cidadePrestacaoServico)
    {
        if (!strlen($cidadePrestacaoServico)) {
            throw new \Exception('Cidade da Prestação do Serviço não informado');
        }
        if (strlen($cidadePrestacaoServico) > 50) {
            throw new \Exception('Cidade da Prestação do Serviço inválido');
        }
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
     * @throws Exception
     */
    public function setDiscriminacaoServico($discriminacaoServico)
    {
        if (!strlen($discriminacaoServico)) {
            throw new \Exception('Discriminação do Serviço não informado');
        }
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
     * @throws Exception
     */
    public function setUfTomador($ufTomador)
    {
        if (!empty($ufTomador) && strlen($ufTomador) != 2) {
            throw new \Exception('UF do Tomador inválido');
        }
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
     * @throws Exception
     */
    public function setCodigoBeneficio($codigoBeneficio)
    {
        if (!is_null($codigoBeneficio) && (!strlen($codigoBeneficio) || strlen($codigoBeneficio) > 3)) {
            throw new \Exception('Código do Benefício inválido');
        }
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
     * @throws Exception
     */
    public function setTipoEnderecoTomador($tipoEnderecoTomador)
    {
        if (!is_null($tipoEnderecoTomador) && (!strlen($tipoEnderecoTomador) || strlen($tipoEnderecoTomador) > 3)) {
            throw new \Exception('Tipo de Endereço do Tomador inválido');
        }
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
     * @throws Exception
     */
    public function setCodigoPais($codigoPais)
    {
        if (!is_null($codigoPais) && (!is_numeric($codigoPais) || $codigoPais < 0 || $codigoPais > 99999)) {
            throw new \Exception('Código do País inválido');
        }
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
     * @throws Exception
     */
    public function setSerieRps($serieRps)
    {
        if (!is_null($serieRps) && (!strlen($serieRps) || strlen($serieRps) > 5)) {
            throw new \Exception('Série do RPS inválido');
        }
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
     * @throws Exception
     */
    public function setSerieRpsSubstituido($serieRpsSubstituido)
    {
        if (!is_null($serieRpsSubstituido) && (!strlen($serieRpsSubstituido) || strlen($serieRpsSubstituido) > 5)) {
            throw new \Exception('Série do RPS Substituído inválido');
        }
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
     * @throws Exception
     */
    public function setIdLoteRps($idLoteRps)
    {
        if (!is_null($idLoteRps) && (!is_numeric($idLoteRps) || $idLoteRps < 0 || $idLoteRps > 9999999999)) {
            throw new \Exception('Id do Lote de RPS inválido');
        }
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
     * @throws Exception
     */
    public function setCepTomador($cepTomador)
    {
        if (!is_null($cepTomador)) {
            $cepTomador = preg_replace('/[^0-9]/', '', $cepTomador);
            if (!is_numeric($cepTomador) || $cepTomador < 0 || $cepTomador > 99999999) {
                throw new \Exception('CEP do Tomador inválido');
            }
        }
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
     * Set codigo_verificacao
     *
     * @param string $codigo_verificacao
     *
     * @return Rps
     * @throws Exception
     */
    public function setCodigoVerificacao($codigo_verificacao)
    {
        if (!is_null($codigo_verificacao) && strlen($codigo_verificacao) > 9) {
            throw new \Exception('Código de verificação inválido');
        }
        $this->codigo_verificacao = $codigo_verificacao;

        return $this;
    }

    /**
     * Get codigo_verificacao
     *
     * @return string
     */
    public function getCodigoVerificacao()
    {
        return $this->codigo_verificacao;
    }

    /**
     * Set numeroNf
     *
     * @param integer $numeroNf
     *
     * @return Rps
     * @throws Exception
     */
    public function setNumeroNf($numeroNf)
    {
        if (!is_null($numeroNf)) {
            $numeroNf = preg_replace('/[^0-9]/', '', $numeroNf);
            if (!is_numeric($numeroNf) || $numeroNf < 0 || $numeroNf > 9999999999) {
                throw new \Exception('Número da NF inválido');
            }
        }
        $this->numero_nf = $numeroNf;

        return $this;
    }

    /**
     * Get numeroNf
     *
     * @return integer
     */
    public function getNumeroNf()
    {
        return $this->numero_nf;
    }

    /**
     * Set numeroEnderecoTomador
     *
     * @param string $numeroEnderecoTomador
     *
     * @return Rps
     * @throws Exception
     */
    public function setNumeroEnderecoTomador($numeroEnderecoTomador)
    {
        if (!is_null($numeroEnderecoTomador)) {
            if (strlen($numeroEnderecoTomador) > 10) {
                throw new \Exception('Número do Endereço do Tamador inválido');
            }
        }
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
     * @throws Exception
     */
    public function setTelefoneTomador($telefoneTomador)
    {
        if (!is_null($telefoneTomador)) {
            if (strlen($telefoneTomador) > 11) {
                throw new \Exception('Telefone do Tamador inválido');
            }
        }
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
     * @throws Exception
     */
    public function setNumeroRpsSusbtituido($numeroRpsSusbtituido)
    {
        if (!is_null($numeroRpsSusbtituido)) {
            if (!is_numeric($numeroRpsSusbtituido) || $numeroRpsSusbtituido < 0 || $numeroRpsSusbtituido > 999999999999999) {
                throw new \Exception('Número do RPS substituído inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorIss($valorIss)
    {
        if (!is_null($valorIss)) {
            if (!is_numeric($valorIss) || $valorIss < 0 || $valorIss > 999999999999999) {
                throw new \Exception('Valor do ISS inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorPisPasep($valorPisPasep)
    {
        if (!is_null($valorPisPasep)) {
            if (!is_numeric($valorPisPasep) || $valorPisPasep < 0 || $valorPisPasep > 999999999999999) {
                throw new \Exception('Valor do PIS/PASEP inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorOutrasRetencoesFederais($valorOutrasRetencoesFederais)
    {
        if (!is_null($valorOutrasRetencoesFederais)) {
            if (!is_numeric($valorOutrasRetencoesFederais) || $valorOutrasRetencoesFederais < 0 || $valorOutrasRetencoesFederais > 999999999999999) {
                throw new \Exception('Valor de outras Retenções Federais inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorInss($valorInss)
    {
        if (!is_null($valorInss)) {
            if (!is_numeric($valorInss) || $valorInss < 0 || $valorInss > 999999999999999) {
                throw new \Exception('Valor do INSS inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorIrpj($valorIrpj)
    {
        if (!is_null($valorIrpj)) {
            if (!is_numeric($valorIrpj) || $valorIrpj < 0 || $valorIrpj > 999999999999999) {
                throw new \Exception('Valor do IRPJ inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorCofins($valorCofins)
    {
        if (!is_null($valorCofins)) {
            if (!is_numeric($valorCofins) || $valorCofins < 0 || $valorCofins > 999999999999999) {
                throw new \Exception('Valor do COFINS inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorCsll($valorCsll)
    {
        if (!is_null($valorCsll)) {
            if (!is_numeric($valorCsll) || $valorCsll < 0 || $valorCsll > 999999999999999) {
                throw new \Exception('Valor do CSLL inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorDescontoIncondicionado($valorDescontoIncondicionado)
    {
        if (!is_null($valorDescontoIncondicionado)) {
            if (!is_numeric($valorDescontoIncondicionado) || $valorDescontoIncondicionado < 0 || $valorDescontoIncondicionado > 999999999999999) {
                throw new \Exception('Valor do Desconto Incondicionado inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorDescontoCondicionado($valorDescontoCondicionado)
    {
        if (!is_null($valorDescontoCondicionado)) {
            if (!is_numeric($valorDescontoCondicionado) || $valorDescontoCondicionado < 0 || $valorDescontoCondicionado > 999999999999999) {
                throw new \Exception('Valor do Desconto Condicionado inválido');
            }
        }
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
     * @throws Exception
     */
    public function setValorDeducoes($valorDeducoes)
    {
        if (!is_null($valorDeducoes)) {
            if (!is_numeric($valorDeducoes) || $valorDeducoes < 0 || $valorDeducoes > 999999999999999) {
                throw new \Exception('Valor das Deduções inválido');
            }
        }
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
     * @throws Exception
     */
    public function setInscricaoEstadualTomador($inscricaoEstadualTomador)
    {
        if (!is_null($inscricaoEstadualTomador)) {
            if (strlen($inscricaoEstadualTomador) > 15) {
                throw new \Exception('Inscrição Estadual do Tomador inválida');
            }
        }
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
     * @throws Exception
     */
    public function setAnotacaoResponsabilidadeTecnica($anotacaoResponsabilidadeTecnica)
    {
        if (!is_null($anotacaoResponsabilidadeTecnica)) {
            if (strlen($anotacaoResponsabilidadeTecnica) > 15) {
                throw new \Exception('Anotação de Responsabilidade Técnica inválida');
            }
        }
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
     * @throws Exception
     */
    public function setCodigoObra($codigoObra)
    {
        if (!is_null($codigoObra)) {
            if (strlen($codigoObra) > 15) {
                throw new \Exception('Código da Obra inválido');
            }
        }
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
     * @throws Exception
     */
    public function setInscricaoMunicipalTomador($inscricaoMunicipalTomador)
    {
        if (!is_null($inscricaoMunicipalTomador)) {
            if (strlen($inscricaoMunicipalTomador) > 15) {
                throw new \Exception('Inscrição Municipal do Tomador inválida');
            }
        }
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
     * @throws Exception
     */
    public function setIdentificacaoVenda($identificacaoVenda)
    {
        if (!is_null($identificacaoVenda)) {
            if (strlen($identificacaoVenda) > 255) {
                throw new \Exception('Identificação da Venda inválida');
            }
        }
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
     * @throws Exception
     */
    public function setCidadeTomador($cidadeTomador)
    {
        if (!is_null($cidadeTomador)) {
            if (strlen($cidadeTomador) > 50) {
                throw new \Exception('Cidade do Tomador inválida');
            }
        }
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
     * @throws Exception
     */
    public function setComplementoEnderecoTomador($complementoEnderecoTomador)
    {
        if (!is_null($complementoEnderecoTomador)) {
            if (strlen($complementoEnderecoTomador) > 60) {
                throw new \Exception('Complemento do Endereço do Tomador inválido');
            }
        }
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
     * @throws Exception
     */
    public function setBairroTomador($bairroTomador)
    {
        if (!is_null($bairroTomador)) {
            if (strlen($bairroTomador) > 72) {
                throw new \Exception('Bairro do Tomador inválido');
            }
        }
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
     * @throws Exception
     */
    public function setEmailTomador($emailTomador)
    {
        if (!is_null($emailTomador)) {
            if (strlen($emailTomador) > 80) {
                throw new \Exception('E-mail do Tomador inválido');
            }
        }
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
     * @throws Exception
     */
    public function setNomeTomador($nomeTomador)
    {
        if (!is_null($nomeTomador)) {
            if (strlen($nomeTomador) > 115) {
                throw new \Exception('Nome do Tomador inválido');
            }
        }
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
     * @throws Exception
     */
    public function setEnderecoTomador($enderecoTomador)
    {
        if (!is_null($enderecoTomador)) {
            if (strlen($enderecoTomador) > 125) {
                throw new \Exception('Endereço do Tomador inválido');
            }
        }
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

    /**
     * Set link_nf
     *
     * @param string $link_nf
     *
     * @return Rps
     * @throws Exception
     */
    public function setLinkNf($link_nf)
    {
        if (!is_null($link_nf) && strlen($link_nf) > 255) {
            throw new \Exception('Link da Nota Fiscal inválida');
        }
        $this->link_nf = $link_nf;

        return $this;
    }

    /**
     * Get link_nf
     *
     * @return string
     */
    public function getLinkNf()
    {
        return $this->link_nf;
    }
}
