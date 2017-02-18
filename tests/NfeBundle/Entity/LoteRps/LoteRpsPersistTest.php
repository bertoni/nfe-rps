<?php
/**
 * File that brings the LoteRps Persist Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     LoteRpsPersistTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\LoteRps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\LoteRps;

/**
 * LoteRps Persist Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class LoteRpsPersistTest extends CommomTest
{
    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function setUpBeforeClass()
    {
        self::bootKernel();
        if (is_null(self::$em)) {
            self::$em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        }
    }






    /**
     * @access public
     * @return void
     */
    public function testPersistLoteRps()
    {
        if (!self::$LoteRps instanceof LoteRps) {
            self::$LoteRps = new LoteRps();
            self::$LoteRps->setEnviado(1)
                ->setDataCadastro(new \DateTime())
                ->setDataPeriodoInicial(new \DateTime())
                ->setDataPeriodoFinal(new \DateTime())
                ->setValorTotal(250300)
                ->setValorDeducao(1535)
                ->setValorIss(2290)
                ->setValorCredito(500);
            
            self::$em->persist(self::$LoteRps);
            self::$em->flush();
        }
        $this->assertTrue(is_numeric(self::$LoteRps->getIdLoteRps()));
    }
}