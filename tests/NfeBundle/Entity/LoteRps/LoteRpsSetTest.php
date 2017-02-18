<?php
/**
 * File that brings the LoteRps Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     LoteRpsSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\LoteRps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\LoteRps;

/**
 * LoteRps Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class LoteRpsSetTest extends CommomTest
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
        self::$LoteRps = new LoteRps();
        if (is_null(self::$em)) {
            self::$em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        }
    }





    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyEnviado()
    {
        self::$LoteRps->setEnviado('');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullEnviado()
    {
        self::$LoteRps->setEnviado(null);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetStringEnviado()
    {
        self::$LoteRps->setEnviado('abc');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidEnviado()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setEnviado(0));
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidDataCadastro()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setDataCadastro(new \DateTime()));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidDataPeriodoInicial()
    {
        self::$LoteRps->setDataPeriodoInicial('abc');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidDataPeriodoInicial()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setDataPeriodoInicial(null));
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setDataPeriodoInicial(new \DateTime()));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidDataPeriodoFinal()
    {
        self::$LoteRps->setDataPeriodoFinal('abc');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidDataPeriodoFinal()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setDataPeriodoFinal(null));
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setDataPeriodoFinal(new \DateTime()));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetStringValorTotal()
    {
        self::$LoteRps->setValorTotal('abc');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorTotal()
    {
        self::$LoteRps->setValorTotal(-3);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorTotal()
    {
        self::$LoteRps->setValorTotal(100000000000);
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidValorTotal()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorTotal(null));
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorTotal(10000));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetStringValorDeducao()
    {
        self::$LoteRps->setValorDeducao('ccc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorDeducao()
    {
        self::$LoteRps->setValorDeducao(-10);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorDeducao()
    {
        self::$LoteRps->setValorDeducao(100000000000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorDeducao()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorDeducao(null));
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorDeducao(100000));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetStringValorISS()
    {
        self::$LoteRps->setValorIss('ccc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorISS()
    {
        self::$LoteRps->setValorIss(-120);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorISS()
    {
        self::$LoteRps->setValorIss(100000000000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorISS()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorIss(null));
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorIss(0));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetStringValorCredito()
    {
        self::$LoteRps->setValorCredito('ccc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorCredito()
    {
        self::$LoteRps->setValorCredito(-1);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorCredito()
    {
        self::$LoteRps->setValorCredito(100000000000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorCredito()
    {
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorCredito(null));
        $this->assertInstanceOf('NfeBundle\Entity\LoteRps', self::$LoteRps->setValorCredito(100));
    }






    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function tearDownAfterClass()
    {
        self::$LoteRps = null;
    }
}