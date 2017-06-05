<?php
/**
 * File that brings the Nf Return Rps Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     NfReturnRpsSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\NF;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\NF\NfReturnRps;

/**
 * Nf Return Rps Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnRpsSetTest extends CommomTest
{
  /**
   * @var    NfReturnRps
   * @access protected
   */
  protected static $NfReturnRps;

  /**
   * {@inheritDoc}
   *
   * @access public
   * @return void
   */
  public static function setUpBeforeClass()
  {
    self::bootKernel();
    self::$NfReturnRps = new NfReturnRps();
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
  public function testGetTipoRegistro()
  {
    $this->assertEquals(20, self::$NfReturnRps->getTipoRegistro());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidNumeroNf()
  {
    self::$NfReturnRps->setNumeroNf('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullNumeroNf()
  {
    self::$NfReturnRps->setNumeroNf(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyNumeroNf()
  {
    self::$NfReturnRps->setNumeroNf('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeNumeroNf()
  {
    self::$NfReturnRps->setNumeroNf(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNumeroNf()
  {
    self::$NfReturnRps->setNumeroNf(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNumeroNf()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroNf(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroNf(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroNf(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNumeroNf()
  {
    self::$NfReturnRps->setNumeroNf(1);
    $this->assertEquals(1, self::$NfReturnRps->getNumeroNf());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Status da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidStatusNf()
  {
    self::$NfReturnRps->setStatusNf('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Status da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullStatusNf()
  {
    self::$NfReturnRps->setStatusNf(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Status da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyStatusNf()
  {
    self::$NfReturnRps->setStatusNf('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Status da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeStatusNf()
  {
    self::$NfReturnRps->setStatusNf(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Status da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongStatusNf()
  {
    self::$NfReturnRps->setStatusNf(12);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetStatusNf()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setStatusNf(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setStatusNf(2));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetStatusNf()
  {
    self::$NfReturnRps->setStatusNf(1);
    $this->assertEquals(1, self::$NfReturnRps->getStatusNf());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código de Verificação da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidCodigoVerificacao()
  {
    self::$NfReturnRps->setCodigoVerificacao('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código de Verificação da NF inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullCodigoVerificacao()
  {
    self::$NfReturnRps->setCodigoVerificacao(null);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCodigoVerificacao()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoVerificacao('1q2w3e$5#'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCodigoVerificacao()
  {
    self::$NfReturnRps->setCodigoVerificacao('1q2w3e$5#');
    $this->assertEquals('1q2w3e$5#', self::$NfReturnRps->getCodigoVerificacao());
  }

  /**
   * @access public
   * @return void
   */
  public function testGetDataEmissaoNf()
  {
    $date = new \DateTime();
    self::$NfReturnRps->setDataEmissaoNf($date);
    $this->assertEquals($date, self::$NfReturnRps->getDataEmissaoNf());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidTipoRps()
  {
    self::$NfReturnRps->setTipoRps('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullTipoRps()
  {
    self::$NfReturnRps->setTipoRps(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyTipoRps()
  {
    self::$NfReturnRps->setTipoRps('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeTipoRps()
  {
    self::$NfReturnRps->setTipoRps(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTipoRps()
  {
    self::$NfReturnRps->setTipoRps(12);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTipoRps()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoRps(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoRps(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoRps(2));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoRps()
  {
    self::$NfReturnRps->setTipoRps(1);
    $this->assertEquals(1, self::$NfReturnRps->getTipoRps());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Série do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongSerieRps()
  {
    self::$NfReturnRps->setSerieRps('123456');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetSerieRps()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setSerieRps('00nfe'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetSerieRps()
  {
    self::$NfReturnRps->setSerieRps('00nfe');
    $this->assertEquals('00nfe', self::$NfReturnRps->getSerieRps());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidNumeroRps()
  {
    self::$NfReturnRps->setNumeroRps('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullNumeroRps()
  {
    self::$NfReturnRps->setNumeroRps(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyNumeroRps()
  {
    self::$NfReturnRps->setNumeroRps('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeNumeroRps()
  {
    self::$NfReturnRps->setNumeroRps(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do RPS inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNumeroRps()
  {
    self::$NfReturnRps->setNumeroRps(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNumeroRps()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroRps(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroRps(123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroRps(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNumeroRps()
  {
    self::$NfReturnRps->setNumeroRps(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getNumeroRps());
  }

  /**
   * @access public
   * @return void
   */
  public function testGetDataEmissaoRps()
  {
    $date = new \DateTime();
    self::$NfReturnRps->setDataEmissaoRps($date);
    $this->assertEquals($date, self::$NfReturnRps->getDataEmissaoRps());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidTipoIdentificacaoPrestador()
  {
    self::$NfReturnRps->setTipoIdentificacaoPrestador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullTipoIdentificacaoPrestador()
  {
    self::$NfReturnRps->setTipoIdentificacaoPrestador(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyTipoIdentificacaoPrestador()
  {
    self::$NfReturnRps->setTipoIdentificacaoPrestador('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeTipoIdentificacaoPrestador()
  {
    self::$NfReturnRps->setTipoIdentificacaoPrestador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetShortTipoIdentificacaoPrestador()
  {
    self::$NfReturnRps->setTipoIdentificacaoPrestador(0);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTipoIdentificacaoPrestador()
  {
    self::$NfReturnRps->setTipoIdentificacaoPrestador(12);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTipoIdentificacaoPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoIdentificacaoPrestador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoIdentificacaoPrestador(2));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoIdentificacaoPrestador()
  {
    self::$NfReturnRps->setTipoIdentificacaoPrestador(1);
    $this->assertEquals(1, self::$NfReturnRps->getTipoIdentificacaoPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidIdentificacaoPrestador()
  {
    self::$NfReturnRps->setIdentificacaoPrestador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeIdentificacaoPrestador()
  {
    self::$NfReturnRps->setIdentificacaoPrestador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongIdentificacaoPrestador()
  {
    self::$NfReturnRps->setIdentificacaoPrestador(123123123123123);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetIdentificacaoPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIdentificacaoPrestador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIdentificacaoPrestador(123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIdentificacaoPrestador(12312312312312));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetIdentificacaoPrestador()
  {
    self::$NfReturnRps->setIdentificacaoPrestador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getIdentificacaoPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidInscricaoMunicipalPrestador()
  {
    self::$NfReturnRps->setInscricaoMunicipalPrestador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeInscricaoMunicipalPrestador()
  {
    self::$NfReturnRps->setInscricaoMunicipalPrestador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongInscricaoMunicipalPrestador()
  {
    self::$NfReturnRps->setInscricaoMunicipalPrestador(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetInscricaoMunicipalPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalPrestador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalPrestador(123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalPrestador(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetInscricaoMunicipalPrestador()
  {
    self::$NfReturnRps->setInscricaoMunicipalPrestador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getInscricaoMunicipalPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidInscricaoEstadualPrestador()
  {
    self::$NfReturnRps->setInscricaoEstadualPrestador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeInscricaoEstadualPrestador()
  {
    self::$NfReturnRps->setInscricaoEstadualPrestador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongInscricaoEstadualPrestador()
  {
    self::$NfReturnRps->setInscricaoEstadualPrestador(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetInscricaoEstadualPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualPrestador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualPrestador(123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualPrestador(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetInscricaoEstadualPrestador()
  {
    self::$NfReturnRps->setInscricaoEstadualPrestador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getInscricaoEstadualPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Razão Social do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongRazaoPrestador()
  {
    self::$NfReturnRps->setRazaoPrestador(
      'om1oimxonoiu1jw9xu1xiuj19i1j9wix19uxn99 91u hw9u1w hx9u1 91uwx91uwnx91u x91u 91u 91 9nw1 9xnw 9u 1xo1n owjn1 ojw1nxa'
    );
  }

  /**
   * @access public
   * @return void
   */
  public function testSetRazaoPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setRazaoPrestador('Bla bla bla'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetRazaoPrestador()
  {
    self::$NfReturnRps->setRazaoPrestador('Bla bla bla');
    $this->assertEquals('Bla bla bla', self::$NfReturnRps->getRazaoPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Nome do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNomePrestador()
  {
    self::$NfReturnRps->setNomePrestador('om1oimxonoiu1jw9xu1xiuj19i1j9wix19uxn99 91u hw9u1w hx9u1 91uw');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNomePrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNomePrestador('Bla bla bla'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNomePrestador()
  {
    self::$NfReturnRps->setNomePrestador('Bla bla bla');
    $this->assertEquals('Bla bla bla', self::$NfReturnRps->getNomePrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Endereço do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTipoEnderecoPrestador()
  {
    self::$NfReturnRps->setTipoEnderecoPrestador('ruas');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTipoEnderecoPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoEnderecoPrestador('Rua'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoEnderecoPrestador()
  {
    self::$NfReturnRps->setTipoEnderecoPrestador('Ave');
    $this->assertEquals('Ave', self::$NfReturnRps->getTipoEnderecoPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Endereço do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongEnderecoPrestador()
  {
    self::$NfReturnRps->setEnderecoPrestador(
      'om1oimxonoiu1jw9xu1xiuj19i1j9wix19uxn99 91u hw9u1w hx9u1 91uwx91uwnx91u x91u 91u 91 9nw1 9xnw 9u 1xo1n owjn1 ojw1nxa1qsdaqs qwdqwd'
    );
  }

  /**
   * @access public
   * @return void
   */
  public function testSetEnderecoPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEnderecoPrestador('Rua X, 123'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetEnderecoPrestador()
  {
    self::$NfReturnRps->setEnderecoPrestador('Rua X, 123');
    $this->assertEquals('Rua X, 123', self::$NfReturnRps->getEnderecoPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do Endereço do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNumeroEnderecoPrestador()
  {
    self::$NfReturnRps->setNumeroEnderecoPrestador('12312312312');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNumeroEnderecoPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroEnderecoPrestador('123b'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNumeroEnderecoPrestador()
  {
    self::$NfReturnRps->setNumeroEnderecoPrestador('123b');
    $this->assertEquals('123b', self::$NfReturnRps->getNumeroEnderecoPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Complemento do Endereço do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongComplementoEnderecoPrestador()
  {
    self::$NfReturnRps->setComplementoEnderecoPrestador('01imx 1 jxw0i1m 0x1 x1 iwj10 jx018w x010x9ij109ij10wxpqx q sx0qxs');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetComplementoEnderecoPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setComplementoEnderecoPrestador('Bloco 123'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetComplementoEnderecoPrestador()
  {
    self::$NfReturnRps->setComplementoEnderecoPrestador('Bloco 123');
    $this->assertEquals('Bloco 123', self::$NfReturnRps->getComplementoEnderecoPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Bairro do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongBairroPrestador()
  {
    self::$NfReturnRps->setBairroPrestador('01imx 1 jxw0i1m 0x1 x1 iwj10 jx018w x010x9ij109ij10wxpqx q sx0qxs qos ncoaks ncopa sc');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetBairroPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setBairroPrestador('Mooca'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetBairroPrestador()
  {
    self::$NfReturnRps->setBairroPrestador('Mooca');
    $this->assertEquals('Mooca', self::$NfReturnRps->getBairroPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Cidade do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCidadePrestador()
  {
    self::$NfReturnRps->setCidadePrestador('01imx 1 jxw0i1m 0x1 x1 iwj10 jx018w x010x9ij109ij10wxpqx');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCidadePrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCidadePrestador('SAO PAULO'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCidadePrestador()
  {
    self::$NfReturnRps->setCidadePrestador('SAO PAULO');
    $this->assertEquals('SAO PAULO', self::$NfReturnRps->getCidadePrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage UF do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongUfPrestador()
  {
    self::$NfReturnRps->setUfPrestador('SSP');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetUfPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setUfPrestador('SP'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetUfPrestador()
  {
    self::$NfReturnRps->setUfPrestador('SP');
    $this->assertEquals('SP', self::$NfReturnRps->getUfPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidCepPrestador()
  {
    self::$NfReturnRps->setCepPrestador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeCepPrestador()
  {
    self::$NfReturnRps->setCepPrestador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCepPrestador()
  {
    self::$NfReturnRps->setCepPrestador(123123123);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCepPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepPrestador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepPrestador(1231));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepPrestador(12312312));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCepPrestador()
  {
    self::$NfReturnRps->setCepPrestador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getCepPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Telefone do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTelefonePrestador()
  {
    self::$NfReturnRps->setTelefonePrestador('123123123123');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTelefonePrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTelefonePrestador('12345678'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTelefonePrestador(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTelefonePrestador(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTelefonePrestador()
  {
    self::$NfReturnRps->setTelefonePrestador('123123123');
    $this->assertEquals('123123123', self::$NfReturnRps->getTelefonePrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Email do Prestador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongEmailPrestador()
  {
    self::$NfReturnRps->setEmailPrestador('aslcmaoicpamcpakmckamclkanocmaokoaclkamcso@alsoqksnmcoakmclokamcoanmockaoc.com.br');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetEmailPrestador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEmailPrestador('asdasd@asdasd.com'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEmailPrestador(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEmailPrestador(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetEmailPrestador()
  {
    self::$NfReturnRps->setEmailPrestador('test@gmail.com');
    $this->assertEquals('test@gmail.com', self::$NfReturnRps->getEmailPrestador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidTipoIdentificacaoTomador()
  {
    self::$NfReturnRps->setTipoIdentificacaoTomador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullTipoIdentificacaoTomador()
  {
    self::$NfReturnRps->setTipoIdentificacaoTomador(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyTipoIdentificacaoTomador()
  {
    self::$NfReturnRps->setTipoIdentificacaoTomador('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeTipoIdentificacaoTomador()
  {
    self::$NfReturnRps->setTipoIdentificacaoTomador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetShortTipoIdentificacaoTomador()
  {
    self::$NfReturnRps->setTipoIdentificacaoTomador(0);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTipoIdentificacaoTomador()
  {
    self::$NfReturnRps->setTipoIdentificacaoTomador(12);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTipoIdentificacaoTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoIdentificacaoTomador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoIdentificacaoTomador(2));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoIdentificacaoTomador(3));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoIdentificacaoTomador()
  {
    self::$NfReturnRps->setTipoIdentificacaoTomador(1);
    $this->assertEquals(1, self::$NfReturnRps->getTipoIdentificacaoTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidIdentificacaoTomador()
  {
    self::$NfReturnRps->setIdentificacaoTomador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeIdentificacaoTomador()
  {
    self::$NfReturnRps->setIdentificacaoTomador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongIdentificacaoTomador()
  {
    self::$NfReturnRps->setIdentificacaoTomador(123123123123123);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetIdentificacaoTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIdentificacaoTomador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIdentificacaoTomador(123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIdentificacaoTomador(12312312312312));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetIdentificacaoTomador()
  {
    self::$NfReturnRps->setIdentificacaoTomador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getIdentificacaoTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidInscricaoMunicipalTomador()
  {
    self::$NfReturnRps->setInscricaoMunicipalTomador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeInscricaoMunicipalTomador()
  {
    self::$NfReturnRps->setInscricaoMunicipalTomador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongInscricaoMunicipalTomador()
  {
    self::$NfReturnRps->setInscricaoMunicipalTomador(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetInscricaoMunicipalTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalTomador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalTomador(123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalTomador(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalTomador(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoMunicipalTomador(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetInscricaoMunicipalTomador()
  {
    self::$NfReturnRps->setInscricaoMunicipalTomador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getInscricaoMunicipalTomador());

    self::$NfReturnRps->setInscricaoMunicipalTomador(null);
    $this->assertEquals(0, self::$NfReturnRps->getInscricaoMunicipalTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidInscricaoEstadualTomador()
  {
    self::$NfReturnRps->setInscricaoEstadualTomador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeInscricaoEstadualTomador()
  {
    self::$NfReturnRps->setInscricaoEstadualTomador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongInscricaoEstadualTomador()
  {
    self::$NfReturnRps->setInscricaoEstadualTomador(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetInscricaoEstadualTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualTomador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualTomador(123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualTomador(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualTomador(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setInscricaoEstadualTomador(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetInscricaoEstadualTomador()
  {
    self::$NfReturnRps->setInscricaoEstadualTomador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getInscricaoEstadualTomador());

    self::$NfReturnRps->setInscricaoEstadualTomador(null);
    $this->assertEquals(0, self::$NfReturnRps->getInscricaoEstadualTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Nome do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNomeTomador()
  {
    self::$NfReturnRps->setNomeTomador(
      'om1oimxonoiu1jw9xu1xiuj19i1j9wix19uxn99 91u hw9u1w hx9u1 91uwascascaks cbias jcbias bcias bcia casdasdasdasdasdasdasd'
    );
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNomeTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNomeTomador('Bla bla bla'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNomeTomador()
  {
    self::$NfReturnRps->setNomeTomador('Bla bla bla');
    $this->assertEquals('Bla bla bla', self::$NfReturnRps->getNomeTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Endereço do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTipoEnderecoTomador()
  {
    self::$NfReturnRps->setTipoEnderecoTomador('ruas');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTipoEnderecoTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoEnderecoTomador('Rua'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoEnderecoTomador()
  {
    self::$NfReturnRps->setTipoEnderecoTomador('Ave');
    $this->assertEquals('Ave', self::$NfReturnRps->getTipoEnderecoTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Endereço do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongEnderecoTomador()
  {
    self::$NfReturnRps->setEnderecoTomador(
      'om1oimxonoiu1jw9xu1xiuj19i1j9wix19uxn99 91u hw9u1w hx9u1 91uwx91uwnx91u x91u 91u 91 9nw1 9xnw 9u 1xo1n owjn1 ojw1nxa1qsdaqs qwdqwd'
    );
  }

  /**
   * @access public
   * @return void
   */
  public function testSetEnderecoTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEnderecoTomador('Rua X, 123'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetEnderecoTomador()
  {
    self::$NfReturnRps->setEnderecoTomador('Rua X, 123');
    $this->assertEquals('Rua X, 123', self::$NfReturnRps->getEnderecoTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do Endereço do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNumeroEnderecoTomador()
  {
    self::$NfReturnRps->setNumeroEnderecoTomador('12312312312');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNumeroEnderecoTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroEnderecoTomador('123b'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNumeroEnderecoTomador()
  {
    self::$NfReturnRps->setNumeroEnderecoTomador('123b');
    $this->assertEquals('123b', self::$NfReturnRps->getNumeroEnderecoTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Complemento do Endereço do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongComplementoEnderecoTomador()
  {
    self::$NfReturnRps->setComplementoEnderecoTomador('01imx 1 jxw0i1m 0x1 x1 iwj10 jx018w x010x9ij109ij10wxpqx q sx0qxs');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetComplementoEnderecoTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setComplementoEnderecoTomador('Bloco 123'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetComplementoEnderecoTomador()
  {
    self::$NfReturnRps->setComplementoEnderecoTomador('Bloco 123');
    $this->assertEquals('Bloco 123', self::$NfReturnRps->getComplementoEnderecoTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Bairro do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongBairroTomador()
  {
    self::$NfReturnRps->setBairroTomador('01imx 1 jxw0i1m 0x1 x1 iwj10 jx018w x010x9ij109ij10wxpqx q sx0qxs qos ncoaks ncopa sc');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetBairroTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setBairroTomador('Mooca'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetBairroTomador()
  {
    self::$NfReturnRps->setBairroTomador('Mooca');
    $this->assertEquals('Mooca', self::$NfReturnRps->getBairroTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Cidade do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCidadeTomador()
  {
    self::$NfReturnRps->setCidadeTomador('01imx 1 jxw0i1m 0x1 x1 iwj10 jx018w x010x9ij109ij10wxpqx');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCidadeTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCidadeTomador('SAO PAULO'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCidadeTomador()
  {
    self::$NfReturnRps->setCidadeTomador('SAO PAULO');
    $this->assertEquals('SAO PAULO', self::$NfReturnRps->getCidadeTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage UF do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongUfTomador()
  {
    self::$NfReturnRps->setUfTomador('SSP');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetUfTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setUfTomador('SP'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetUfTomador()
  {
    self::$NfReturnRps->setUfTomador('SP');
    $this->assertEquals('SP', self::$NfReturnRps->getUfTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidCepTomador()
  {
    self::$NfReturnRps->setCepTomador('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeCepTomador()
  {
    self::$NfReturnRps->setCepTomador(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCepTomador()
  {
    self::$NfReturnRps->setCepTomador(123123123);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCepTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepTomador(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepTomador(1231));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepTomador(12312312));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepTomador(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCepTomador(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCepTomador()
  {
    self::$NfReturnRps->setCepTomador(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getCepTomador());

    self::$NfReturnRps->setCepTomador(null);
    $this->assertEquals(0, self::$NfReturnRps->getCepTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Telefone do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTelefoneTomador()
  {
    self::$NfReturnRps->setTelefoneTomador('123123123123');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTelefoneTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTelefoneTomador('12345678'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTelefoneTomador(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTelefoneTomador(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTelefoneTomador()
  {
    self::$NfReturnRps->setTelefoneTomador('123123123');
    $this->assertEquals('123123123', self::$NfReturnRps->getTelefoneTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Email do Tomador inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongEmailTomador()
  {
    self::$NfReturnRps->setEmailTomador('aslcmaoicpamcpakmckamclkanocmaokoaclkamcso@alsoqksnmcoakmclokamcoanmockaoc.com.br');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetEmailTomador()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEmailTomador('asdasd@asdasd.com'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEmailTomador(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setEmailTomador(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetEmailTomador()
  {
    self::$NfReturnRps->setEmailTomador('test@gmail.com');
    $this->assertEquals('test@gmail.com', self::$NfReturnRps->getEmailTomador());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Trbutação de serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidTipoTributacao()
  {
    self::$NfReturnRps->setTipoTributacao('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Trbutação de serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeTipoTributacao()
  {
    self::$NfReturnRps->setTipoTributacao(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Trbutação de serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongTipoTributacao()
  {
    self::$NfReturnRps->setTipoTributacao(012);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Trbutação de serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullTipoTributacao()
  {
    self::$NfReturnRps->setTipoTributacao(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Trbutação de serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyTipoTributacao()
  {
    self::$NfReturnRps->setTipoTributacao('');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetTipoTributacao()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoTributacao('01'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoTributacao('02'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoTributacao('03'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoTributacao('04'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoTributacao('05'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setTipoTributacao('06'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetTipoTributacao()
  {
    self::$NfReturnRps->setTipoTributacao('01');
    $this->assertEquals(1, self::$NfReturnRps->getTipoTributacao());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Cidade da Prestação de serviços inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongCidadePrestacao()
  {
    self::$NfReturnRps->setCidadePrestacao('01imx 1 jxw0i1m 0x1 x1 iwj10 jx018w x010x9ij109ij10wxpqx');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCidadePrestacao()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCidadePrestacao('SAO PAULO'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCidadePrestacao()
  {
    self::$NfReturnRps->setCidadePrestacao('SAO PAULO');
    $this->assertEquals('SAO PAULO', self::$NfReturnRps->getCidadePrestacao());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage UF da Prestação de serviços inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongUfPrestacao()
  {
    self::$NfReturnRps->setUfPrestacao('SSP');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetUfPrestacao()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setUfPrestacao('SP'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetUfPrestacao()
  {
    self::$NfReturnRps->setUfPrestacao('SP');
    $this->assertEquals('SP', self::$NfReturnRps->getUfPrestacao());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Regime Especial de Tributação inválida
   *
   * @access public
   * @return void
   */
  public function testSetInvalidRegimeEspecial()
  {
    self::$NfReturnRps->setRegimeEspecial('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Regime Especial de Tributação inválida
   *
   * @access public
   * @return void
   */
  public function testSetNegativeRegimeEspecial()
  {
    self::$NfReturnRps->setRegimeEspecial(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Regime Especial de Tributação inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongRegimeEspecial()
  {
    self::$NfReturnRps->setRegimeEspecial(012);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Regime Especial de Tributação inválida
   *
   * @access public
   * @return void
   */
  public function testSetNullRegimeEspecial()
  {
    self::$NfReturnRps->setRegimeEspecial(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Regime Especial de Tributação inválida
   *
   * @access public
   * @return void
   */
  public function testSetEmptyRegimeEspecial()
  {
    self::$NfReturnRps->setRegimeEspecial('');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetRegimeEspecial()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setRegimeEspecial('00'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setRegimeEspecial('01'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setRegimeEspecial('02'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setRegimeEspecial('03'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setRegimeEspecial('04'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setRegimeEspecial('05'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetRegimeEspecial()
  {
    self::$NfReturnRps->setRegimeEspecial('01');
    $this->assertEquals(1, self::$NfReturnRps->getRegimeEspecial());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Opção Especial pelo Simples inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidOpcaoSimples()
  {
    self::$NfReturnRps->setOpcaoSimples('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Opção Especial pelo Simples inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeOpcaoSimples()
  {
    self::$NfReturnRps->setOpcaoSimples(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Opção Especial pelo Simples inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongOpcaoSimples()
  {
    self::$NfReturnRps->setOpcaoSimples(12);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Opção Especial pelo Simples inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullOpcaoSimples()
  {
    self::$NfReturnRps->setOpcaoSimples(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Opção Especial pelo Simples inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyOpcaoSimples()
  {
    self::$NfReturnRps->setOpcaoSimples('');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetOpcaoSimples()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setOpcaoSimples(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setOpcaoSimples(1));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetOpcaoSimples()
  {
    self::$NfReturnRps->setOpcaoSimples(1);
    $this->assertEquals(1, self::$NfReturnRps->getOpcaoSimples());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Incentivo Cultural inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidIncentivoCultural()
  {
    self::$NfReturnRps->setIncentivoCultural('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Incentivo Cultural inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeIncentivoCultural()
  {
    self::$NfReturnRps->setIncentivoCultural(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Incentivo Cultural inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongIncentivoCultural()
  {
    self::$NfReturnRps->setIncentivoCultural(12);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Incentivo Cultural inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullIncentivoCultural()
  {
    self::$NfReturnRps->setIncentivoCultural(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Incentivo Cultural inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyIncentivoCultural()
  {
    self::$NfReturnRps->setIncentivoCultural('');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetIncentivoCultural()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIncentivoCultural(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIncentivoCultural(1));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetIncentivoCultural()
  {
    self::$NfReturnRps->setIncentivoCultural(1);
    $this->assertEquals(1, self::$NfReturnRps->getIncentivoCultural());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código do Serviço Federal inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCodigoServicoFederal()
  {
    self::$NfReturnRps->setCodigoServicoFederal('qwe12');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCodigoServicoFederal()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoServicoFederal('1234'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCodigoServicoFederal()
  {
    self::$NfReturnRps->setCodigoServicoFederal('123');
    $this->assertEquals('123', self::$NfReturnRps->getCodigoServicoFederal());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código do Benefício inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidCodigoBeneficio()
  {
    self::$NfReturnRps->setCodigoBeneficio('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código do Benefício inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeCodigoBeneficio()
  {
    self::$NfReturnRps->setCodigoBeneficio(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código do Benefício inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCodigoBeneficio()
  {
    self::$NfReturnRps->setCodigoBeneficio(1234);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCodigoBeneficio()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoBeneficio(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoBeneficio(123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoBeneficio(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoBeneficio(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCodigoBeneficio()
  {
    self::$NfReturnRps->setCodigoBeneficio(1);
    $this->assertEquals(1, self::$NfReturnRps->getCodigoBeneficio());

    self::$NfReturnRps->setCodigoBeneficio(null);
    $this->assertEquals(0, self::$NfReturnRps->getCodigoBeneficio());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código do Serviço Municipal inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCodigoServicoMunicipal()
  {
    self::$NfReturnRps->setCodigoServicoMunicipal('123qwea');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCodigoServicoMunicipal()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoServicoMunicipal('1234'));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCodigoServicoMunicipal()
  {
    self::$NfReturnRps->setCodigoServicoMunicipal('123');
    $this->assertEquals('123', self::$NfReturnRps->getCodigoServicoMunicipal());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Aliquota inválida
   *
   * @access public
   * @return void
   */
  public function testSetInvalidAliquota()
  {
    self::$NfReturnRps->setAliquota('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Aliquota inválida
   *
   * @access public
   * @return void
   */
  public function testSetNegativeAliquota()
  {
    self::$NfReturnRps->setAliquota(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Aliquota inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongAliquota()
  {
    self::$NfReturnRps->setAliquota(123456);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetAliquota()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAliquota(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAliquota(123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAliquota(12345));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAliquota(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAliquota(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetAliquota()
  {
    self::$NfReturnRps->setAliquota(1);
    $this->assertEquals(1, self::$NfReturnRps->getAliquota());

    self::$NfReturnRps->setAliquota(null);
    $this->assertEquals(0, self::$NfReturnRps->getAliquota());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorServicos()
  {
    self::$NfReturnRps->setValorServicos('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorServicos()
  {
    self::$NfReturnRps->setValorServicos(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Serviços inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorServicos()
  {
    self::$NfReturnRps->setValorServicos(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorServicos()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorServicos(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorServicos(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorServicos(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorServicos(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorServicos(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorServicos()
  {
    self::$NfReturnRps->setValorServicos(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorServicos());

    self::$NfReturnRps->setValorServicos(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorServicos());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das Deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorDeducoes()
  {
    self::$NfReturnRps->setValorDeducoes('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das Deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorDeducoes()
  {
    self::$NfReturnRps->setValorDeducoes(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das Deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorDeducoes()
  {
    self::$NfReturnRps->setValorDeducoes(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorDeducoes()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDeducoes(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDeducoes(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDeducoes(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDeducoes(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDeducoes(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorDeducoes()
  {
    self::$NfReturnRps->setValorDeducoes(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorDeducoes());

    self::$NfReturnRps->setValorDeducoes(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorDeducoes());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Condicionado inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorDescontoCondicionado()
  {
    self::$NfReturnRps->setValorDescontoCondicionado('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Condicionado inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorDescontoCondicionado()
  {
    self::$NfReturnRps->setValorDescontoCondicionado(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Condicionado inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorDescontoCondicionado()
  {
    self::$NfReturnRps->setValorDescontoCondicionado(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorDescontoCondicionado()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoCondicionado(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoCondicionado(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoCondicionado(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoCondicionado(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoCondicionado(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorDescontoCondicionado()
  {
    self::$NfReturnRps->setValorDescontoCondicionado(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorDescontoCondicionado());

    self::$NfReturnRps->setValorDescontoCondicionado(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorDescontoCondicionado());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Incondicionado inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorDescontoIncondicionado()
  {
    self::$NfReturnRps->setValorDescontoIncondicionado('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Incondicionado inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorDescontoIncondicionado()
  {
    self::$NfReturnRps->setValorDescontoIncondicionado(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Incondicionado inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorDescontoIncondicionado()
  {
    self::$NfReturnRps->setValorDescontoIncondicionado(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorDescontoIncondicionado()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoIncondicionado(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoIncondicionado(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoIncondicionado(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoIncondicionado(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorDescontoIncondicionado(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorDescontoIncondicionado()
  {
    self::$NfReturnRps->setValorDescontoIncondicionado(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorDescontoIncondicionado());

    self::$NfReturnRps->setValorDescontoIncondicionado(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorDescontoIncondicionado());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do COFINS inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorCofins()
  {
    self::$NfReturnRps->setValorCofins('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do COFINS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorCofins()
  {
    self::$NfReturnRps->setValorCofins(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do COFINS inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorCofins()
  {
    self::$NfReturnRps->setValorCofins(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorCofins()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCofins(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCofins(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCofins(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCofins(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCofins(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorCofins()
  {
    self::$NfReturnRps->setValorCofins(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorCofins());

    self::$NfReturnRps->setValorCofins(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorCofins());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do CSLL inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorCsll()
  {
    self::$NfReturnRps->setValorCsll('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do CSLL inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorCsll()
  {
    self::$NfReturnRps->setValorCsll(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do CSLL inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorCsll()
  {
    self::$NfReturnRps->setValorCsll(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorCsll()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCsll(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCsll(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCsll(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCsll(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCsll(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorCsll()
  {
    self::$NfReturnRps->setValorCsll(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorCsll());

    self::$NfReturnRps->setValorCsll(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorCsll());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do INSS inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorInss()
  {
    self::$NfReturnRps->setValorInss('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do INSS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorInss()
  {
    self::$NfReturnRps->setValorInss(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do INSS inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorInss()
  {
    self::$NfReturnRps->setValorInss(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorInss()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorInss(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorInss(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorInss(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorInss(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorInss(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorInss()
  {
    self::$NfReturnRps->setValorInss(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorInss());

    self::$NfReturnRps->setValorInss(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorInss());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do IRPJ inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorIrpj()
  {
    self::$NfReturnRps->setValorIrpj('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do IRPJ inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorIrpj()
  {
    self::$NfReturnRps->setValorIrpj(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do IRPJ inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorIrpj()
  {
    self::$NfReturnRps->setValorIrpj(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorIrpj()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIrpj(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIrpj(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIrpj(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIrpj(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIrpj(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorIrpj()
  {
    self::$NfReturnRps->setValorIrpj(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorIrpj());

    self::$NfReturnRps->setValorIrpj(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorIrpj());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do PIS/PASEP inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorPisPasep()
  {
    self::$NfReturnRps->setValorPisPasep('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do PIS/PASEP inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorPisPasep()
  {
    self::$NfReturnRps->setValorPisPasep(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do PIS/PASEP inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorPisPasep()
  {
    self::$NfReturnRps->setValorPisPasep(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorPisPasep()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorPisPasep(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorPisPasep(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorPisPasep(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorPisPasep(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorPisPasep(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorPisPasep()
  {
    self::$NfReturnRps->setValorPisPasep(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorPisPasep());

    self::$NfReturnRps->setValorPisPasep(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorPisPasep());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de Outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorOutrasRetencoes()
  {
    self::$NfReturnRps->setValorOutrasRetencoes('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de Outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorOutrasRetencoes()
  {
    self::$NfReturnRps->setValorOutrasRetencoes(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de Outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorOutrasRetencoes()
  {
    self::$NfReturnRps->setValorOutrasRetencoes(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorOutrasRetencoes()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorOutrasRetencoes(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorOutrasRetencoes(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorOutrasRetencoes(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorOutrasRetencoes(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorOutrasRetencoes(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorOutrasRetencoes()
  {
    self::$NfReturnRps->setValorOutrasRetencoes(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorOutrasRetencoes());

    self::$NfReturnRps->setValorOutrasRetencoes(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorOutrasRetencoes());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorIss()
  {
    self::$NfReturnRps->setValorIss('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorIss()
  {
    self::$NfReturnRps->setValorIss(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorIss()
  {
    self::$NfReturnRps->setValorIss(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorIss()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIss(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIss(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIss(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIss(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorIss(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorIss()
  {
    self::$NfReturnRps->setValorIss(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorIss());

    self::$NfReturnRps->setValorIss(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorIss());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Crédito inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorCredito()
  {
    self::$NfReturnRps->setValorCredito('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Crédito inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorCredito()
  {
    self::$NfReturnRps->setValorCredito(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Crédito inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorCredito()
  {
    self::$NfReturnRps->setValorCredito(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorCredito()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCredito(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCredito(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCredito(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCredito(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setValorCredito(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorCredito()
  {
    self::$NfReturnRps->setValorCredito(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getValorCredito());

    self::$NfReturnRps->setValorCredito(null);
    $this->assertEquals(0, self::$NfReturnRps->getValorCredito());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidIssRetido()
  {
    self::$NfReturnRps->setIssRetido('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeIssRetido()
  {
    self::$NfReturnRps->setIssRetido(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongIssRetido()
  {
    self::$NfReturnRps->setIssRetido(12);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetIssRetido()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIssRetido(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setIssRetido(1));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetIssRetido()
  {
    self::$NfReturnRps->setIssRetido(1);
    $this->assertEquals(1, self::$NfReturnRps->getIssRetido());
  }

  /**
   * @access public
   * @return void
   */
  public function testSetDataCancelamento()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setDataCancelamento(new \DateTime()));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setDataCancelamento(null));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetDataCancelamento()
  {
    $date = new \DateTime();
    self::$NfReturnRps->setDataCancelamento($date);
    $this->assertEquals($date, self::$NfReturnRps->getDataCancelamento());

    self::$NfReturnRps->setDataCancelamento(null);
    $this->assertEquals(null, self::$NfReturnRps->getDataCancelamento());
  }

  /**
   * @access public
   * @return void
   */
  public function testSetDataCompetencia()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setDataCompetencia(new \DateTime()));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setDataCompetencia(null));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetDataCompetencia()
  {
    $date = new \DateTime();
    self::$NfReturnRps->setDataCompetencia($date);
    $this->assertEquals($date, self::$NfReturnRps->getDataCompetencia());

    self::$NfReturnRps->setDataCompetencia(null);
    $this->assertEquals(null, self::$NfReturnRps->getDataCompetencia());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Numero da Guia inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidNumeroGuia()
  {
    self::$NfReturnRps->setNumeroGuia('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Numero da Guia inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeNumeroGuia()
  {
    self::$NfReturnRps->setNumeroGuia(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Numero da Guia inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNumeroGuia()
  {
    self::$NfReturnRps->setNumeroGuia(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNumeroGuia()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroGuia(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroGuia(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroGuia(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroGuia(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNumeroGuia(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNumeroGuia()
  {
    self::$NfReturnRps->setNumeroGuia(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getNumeroGuia());

    self::$NfReturnRps->setNumeroGuia(null);
    $this->assertEquals(0, self::$NfReturnRps->getNumeroGuia());
  }

  /**
   * @access public
   * @return void
   */
  public function testSetDataQuitacao()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setDataQuitacao(new \DateTime()));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setDataQuitacao(null));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetDataQuitacao()
  {
    $date = new \DateTime();
    self::$NfReturnRps->setDataQuitacao($date);
    $this->assertEquals($date, self::$NfReturnRps->getDataQuitacao());

    self::$NfReturnRps->setDataQuitacao(null);
    $this->assertEquals(null, self::$NfReturnRps->getDataQuitacao());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Lote inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidLote()
  {
    self::$NfReturnRps->setLote('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Lote inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeLote()
  {
    self::$NfReturnRps->setLote(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Lote inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongLote()
  {
    self::$NfReturnRps->setLote(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetLote()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setLote(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setLote(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setLote(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setLote(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setLote(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetLote()
  {
    self::$NfReturnRps->setLote(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getLote());

    self::$NfReturnRps->setLote(null);
    $this->assertEquals(0, self::$NfReturnRps->getLote());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código da Obra inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongCodigoObra()
  {
    self::$NfReturnRps->setCodigoObra('1231231231231231');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetCodigoObra()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoObra('13123'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoObra(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setCodigoObra(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetCodigoObra()
  {
    self::$NfReturnRps->setCodigoObra('123123');
    $this->assertEquals('123123', self::$NfReturnRps->getCodigoObra());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Anotação Técnica inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongAnotacaoTecnica()
  {
    self::$NfReturnRps->setAnotacaoTecnica('1231231231231231');
  }

  /**
   * @access public
   * @return void
   */
  public function testSetAnotacaoTecnica()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAnotacaoTecnica('13123'));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAnotacaoTecnica(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setAnotacaoTecnica(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetAnotacaoTecnica()
  {
    self::$NfReturnRps->setAnotacaoTecnica('123123');
    $this->assertEquals('123123', self::$NfReturnRps->getAnotacaoTecnica());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nf Substituido inválida
   *
   * @access public
   * @return void
   */
  public function testSetInvalidNfSubstituido()
  {
    self::$NfReturnRps->setNfSubstituido('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nf Substituido inválida
   *
   * @access public
   * @return void
   */
  public function testSetNegativeNfSubstituido()
  {
    self::$NfReturnRps->setNfSubstituido(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nf Substituido inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongNfSubstituido()
  {
    self::$NfReturnRps->setNfSubstituido(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNfSubstituido()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituido(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituido(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituido(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituido(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituido(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNfSubstituido()
  {
    self::$NfReturnRps->setNfSubstituido(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getNfSubstituido());

    self::$NfReturnRps->setNfSubstituido(null);
    $this->assertEquals(0, self::$NfReturnRps->getNfSubstituido());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nf Substituto inválida
   *
   * @access public
   * @return void
   */
  public function testSetInvalidNfSubstituto()
  {
    self::$NfReturnRps->setNfSubstituto('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nf Substituto inválida
   *
   * @access public
   * @return void
   */
  public function testSetNegativeNfSubstituto()
  {
    self::$NfReturnRps->setNfSubstituto(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nf Substituto inválida
   *
   * @access public
   * @return void
   */
  public function testSetLongNfSubstituto()
  {
    self::$NfReturnRps->setNfSubstituto(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNfSubstituto()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituto(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituto(123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituto(123123123123123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituto(null));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnRps', self::$NfReturnRps->setNfSubstituto(''));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNfSubstituto()
  {
    self::$NfReturnRps->setNfSubstituto(123123);
    $this->assertEquals(123123, self::$NfReturnRps->getNfSubstituto());

    self::$NfReturnRps->setNfSubstituto(null);
    $this->assertEquals(0, self::$NfReturnRps->getNfSubstituto());
  }

  /**
   * @access public
   * @return void
   */
  public function testGetDiscriminacaoServicos()
  {
    self::$NfReturnRps->setDiscriminacaoServicos('asdasdasdasd');
    $this->assertEquals('asdasdasdasd', self::$NfReturnRps->getDiscriminacaoServicos());
  }




  /**
   * {@inheritDoc}
   *
   * @access public
   * @return void
   */
  public static function tearDownAfterClass()
  {
      self::$NfReturnRps = null;
  }
}
