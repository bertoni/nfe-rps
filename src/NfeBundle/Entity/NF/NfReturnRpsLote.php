<?php
/**
 * File that brings the NF Return RPS Lote class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfReturnRpsLote
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

use NfeBundle\Entity\NF\NfReturnLayout;

/**
 * NF Return RPS Lote class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnRpsLote
{
    protected $Layout;

    public function __construct(NfReturnLayout $Layout)
    {
        $this->Layout = $Layout;
    }

    public function getHeader()
    {
        return $this->Layout->getHeader();
    }

    public function getFooter()
    {
        return $this->Layout->getFooter();
    }

    public function getRps()
    {
        return $this->Layout->getRps();
    }

    public function process()
    {
        try {
            $this->Layout->process($this);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
