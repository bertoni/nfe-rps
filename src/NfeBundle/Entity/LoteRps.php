<?php
/**
 * File that brings the Lote Rps class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     LoteRps
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity;

/**
 * Lote Rps class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class LoteRps
{
    /**
     * @var integer
     */
    protected $id_lote_rps;
    /**
     * @var integer
     */
    protected $enviado;
    /**
     * @var DateTime
     */
    protected $data_cadastro;
    /**
     * @var DateTime
     */
    protected $data_periodo_inicial;
    /**
     * @var DateTime
     */
    protected $data_periodo_final;
    /**
     * @var integer
     */
    protected $valor_total;
    /**
     * @var integer
     */
    protected $valor_deducao;
    /**
     * @var integer
     */
    protected $valor_iss;
    /**
     * @var integer
     */
    protected $valor_credito;

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
     * Set enviado
     *
     * @param integer $enviado
     *
     * @return LoteRps
     * @throws Exception
     */
    public function setEnviado($enviado)
    {
        if (!strlen($enviado)) {
            throw new \Exception('Status de enviado não informado');
        }
        if (!preg_match('/[0-1]{1}/', $enviado)) {
            throw new \Exception('Status de enviado no formato inválido');
        }
        $this->enviado = $enviado;

        return $this;
    }

    /**
     * Get enviado
     *
     * @return integer
     */
    public function getEnviado()
    {
        return $this->enviado;
    }

    /**
     * Set dataCadastro
     *
     * @param DateTime $dataCadastro
     *
     * @return LoteRps
     */
    public function setDataCadastro(\DateTime $dataCadastro)
    {
        $this->data_cadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return DateTime
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * Set dataPeriodoInicial
     *
     * @param DateTime $dataPeriodoInicial
     *
     * @return LoteRps
     * @throws Exception
     */
    public function setDataPeriodoInicial($dataPeriodoInicial)
    {
        if (!is_null($dataPeriodoInicial) && !$dataPeriodoInicial instanceof \DateTime) {
            throw new \Exception('Data de Período Inicial inválida');
        }
        $this->data_periodo_inicial = $dataPeriodoInicial;

        return $this;
    }

    /**
     * Get dataPeriodoInicial
     *
     * @return DateTime
     */
    public function getDataPeriodoInicial()
    {
        return $this->data_periodo_inicial;
    }

    /**
     * Set dataPeriodoFinal
     *
     * @param DateTime $dataPeriodoFinal
     *
     * @return LoteRps
     * @throws Exception
     */
    public function setDataPeriodoFinal($dataPeriodoFinal)
    {
        if (!is_null($dataPeriodoFinal) && !$dataPeriodoFinal instanceof \DateTime) {
            throw new \Exception('Data de Período Final inválida');
        }
        $this->data_periodo_final = $dataPeriodoFinal;

        return $this;
    }

    /**
     * Get dataPeriodoFinal
     *
     * @return DateTime
     */
    public function getDataPeriodoFinal()
    {
        return $this->data_periodo_final;
    }

    /**
     * Set valorTotal
     *
     * @param integer $valorTotal
     *
     * @return LoteRps
     * @throws Exception
     */
    public function setValorTotal($valorTotal)
    {
        if (!is_null($valorTotal)) {
            if (!is_numeric($valorTotal)) {
                throw new \Exception('Valor Total inválido');
            }
            if ($valorTotal < 0) {
                throw new \Exception('Valor Total negativo');
            }
            if ($valorTotal > 99999999999) {
                throw new \Exception('Valor Total maior que 99999999999');
            }
        }
        $this->valor_total = $valorTotal;

        return $this;
    }

    /**
     * Get valorTotal
     *
     * @return integer
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * Set valorDeducao
     *
     * @param integer $valorDeducao
     *
     * @return LoteRps
     * @throws Exception
     */
    public function setValorDeducao($valorDeducao)
    {
        if (!is_null($valorDeducao)) {
            if (!is_numeric($valorDeducao)) {
                throw new \Exception('Valor dedução inválido');
            }
            if ($valorDeducao < 0) {
                throw new \Exception('Valor dedução negativo');
            }
            if ($valorDeducao > 99999999999) {
                throw new \Exception('Valor dedução maior que 99999999999');
            }
        }
        $this->valor_deducao = $valorDeducao;

        return $this;
    }

    /**
     * Get valorDeducao
     *
     * @return integer
     */
    public function getValorDeducao()
    {
        return $this->valor_deducao;
    }

    /**
     * Set valorIss
     *
     * @param integer $valorIss
     *
     * @return LoteRps
     * @throws Exception
     */
    public function setValorIss($valorIss)
    {
        if (!is_null($valorIss)) {
            if (!is_numeric($valorIss)) {
                throw new \Exception('Valor ISS inválido');
            }
            if ($valorIss < 0) {
                throw new \Exception('Valor ISS negativo');
            }
            if ($valorIss > 99999999999) {
                throw new \Exception('Valor ISS maior que 99999999999');
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
     * Set valorCredito
     *
     * @param integer $valorCredito
     *
     * @return LoteRps
     * @throws Exception
     */
    public function setValorCredito($valorCredito)
    {
        if (!is_null($valorCredito)) {
            if (!is_numeric($valorCredito)) {
                throw new \Exception('Valor Crédito inválido');
            }
            if ($valorCredito < 0) {
                throw new \Exception('Valor Crédito negativo');
            }
            if ($valorCredito > 99999999999) {
                throw new \Exception('Valor Crédito maior que 99999999999');
            }
        }
        $this->valor_credito = $valorCredito;

        return $this;
    }

    /**
     * Get valorCredito
     *
     * @return integer
     */
    public function getValorCredito()
    {
        return $this->valor_credito;
    }
}
