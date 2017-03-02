<?php
/**
 * File that brings the NF Footer class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfFooter
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

/**
 * NF Footer class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfFooter
{
    protected $tipo_registro = 90;
    protected $numero_linhas;
    protected $valor_total;
    protected $valor_deducoes;
    protected $valor_descontos_condicionados;
    protected $valor_descontos_incondicionados;

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
        $this->numero_linhas = $numero_linhas;
    
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
        $this->valor_total = $valor_total;
    
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
        $this->valor_deducoes = $valor_deducoes;
    
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
        $this->valor_descontos_condicionados = $valor_descontos_condicionados;
    
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
        $this->valor_descontos_incondicionados = $valor_descontos_incondicionados;
    
        return $this;
    }
}