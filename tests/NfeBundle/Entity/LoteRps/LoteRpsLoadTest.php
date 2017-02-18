<?php
/**
 * File that brings the LoteRps Load Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     LoteRpsLoadTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\LoteRps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\LoteRps;

/**
 * LoteRps Load Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class LoteRpsLoadTest extends CommomTest
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
    public function testLoadLoteRps()
    {
        $LoteRps = self::$em->getRepository('NfeBundle:LoteRps')
            ->find(self::$LoteRps->getIdLoteRps());
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', $LoteRps);
    
        $this->assertEquals($LoteRps->getIdLoteRps(),          self::$LoteRps->getIdLoteRps());
        $this->assertEquals($LoteRps->getEnviado(),            self::$LoteRps->getEnviado());
        $this->assertEquals($LoteRps->getDataCadastro(),       self::$LoteRps->getDataCadastro());
        $this->assertEquals($LoteRps->getDataPeriodoInicial(), self::$LoteRps->getDataPeriodoInicial());
        $this->assertEquals($LoteRps->getDataPeriodoFinal(),   self::$LoteRps->getDataPeriodoFinal());
        $this->assertEquals($LoteRps->getValorTotal(),         self::$LoteRps->getValorTotal());
        $this->assertEquals($LoteRps->getValorDeducao(),       self::$LoteRps->getValorDeducao());
        $this->assertEquals($LoteRps->getValorIss(),           self::$LoteRps->getValorIss());
        $this->assertEquals($LoteRps->getValorCredito(),       self::$LoteRps->getValorCredito());
    }
}