<?php
/**
 * File that brings the NF Return Header class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfReturnHeader
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

/**
 * NF Return Header class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnHeader
{
    protected $tipo_registro = 10;
    protected $versao_arquivo = 3;
    protected $tipo_identificacao_contribuinte;
    protected $identificacao_contribuinte;
    protected $inscricao_municipal_contribuinte;
    protected $inicio_periodo;
    protected $termino_periodo;

    public function getTipoRegistro()
    {
        return $this->tipo_registro;
    }

    public function getVersaoArquivo()
    {
        return $this->versao_arquivo;
    }

    public function getTipoIdentificacaoContribuinte()
    {
        return $this->tipo_identificacao_contribuinte;
    }

    public function setTipoIdentificacaoContribuinte($tipo_identificacao_contribuinte)
    {
        if (!preg_match('/^[1-2]{1}$/', $tipo_identificacao_contribuinte)) {
            throw new \Exception('Tipo de identificação do contribuinte inválida');
        }
        $this->tipo_identificacao_contribuinte = $tipo_identificacao_contribuinte;

        return $this;
    }

    public function getIdentificacaoContribuinte()
    {
        return $this->identificacao_contribuinte;
    }

    public function setIdentificacaoContribuinte($identificacao_contribuinte)
    {
        if (!preg_match('/^[0-9]{11,14}$/', $identificacao_contribuinte)) {
            throw new \Exception('Identificação do contribuinte inválida');
        }
        $this->identificacao_contribuinte = $identificacao_contribuinte;

        return $this;
    }

    public function getInscricaoMunicipalContribuinte()
    {
        return $this->inscricao_municipal_contribuinte;
    }

    public function setInscricaoMunicipalContribuinte($inscricao_municipal_contribuinte)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $inscricao_municipal_contribuinte)) {
            throw new \Exception('Inscrição Municipal do contribuinte inválida');
        }
        $this->inscricao_municipal_contribuinte = $inscricao_municipal_contribuinte;

        return $this;
    }

    public function getInicioPeriodo()
    {
        return $this->inicio_periodo;
    }

    public function setInicioPeriodo(\DateTime $inicio_periodo)
    {
        $this->inicio_periodo = $inicio_periodo;
        return $this;
    }

    public function getTerminoPeriodo()
    {
        return $this->termino_periodo;
    }

    public function setTerminoPeriodo(\DateTime $termino_periodo)
    {
        $this->termino_periodo = $termino_periodo;
        return $this;
    }
}
