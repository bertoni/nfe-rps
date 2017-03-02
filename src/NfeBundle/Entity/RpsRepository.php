<?php
/**
 * File that brings the Rps Repository class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     RpsRepository
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Rps Repository class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class RpsRepository extends EntityRepository
{
    /**
     * Retorna os Rps sem lote
     *
     * @access public
     * @return array[RPS]
     */
    public function getRpsWithoutLote()
    {
        $sql = 'SELECT rps FROM NfeBundle:Rps rps WHERE rps.id_lote_rps IS NULL';
        $query = $this->getEntityManager()
            ->createQuery($sql);
        return $query->getResult();
    }
}