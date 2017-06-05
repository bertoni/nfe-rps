<?php
/**
 * File that brings the NF Return Layout class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfReturnLayout
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

use NfeBundle\Entity\NF\NfReturnRps;
use NfeBundle\Entity\NF\NfReturnRpsLote;

/**
 * NF Return Layout class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
abstract class NfReturnLayout
{
    protected $Header;
    protected $Footer;
    protected $Rps;

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

    protected function setRps(NfReturnRps $NfReturnRps)
    {
        if (!$this->Rps instanceof \ArrayObject) {
            $this->Rps = new \ArrayObject(array());
        }
        if (!$this->Rps->offsetExists($NfReturnRps->getNumeroRps())) {
            $this->Rps->offsetSet($NfReturnRps->getNumeroRps(), $NfReturnRps);
        }
    }

    abstract public function __construct($file_path);

    abstract public function process(NfReturnRpsLote $NfReturnRpsLote);
}
