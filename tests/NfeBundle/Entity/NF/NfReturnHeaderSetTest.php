<?php
/**
 * File that brings the Nf Return header Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     NfReturnHeaderSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\NF;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\NF\NfReturnHeader;

/**
 * Nf Return header Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnHeaderSetTest extends CommomTest
{
  /**
   * @var    EntityManager
   * @access protected
   */
  protected static $NfReturnHeader;

  /**
   * {@inheritDoc}
   *
   * @access public
   * @return void
   */
  public static function setUpBeforeClass()
  {
    self::bootKernel();
    self::$NfReturnHeader = new NfReturnHeader();
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
  public function atestFooBar()
  {
    $file = file_get_contents('src/NfeBundle/Resources/public/upload/retorno/1.txt');
    $file = explode("\n", $file);
    var_dump(trim($file[1]));
    $this->assertEquals(10, 1);
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoRegistro()
  {
    $this->assertEquals(10, self::$NfReturnHeader->getTipoRegistro());
  }

  /**
   * @access public
   * @return void
   */
  public function testGetVersaoArquivo()
  {
    $this->assertEquals(3, self::$NfReturnHeader->getVersaoArquivo());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetInvalidTipoIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setTipoIdentificacaoContribuinte('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetNullTipoIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setTipoIdentificacaoContribuinte(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetEmptyTipoIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setTipoIdentificacaoContribuinte('');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTipoIdentificacaoContribuinte()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setTipoIdentificacaoContribuinte(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setTipoIdentificacaoContribuinte(2));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setTipoIdentificacaoContribuinte(1);
    $this->assertEquals(1, self::$NfReturnHeader->getTipoIdentificacaoContribuinte());

    self::$NfReturnHeader->setTipoIdentificacaoContribuinte(2);
    $this->assertEquals(2, self::$NfReturnHeader->getTipoIdentificacaoContribuinte());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetInvalidIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setIdentificacaoContribuinte('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetNullIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setIdentificacaoContribuinte(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetEmptyIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setIdentificacaoContribuinte('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetShortIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setIdentificacaoContribuinte(123123);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setIdentificacaoContribuinte(123123123123123);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetIdentificacaoContribuinte()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setIdentificacaoContribuinte(12312312312));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setIdentificacaoContribuinte(123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setIdentificacaoContribuinte(1231231231231));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setIdentificacaoContribuinte(12312312312312));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetIdentificacaoContribuinte()
  {
    self::$NfReturnHeader->setIdentificacaoContribuinte(12312312312);
    $this->assertEquals(12312312312, self::$NfReturnHeader->getIdentificacaoContribuinte());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetInvalidInscricaoMunicipalContribuinte()
  {
    self::$NfReturnHeader->setInscricaoMunicipalContribuinte('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetNullInscricaoMunicipalContribuinte()
  {
    self::$NfReturnHeader->setInscricaoMunicipalContribuinte(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do contribuinte inválida
   *
   * @access public
   * @return void
   */
  public function testSetEmptyInscricaoMunicipalContribuinte()
  {
    self::$NfReturnHeader->setInscricaoMunicipalContribuinte('');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetInscricaoMunicipalContribuinte()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setInscricaoMunicipalContribuinte(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setInscricaoMunicipalContribuinte(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnHeader', self::$NfReturnHeader->setInscricaoMunicipalContribuinte(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetInscricaoMunicipalContribuinte()
  {
    self::$NfReturnHeader->setInscricaoMunicipalContribuinte(12312312312);
    $this->assertEquals(12312312312, self::$NfReturnHeader->getInscricaoMunicipalContribuinte());
  }

  /**
   * @access public
   * @return void
   */
  public function testGetInicioPeriodo()
  {
    $date = new \DateTime();
    self::$NfReturnHeader->setInicioPeriodo($date);
    $this->assertEquals($date, self::$NfReturnHeader->getInicioPeriodo());
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTerminoPeriodo()
  {
    $date = new \DateTime();
    self::$NfReturnHeader->setTerminoPeriodo($date);
    $this->assertEquals($date, self::$NfReturnHeader->getTerminoPeriodo());
  }



  /**
   * {@inheritDoc}
   *
   * @access public
   * @return void
   */
  public static function tearDownAfterClass()
  {
      self::$NfReturnHeader = null;
  }
}
