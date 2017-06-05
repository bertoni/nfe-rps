<?php
/**
 * File that brings the Nf Return Footer Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     NfReturnFooterSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\NF;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\NF\NfReturnFooter;

/**
 * Nf Return Footer Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnFooterSetTest extends CommomTest
{
  /**
   * @var    EntityManager
   * @access protected
   */
  protected static $NfReturnFooter;

  /**
   * {@inheritDoc}
   *
   * @access public
   * @return void
   */
  public static function setUpBeforeClass()
  {
    self::bootKernel();
    self::$NfReturnFooter = new NfReturnFooter();
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
    $this->assertEquals(90, self::$NfReturnFooter->getTipoRegistro());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número de linhas inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidNumeroLinhas()
  {
    self::$NfReturnFooter->setNumeroLinhas('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número de linhas inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullNumeroLinhas()
  {
    self::$NfReturnFooter->setNumeroLinhas(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número de linhas inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyNumeroLinhas()
  {
    self::$NfReturnFooter->setNumeroLinhas('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número de linhas inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongNumeroLinhas()
  {
    self::$NfReturnFooter->setNumeroLinhas(123456789);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetNumeroLinhas()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setNumeroLinhas(1));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setNumeroLinhas(1234));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setNumeroLinhas(12345678));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetNumeroLinhas()
  {
    self::$NfReturnFooter->setNumeroLinhas(1);
    $this->assertEquals(1, self::$NfReturnFooter->getNumeroLinhas());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorTotal()
  {
    self::$NfReturnFooter->setValorTotal('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorTotal()
  {
    self::$NfReturnFooter->setValorTotal(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorTotal()
  {
    self::$NfReturnFooter->setValorTotal('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorTotal()
  {
    self::$NfReturnFooter->setValorTotal(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorTotal()
  {
    self::$NfReturnFooter->setValorTotal(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorTotal()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorTotal(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorTotal(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorTotal(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorTotal()
  {
    self::$NfReturnFooter->setValorTotal(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorTotal());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorDeducoes()
  {
    self::$NfReturnFooter->setValorDeducoes('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorDeducoes()
  {
    self::$NfReturnFooter->setValorDeducoes(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorDeducoes()
  {
    self::$NfReturnFooter->setValorDeducoes('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorDeducoes()
  {
    self::$NfReturnFooter->setValorDeducoes(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das deduções inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorDeducoes()
  {
    self::$NfReturnFooter->setValorDeducoes(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorDeducoes()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDeducoes(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDeducoes(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDeducoes(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorDeducoes()
  {
    self::$NfReturnFooter->setValorDeducoes(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorDeducoes());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos condicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorDescontosCondicionados()
  {
    self::$NfReturnFooter->setValorDescontosCondicionados('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos condicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorDescontosCondicionados()
  {
    self::$NfReturnFooter->setValorDescontosCondicionados(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos condicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorDescontosCondicionados()
  {
    self::$NfReturnFooter->setValorDescontosCondicionados('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos condicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorDescontosCondicionados()
  {
    self::$NfReturnFooter->setValorDescontosCondicionados(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos condicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorDescontosCondicionados()
  {
    self::$NfReturnFooter->setValorDescontosCondicionados(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorDescontosCondicionados()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDescontosCondicionados(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDescontosCondicionados(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDescontosCondicionados(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorDescontosCondicionados()
  {
    self::$NfReturnFooter->setValorDescontosCondicionados(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorDescontosCondicionados());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos incondicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorDescontosIncondicionados()
  {
    self::$NfReturnFooter->setValorDescontosIncondicionados('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos incondicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorDescontosIncondicionados()
  {
    self::$NfReturnFooter->setValorDescontosIncondicionados(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos incondicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorDescontosIncondicionados()
  {
    self::$NfReturnFooter->setValorDescontosIncondicionados('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos incondicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorDescontosIncondicionados()
  {
    self::$NfReturnFooter->setValorDescontosIncondicionados(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos descontos incondicionados inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorDescontosIncondicionados()
  {
    self::$NfReturnFooter->setValorDescontosIncondicionados(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorDescontosIncondicionados()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDescontosIncondicionados(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDescontosIncondicionados(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorDescontosIncondicionados(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorDescontosIncondicionados()
  {
    self::$NfReturnFooter->setValorDescontosIncondicionados(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorDescontosIncondicionados());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do cofins inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorCofins()
  {
    self::$NfReturnFooter->setValorCofins('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do cofins inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorCofins()
  {
    self::$NfReturnFooter->setValorCofins(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do cofins inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorCofins()
  {
    self::$NfReturnFooter->setValorCofins('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do cofins inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorCofins()
  {
    self::$NfReturnFooter->setValorCofins(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do cofins inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorCofins()
  {
    self::$NfReturnFooter->setValorCofins(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorCofins()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCofins(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCofins(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCofins(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorCofins()
  {
    self::$NfReturnFooter->setValorCofins(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorCofins());
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
    self::$NfReturnFooter->setValorCsll('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do CSLL inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorCsll()
  {
    self::$NfReturnFooter->setValorCsll(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do CSLL inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorCsll()
  {
    self::$NfReturnFooter->setValorCsll('');
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
    self::$NfReturnFooter->setValorCsll(-1);
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
    self::$NfReturnFooter->setValorCsll(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorCsll()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCsll(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCsll(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCsll(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorCsll()
  {
    self::$NfReturnFooter->setValorCsll(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorCsll());
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
    self::$NfReturnFooter->setValorInss('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do INSS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorInss()
  {
    self::$NfReturnFooter->setValorInss(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do INSS inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorInss()
  {
    self::$NfReturnFooter->setValorInss('');
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
    self::$NfReturnFooter->setValorInss(-1);
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
    self::$NfReturnFooter->setValorInss(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorInss()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorInss(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorInss(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorInss(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorInss()
  {
    self::$NfReturnFooter->setValorInss(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorInss());
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
    self::$NfReturnFooter->setValorIrpj('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do IRPJ inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorIrpj()
  {
    self::$NfReturnFooter->setValorIrpj(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do IRPJ inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorIrpj()
  {
    self::$NfReturnFooter->setValorIrpj('');
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
    self::$NfReturnFooter->setValorIrpj(-1);
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
    self::$NfReturnFooter->setValorIrpj(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorIrpj()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorIrpj(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorIrpj(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorIrpj(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorIrpj()
  {
    self::$NfReturnFooter->setValorIrpj(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorIrpj());
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
    self::$NfReturnFooter->setValorPisPasep('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do PIS/PASEP inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorPisPasep()
  {
    self::$NfReturnFooter->setValorPisPasep(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do PIS/PASEP inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorPisPasep()
  {
    self::$NfReturnFooter->setValorPisPasep('');
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
    self::$NfReturnFooter->setValorPisPasep(-1);
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
    self::$NfReturnFooter->setValorPisPasep(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorPisPasep()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorPisPasep(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorPisPasep(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorPisPasep(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorPisPasep()
  {
    self::$NfReturnFooter->setValorPisPasep(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorPisPasep());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorOutrasRetencoes()
  {
    self::$NfReturnFooter->setValorOutrasRetencoes('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorOutrasRetencoes()
  {
    self::$NfReturnFooter->setValorOutrasRetencoes(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorOutrasRetencoes()
  {
    self::$NfReturnFooter->setValorOutrasRetencoes('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorOutrasRetencoes()
  {
    self::$NfReturnFooter->setValorOutrasRetencoes(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de outras Retenções inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorOutrasRetencoes()
  {
    self::$NfReturnFooter->setValorOutrasRetencoes(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorOutrasRetencoes()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorOutrasRetencoes(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorOutrasRetencoes(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorOutrasRetencoes(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorOutrasRetencoes()
  {
    self::$NfReturnFooter->setValorOutrasRetencoes(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorOutrasRetencoes());
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
    self::$NfReturnFooter->setValorIss('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorIss()
  {
    self::$NfReturnFooter->setValorIss(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorIss()
  {
    self::$NfReturnFooter->setValorIss('');
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
    self::$NfReturnFooter->setValorIss(-1);
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
    self::$NfReturnFooter->setValorIss(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorIss()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorIss(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorIss(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorIss(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorIss()
  {
    self::$NfReturnFooter->setValorIss(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorIss());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Créditos inválido
   *
   * @access public
   * @return void
   */
  public function testSetInvalidValorCredito()
  {
    self::$NfReturnFooter->setValorCredito('abc');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Créditos inválido
   *
   * @access public
   * @return void
   */
  public function testSetNullValorCredito()
  {
    self::$NfReturnFooter->setValorCredito(null);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Créditos inválido
   *
   * @access public
   * @return void
   */
  public function testSetEmptyValorCredito()
  {
    self::$NfReturnFooter->setValorCredito('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Créditos inválido
   *
   * @access public
   * @return void
   */
  public function testSetNegativeValorCredito()
  {
    self::$NfReturnFooter->setValorCredito(-1);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Créditos inválido
   *
   * @access public
   * @return void
   */
  public function testSetLongValorCredito()
  {
    self::$NfReturnFooter->setValorCredito(1231231231231231);
  }

  /**
   * @access public
   * @return void
   */
  public function testSetValorCredito()
  {
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCredito(0));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCredito(1234123));
    $this->assertInstanceOf('NfeBundle\Entity\NF\NfReturnFooter', self::$NfReturnFooter->setValorCredito(123123123123123));
  }

  /**
   * @access public
   * @return void
   */
  public function testGetValorCredito()
  {
    self::$NfReturnFooter->setValorCredito(1);
    $this->assertEquals(1, self::$NfReturnFooter->getValorCredito());
  }




  /**
   * {@inheritDoc}
   *
   * @access public
   * @return void
   */
  public static function tearDownAfterClass()
  {
      self::$NfReturnFooter = null;
  }
}
