<?php
/**
 * File that brings the NF Return Footer class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfReturnFooter
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

/**
 * NF Return Footer class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnFooter
{
    protected $tipo_registro = 90;
    protected $numero_linhas;
    protected $valor_total;
    protected $valor_deducoes;
    protected $valor_descontos_condicionados;
    protected $valor_descontos_incondicionados;
    protected $valor_cofins;
    protected $valor_csll;
    protected $valor_inss;
    protected $valor_irpj;
    protected $valor_pis_pasep;
    protected $valor_outras_retencoes;
    protected $valor_iss;
    protected $valor_creditos;

    public function getTipoRegistro()
    {
        return $this->tipo_registro;
    }

    public function getNumeroLinhas()
    {
        return $this->numero_linhas;
    }

    public function setNumeroLinhas($numero_linhas)
    {
        if (!preg_match('/^[0-9]{1,8}$/', $numero_linhas)) {
            throw new \Exception('Número de linhas inválido');
        }
        $this->numero_linhas = (int)$numero_linhas;

        return $this;
    }

    public function getValorTotal()
    {
        return $this->valor_total;
    }

    public function setValorTotal($valor_total)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $valor_total)) {
            throw new \Exception('Valor total inválido');
        }
        $this->valor_total = (int)$valor_total;

        return $this;
    }

    public function getValorDeducoes()
    {
        return $this->valor_deducoes;
    }

    public function setValorDeducoes($valor_deducoes)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $valor_deducoes)) {
            throw new \Exception('Valor das deduções inválido');
        }
        $this->valor_deducoes = (int)$valor_deducoes;

        return $this;
    }

    public function getValorDescontosCondicionados()
    {
        return $this->valor_descontos_condicionados;
    }

    public function setValorDescontosCondicionados($valor_descontos_condicionados)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $valor_descontos_condicionados)) {
            throw new \Exception('Valor dos descontos condicionados inválido');
        }
        $this->valor_descontos_condicionados = (int)$valor_descontos_condicionados;

        return $this;
    }

    public function getValorDescontosIncondicionados()
    {
        return $this->valor_descontos_incondicionados;
    }

    public function setValorDescontosIncondicionados($valor_descontos_incondicionados)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $valor_descontos_incondicionados)) {
            throw new \Exception('Valor dos descontos incondicionados inválido');
        }
        $this->valor_descontos_incondicionados = (int)$valor_descontos_incondicionados;

        return $this;
    }

    public function getValorCofins()
    {
        return $this->valor_cofins;
    }

    public function setValorCofins($valor_cofins)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $valor_cofins)) {
            throw new \Exception('Valor do cofins inválido');
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
        if (!preg_match('/^[0-9]{1,15}$/', $valor_csll)) {
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
        if (!preg_match('/^[0-9]{1,15}$/', $valor_inss)) {
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
        if (!preg_match('/^[0-9]{1,15}$/', $valor_irpj)) {
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
        if (!preg_match('/^[0-9]{1,15}$/', $valor_pis_pasep)) {
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
        if (!preg_match('/^[0-9]{1,15}$/', $valor_outras_retencoes)) {
            throw new \Exception('Valor de outras Retenções inválido');
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
        if (!preg_match('/^[0-9]{1,15}$/', $valor_iss)) {
            throw new \Exception('Valor do ISS inválido');
        }
        $this->valor_iss = (int)$valor_iss;

        return $this;
    }

    public function getValorCredito()
    {
        return $this->valor_creditos;
    }

    public function setValorCredito($valor_creditos)
    {
        if (!preg_match('/^[0-9]{1,15}$/', $valor_creditos)) {
            throw new \Exception('Valor dos Créditos inválido');
        }
        $this->valor_creditos = (int)$valor_creditos;

        return $this;
    }
}
