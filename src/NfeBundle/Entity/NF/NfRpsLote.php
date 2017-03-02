<?php
/**
 * File that brings the NF RPS Lote class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfRpsLote
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

use NfeBundle\Entity\NF\Nflayout;
use NfeBundle\Entity\NF\NfRps;

/**
 * NF RPS Lote class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfRpsLote
{
    protected $Header;
    protected $Footer;
    protected $Rps;
    protected $Layout;

    public function __construct(Nflayout $Layout, $tipo_identificacao_contribuinte, $identificacao_contribuinte, $inscricao_municipal_contribuinte)
    {
        $this->Rps    = new \ArrayObject(array());
        $this->Layout = $Layout;
        $this->Footer = new NfFooter();
        $this->Header = new NfHeader();
        $this->Header->setTipoIdentificacaoContribuinte($tipo_identificacao_contribuinte)
            ->setIdentificacaoContribuinte($identificacao_contribuinte)
            ->setInscricaoMunicipalContribuinte($inscricao_municipal_contribuinte);
    }

    public function getHeader()
    {
        return $this->Header;
    }

    public function getFooter()
    {
        return $this->Footer;
    }

    public function getRps()
    {
        return $this->Rps;
    }
    
    public function setRps(NfRps $NfRps)
    {
        if (!$this->Rps->offsetExists($NfRps->getNumeroRps())) {
            $this->Rps->offsetSet($NfRps->getNumeroRps(), $NfRps);
        }
    }

    public function process()
    {
        $valor_total = $valor_deducao = $valor_desconto_condicionado = $valor_desconto_incondicionado = 0;
        
        $initial_period = $final_period = null;
        $Iterator       = $this->Rps->getIterator();
        while ($Iterator->valid()) {
            if (is_null($initial_period)) {
                $initial_period = $Iterator->current()->getDataEmissao();
                $final_period   = $Iterator->current()->getDataEmissao();
            }
            if ($Iterator->current()->getDataEmissao() < $initial_period) {
                $initial_period = $Iterator->current()->getDataEmissao();
            }
            if ($Iterator->current()->getDataEmissao() > $final_period) {
                $final_period = $Iterator->current()->getDataEmissao();
            }
            $valor_total                   += $Iterator->current()->getValorServicos();
            $valor_deducao                 += (strlen($Iterator->current()->getValorDeducoes()) ? $Iterator->current()->getValorDeducoes() : 0);
            $valor_desconto_condicionado   += (strlen($Iterator->current()->getValorDescontoCondicionado()) ? $Iterator->current()->getValorDescontoCondicionado() : 0);
            $valor_desconto_incondicionado += (strlen($Iterator->current()->getValorDescontoIncondicionado()) ? $Iterator->current()->getValorDescontoIncondicionado() : 0);
            $Iterator->next();
        }
        
        $this->getHeader()->setInicioPeriodo($initial_period)
            ->setTerminoPeriodo($final_period);
        
        $this->getFooter()->setNumeroLinhas($this->Rps->count())
            ->setValorTotal($valor_total)
            ->setValorDeducoes($valor_deducao)
            ->setValorDescontosCondicionados($valor_desconto_condicionado)
            ->setValorDescontosIncondicionados($valor_desconto_incondicionado);

        try {
            $this->Layout->process($this);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getContent()
    {
        return $this->Layout->getContent();
    }
}