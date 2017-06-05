<?php
/**
 * File that brings the Nf Return Layout Common TXT Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     NfReturnLayoutCommonTxtSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\NF;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\NF\NfReturnLayoutCommonTxt;

/**
 * Nf Return Layout Common TXT Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnLayoutCommonTxtSetTest extends CommomTest
{
  /**
   * @var    NfReturnLayoutCommonTxt
   * @access protected
   */
  protected static $NfReturnLayoutCommonTxt;
  /**
   * @var    string
   * @access protected
   */
  protected static $filename;

  /**
   * {@inheritDoc}
   *
   * @access public
   * @return void
   */
  public static function setUpBeforeClass()
  {
    self::bootKernel();
    self::$filename = realpath('./var/cache/test/') . '/test-rps-file.txt';
    self::$NfReturnLayoutCommonTxt = new NfReturnLayoutCommonTxt(self::$filename);
    if (is_null(self::$em)) {
      self::$em = static::$kernel->getContainer()
        ->get('doctrine')
        ->getManager();
    }
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage O caminho informado não é um arquivo
   *
   * @access public
   * @return void
   */
  public function testFileNotExists()
  {
    @unlink(self::$filename);
    self::$NfReturnLayoutCommonTxt->validateFile();
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage O retorno do RPS não contém um mínimo de 1 cabeçalho, 1 detalhe e 1 rodap
   *
   * @access public
   * @return void
   */
  public function testFileWithOnlyHeader()
  {
    @unlink(self::$filename);
    file_put_contents(self::$filename, 'abc', FILE_TEXT);
    self::$NfReturnLayoutCommonTxt->validateFile();
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage O retorno do RPS não contém um mínimo de 1 cabeçalho, 1 detalhe e 1 rodap
   *
   * @access public
   * @return void
   */
  public function testFileWithOnlyHeaderAndFooter()
  {
    @unlink(self::$filename);
    file_put_contents(self::$filename, "abc\nabc", FILE_TEXT);
    self::$NfReturnLayoutCommonTxt->validateFile();
  }

  /**
   * @access public
   * @return void
   */
  public function testValidateFile()
  {
    @unlink(self::$filename);
    file_put_contents(self::$filename, "abc\nabc\nabc\n", FILE_TEXT);
    $this->assertEquals(null, self::$NfReturnLayoutCommonTxt->validateFile());
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage A quantidade de caracteres do cabeçalho é inválida
   *
   * @access public
   * @return void
   */
  public function testEmptyHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de registro do cabeçalho inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidRegisterTypeHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('00' . $this->generateRandomString(49));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Versão do Arquivo do cabeçalho inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidVersionTypeHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('10aaa' . $this->generateRandomString(46));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Identificação CPF ou CNPJ do Contribuinte do cabeçalho inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidTypeIdenificationContributorHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('100030' . $this->generateRandomString(45));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CPF ou CNPJ do Contribuinte do cabeçalho inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidIdenificationContributorHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('100031a8us9jiyu687hi' . $this->generateRandomString(31));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Contribuinte do cabeçalho inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidMunicipalInscriptionHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('10003100000000000000smcamia9019w000' . $this->generateRandomString(16));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Data de Início do Período Transferido no Arquivo do cabeçalho inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidBeginDateHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('10003100000000000000000000000000000ujh75tgf' . $this->generateRandomString(8));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Data de Fim do Período Transferido no Arquivo do cabeçalho inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidEndDateHeader()
  {
    self::$NfReturnLayoutCommonTxt->validateHeader('1000310000000000000000000000000000020170101ujh65tgf');
  }

  /**
   * @access public
   * @return void
   */
  public function testValidateHeader()
  {
    $this->assertEquals(null, self::$NfReturnLayoutCommonTxt->validateHeader($this->generateHeader()));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage A quantidade de caracteres do rodapé é inválida
   *
   * @access public
   * @return void
   */
  public function testEmptyFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de registro do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidRegisterTypeFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter('00' . $this->generateRandomString(188));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número de linhas de detalhe do arquivo do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidLineNumberFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter('90ahjy64re' . $this->generateRandomString(180));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total dos serviços contido no arquivo do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidTotalValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter('9010000000hytg543sr43sy65' . $this->generateRandomString(165));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total das deduções contidas no arquivo do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidDeductionValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter('9010000000100000000000000jhyt54re3rt54ry' . $this->generateRandomString(150));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total dos descontos condicionados contidos no arquivo do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidConditionalDiscountValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter('9010000000100000000000000100000000000000juy65tr43ew21qa' . $this->generateRandomString(135));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total dos descontos incondicionados contidos no arquivo do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidUnconditionalDiscountValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000juyh65tr43ew21q' . $this->generateRandomString(120)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total das retenções de COFINS do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCofinsValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000o98iu76yt54re32' . $this->generateRandomString(105)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total das retenções de CSLL do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCsllValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000100000000000000p09oi87uy65tr43' . $this->generateRandomString(90)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total das retenções de INSS do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidInssValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000q12we34rt56yu78'
      . $this->generateRandomString(75)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total das retenções de IRPJ do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidIrpjValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000edfr45tghy67ujk'
      . $this->generateRandomString(60)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total das retenções de PIS/PASEP do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidPisPasepValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000'
      . 'lkjuiop09876ytg' . $this->generateRandomString(45)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total de outras retenções federais do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidOtherRetentionsValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000'
      . '100000000000000kiujhyt5432weds' . $this->generateRandomString(30)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total do ISS do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidIssValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000okjuy56tg4re3w2' . $this->generateRandomString(15)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor total dos créditos do rodapé inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCreditValueFooter()
  {
    self::$NfReturnLayoutCommonTxt->validateFooter(
      '9010000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000jhgfrtyu76543ed'
    );
  }

  /**
   * @access public
   * @return void
   */
  public function testValidateFooter()
  {
    $this->assertEquals(null, self::$NfReturnLayoutCommonTxt->validateFooter($this->generateFooter()));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage A quantidade de caracteres do detalhe de RPS é inválida
   *
   * @access public
   * @return void
   */
  public function testEmptyRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps('');
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de registro no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidRegisterTypeRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps('00' . $this->generateRandomString(1676));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nota Fiscal no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidNfNumberRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps('208uj76yt54re43tg' . $this->generateRandomString(1676));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Status da Nota Fiscal no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidNfStatusRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps('20100000000000000a' . $this->generateRandomString(1676));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Data Hora da Emissão da Nota no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidEmissionDateNfRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps('201000000000000002aaaaaaaaa0o9i8u7y6t5r4e' . $this->generateRandomString(1676));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de RPS no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidRpsTypeRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps('201000000000000002aaaaaaaaa10000000000000a' . $this->generateRandomString(1676));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número do RPS no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidRpsNumberRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps('201000000000000002aaaaaaaaa100000000000001aaaaaloikju76yhgt54r' . $this->generateRandomString(1676));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Data de Emissão do RPS no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidEmissionDateRpsRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa100000000000000loikju76' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Indicador de CPF ou CNPJ do Prestador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidDocumentTypeProviderRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000a' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CPF ou CNPJ do Prestador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidDocumentProviderRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa100000000000000100000002loikju76yhg6t5' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Prestador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidMunicipalInscriptionProviderRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000lkiujhy65tgfr43' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Prestador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidEstadualInscriptionProviderRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000lkju76ygtt4rf4e'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage UF do Prestador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidStateProviderRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . '1S'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Prestador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidZipcodeProviderRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . 'loikju76' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Indicador de CPF ou CNPJ do Tomador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidDocumentTypeTakerRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . 'x' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CPF ou CNPJ do Tomador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidDocumentTakerRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '1lkjhyu76yt54re' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Municipal do Tomador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidMunicipalInscriptionTakerRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000loikju76yhgt54r'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Inscrição Estadual do Tomador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidEstadualInscriptionTakerRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000loikjuyhgtrfdew'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage UF do Tomador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidStateTakerRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . '0o' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage CEP do Tomador no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidZipcodeTakerRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJpoiklju7'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Tipo de Tributação de Serviços no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidTaxationTypeTakerRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '00' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage UF de Prestação do Serviço no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidStateServiceProviderRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'T5'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Regime Especial de Tributação no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidSpecialTributationRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS09'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Opção Pelo Simples no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidSimpleOptionRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS02A'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Incentivo Cultural no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCulturalIncentiveRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS020K'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Código do Benefício no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidBenefitCodeRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           asd' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Alíquota no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidAliquotRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . 'jhgfd' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor dos Serviços no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidServiceValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000lkjhgtyui87yuhg'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor das Deduções no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidDeductionValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000lkjuikjhyt56tgh'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Condicionado no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidConditionalDiscountValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000polkiujhytgfre4'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Desconto Incondicionado no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidUnconditionalDiscountValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . 'oikju76yt54rewd' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor COFINS no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCofinsValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000oikjuyhgtrfdert' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor CSLL no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCsllValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000oikjuyhgtrfdert' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor INSS no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidInssValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000aikjuyhgtrfdert' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor IRPJ no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidIrpjValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000100000000000000aikjuyhgtrfdert' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor PIS/PASEP no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidPisPasepValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000100000000000000100000000000000aikjuyhgtrfdert' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor de Outras Retenções Federais no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidOtherRetentionsValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000aikjuyhgtrfdert'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do ISS no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidIssValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000aikjuyhgtrfdert'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Valor do Crédito no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCreditValueRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000aikjuyhgtrfdert'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage ISS Retido no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidIssStatusRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000100000000000000a'
      . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Data de Cancelamento no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCancelDateRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '1000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001'
      . 'lkjhyu76' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Data de Competência no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidCompetenceDateRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '1000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001'
      . '        kju987uh' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Guia no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidGuideNumberRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '1000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001'
      . '1000000010000000lkjuyhgtrfdewdf' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Data de Quitação da Guia Vinculada a Nota Fiscal no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidDischargeDateRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '1000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001'
      . '1000000010000000100000000000000loikjuyh' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Lote (Protocolo) no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidProtocolLotRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '1000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001'
      . '1000000010000000100000000000000        lkjhgfdsaqwerty' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nota Fiscal Substituida no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidReplacedNfNumberRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '1000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001'
      . '100000001000000010000000000000010000000100000000000000' . $this->generateRandomString(15) . $this->generateRandomString(15)
      . 'lkjhgtyujhy65tr' . $this->generateRandomString(1676)
    );
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage Número da Nota Substituta no detalhe de RPS inválido
   *
   * @access public
   * @return void
   */
  public function testInvalidReplaceNfNumberRps()
  {
    self::$NfReturnLayoutCommonTxt->validateRps(
      '201000000000000002aaaaaaaaa100000000000001aaaaa10000000000000010000000210000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(60) . $this->generateRandomString(3) . $this->generateRandomString(125)
      . $this->generateRandomString(10) . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'SP'
      . '10000000' . $this->generateRandomString(11) . $this->generateRandomString(80) . '110000000000000100000000000000100000000000000'
      . $this->generateRandomString(115) . $this->generateRandomString(3) . $this->generateRandomString(125) . $this->generateRandomString(10)
      . $this->generateRandomString(60) . $this->generateRandomString(72) . $this->generateRandomString(50) . 'RJ10000000'
      . $this->generateRandomString(11) . $this->generateRandomString(80) . '01' . $this->generateRandomString(50) . 'RS0201'
      . $this->generateRandomString(4) . '           123' . $this->generateRandomString(6) . '10000100000000000000100000000000000100000000000000'
      . '1000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001000000000000001'
      . '100000001000000010000000000000010000000100000000000000' . $this->generateRandomString(15) . $this->generateRandomString(15)
      . '100000000000000lkjhgtyujhy65tr' . $this->generateRandomString(1676)
    );
  }

  /**
   * @access public
   * @return void
   */
  public function testValidateRps()
  {
    $this->assertEquals(null, self::$NfReturnLayoutCommonTxt->validateRps($this->generateRps()));
  }

  /**
   * @access public
   * @return void
   */
  public function testExtractHeader()
  {
    $document_type         = '2';
    $document              = '09809182091802';
    $municipal_inscription = '018301820318309';
    $date_begin            = '20170110';
    $date_end              = '20170220';

    self::$NfReturnLayoutCommonTxt->extractHeader($this->generateHeader($document_type, $document, $municipal_inscription, $date_begin, $date_end));

    $this->assertEquals($document_type,         self::$NfReturnLayoutCommonTxt->getHeader()->getTipoIdentificacaoContribuinte());
    $this->assertEquals($document,              self::$NfReturnLayoutCommonTxt->getHeader()->getIdentificacaoContribuinte());
    $this->assertEquals($municipal_inscription, self::$NfReturnLayoutCommonTxt->getHeader()->getInscricaoMunicipalContribuinte());
    $this->assertEquals($date_begin,            self::$NfReturnLayoutCommonTxt->getHeader()->getInicioPeriodo()->format('Ymd'));
    $this->assertEquals($date_end,              self::$NfReturnLayoutCommonTxt->getHeader()->getTerminoPeriodo()->format('Ymd'));
  }

  /**
   * @access public
   * @return void
   */
  public function testExtractFooter()
  {
    $line_number                  = rand(1, 99999999);
    $total_value                  = rand(1, 99999999);
    $deduction_value              = rand(1, 99999999);
    $conditional_discount_value   = rand(1, 99999999);
    $unconditional_discount_value = rand(1, 99999999);
    $cofins_value                 = rand(1, 99999999);
    $csll_value                   = rand(1, 99999999);
    $inss_value                   = rand(1, 99999999);
    $irpj_value                   = rand(1, 99999999);
    $pis_pasep_value              = rand(1, 99999999);
    $other_retentions_value       = rand(1, 99999999);
    $iss_value                    = rand(1, 99999999);
    $credit_value                 = rand(1, 99999999);

    self::$NfReturnLayoutCommonTxt->extractFooter($this->generateFooter(
      $line_number, $total_value, $deduction_value, $conditional_discount_value, $unconditional_discount_value, $cofins_value, $csll_value,
      $inss_value, $irpj_value, $pis_pasep_value, $other_retentions_value, $iss_value, $credit_value
    ));

    $this->assertEquals($line_number,                  self::$NfReturnLayoutCommonTxt->getFooter()->getNumeroLinhas());
    $this->assertEquals($total_value,                  self::$NfReturnLayoutCommonTxt->getFooter()->getValorTotal());
    $this->assertEquals($deduction_value,              self::$NfReturnLayoutCommonTxt->getFooter()->getValorDeducoes());
    $this->assertEquals($conditional_discount_value,   self::$NfReturnLayoutCommonTxt->getFooter()->getValorDescontosCondicionados());
    $this->assertEquals($unconditional_discount_value, self::$NfReturnLayoutCommonTxt->getFooter()->getValorDescontosIncondicionados());
    $this->assertEquals($cofins_value,                 self::$NfReturnLayoutCommonTxt->getFooter()->getValorCofins());
    $this->assertEquals($csll_value,                   self::$NfReturnLayoutCommonTxt->getFooter()->getValorCsll());
    $this->assertEquals($inss_value,                   self::$NfReturnLayoutCommonTxt->getFooter()->getValorInss());
    $this->assertEquals($irpj_value,                   self::$NfReturnLayoutCommonTxt->getFooter()->getValorIrpj());
    $this->assertEquals($pis_pasep_value,              self::$NfReturnLayoutCommonTxt->getFooter()->getValorPisPasep());
    $this->assertEquals($other_retentions_value,       self::$NfReturnLayoutCommonTxt->getFooter()->getValorOutrasRetencoes());
    $this->assertEquals($iss_value,                    self::$NfReturnLayoutCommonTxt->getFooter()->getValorIss());
    $this->assertEquals($credit_value,                 self::$NfReturnLayoutCommonTxt->getFooter()->getValorCredito());
  }

  /**
   * @access public
   * @return void
   */
  public function testExtractRps()
  {
    $nf_number                      = rand(1, 999999);
    $nf_status                      = '1';
    $verification_code              = $this->generateRandomString(9);
    $nf_datetime_emission           = '20170101100533';
    $rps_type                       = '2';
    $rps_serie                      = $this->generateRandomString(5);
    $rps_number                     = rand(1, 999999);
    $rps_date_emission              = '20170101';
    $provider_document_type         = '1';
    $provider_document              = rand(1, 999999);
    $provider_municipal_inscription = rand(1, 999999);
    $provider_estadual_inscription  = rand(1, 999999);
    $provider_social_name           = $this->generateRandomString(115);
    $provider_fantasy_name          = $this->generateRandomString(60);
    $provider_address_type          = $this->generateRandomString(3);
    $provider_address               = $this->generateRandomString(125);
    $provider_address_number        = $this->generateRandomString(10);
    $provider_address_complement    = $this->generateRandomString(60);
    $provider_address_district      = $this->generateRandomString(72);
    $provider_address_city          = $this->generateRandomString(50);
    $provider_address_state         = 'SP';
    $provider_address_zipcode       = rand(1, 999999);
    $provider_phone                 = $this->generateRandomString(11);
    $provider_email                 = $this->generateRandomString(80);
    $taker_document_type            = '2';
    $taker_document                 = rand(1, 999999);
    $taker_municipal_inscription    = rand(1, 999999);
    $taker_estadual_inscription     = rand(1, 999999);
    $taker_name                     = $this->generateRandomString(115);
    $taker_address_type             = $this->generateRandomString(3);
    $taker_address                  = $this->generateRandomString(125);
    $taker_address_number           = $this->generateRandomString(10);
    $taker_address_complement       = $this->generateRandomString(60);
    $taker_address_district         = $this->generateRandomString(72);
    $taker_address_city             = $this->generateRandomString(50);
    $taker_address_state            = 'MG';
    $taker_address_zipcode          = rand(1, 999999);
    $taker_phone                    = $this->generateRandomString(11);
    $taker_email                    = $this->generateRandomString(80);
    $tributation_type               = '01';
    $service_city                   = $this->generateRandomString(50);
    $service_state                  = 'RJ';
    $special_tax                    = '01';
    $simple_option                  = '1';
    $cultural_incentive             = '0';
    $federal_service_code           = $this->generateRandomString(4);
    $benefit_code                   = '000';
    $municipal_service_code         = $this->generateRandomString(6);
    $aliquot                        = '00000';
    $service_value                  = rand(1, 999999);
    $deduction_value                = rand(1, 999999);
    $conditional_discount_value     = rand(1, 999999);
    $unconditional_discount_value   = rand(1, 999999);
    $cofins_value                   = rand(1, 999999);
    $csll_value                     = rand(1, 999999);
    $inss_value                     = rand(1, 999999);
    $irpj_value                     = rand(1, 999999);
    $pis_pasep_value                = rand(1, 999999);
    $other_retentions_value         = rand(1, 999999);
    $iss_value                      = rand(1, 999999);
    $credit_value                   = rand(1, 999999);
    $iss_status                     = '1';
    $cancel_date                    = '20170102';
    $competence_date                = '20170102';
    $guide_number                   = rand(1, 999999);
    $guide_date                     = '20170102';
    $protocol_lot                   = rand(1, 999999);
    $work_code                      = $this->generateRandomString(15);
    $responsible_anotation          = $this->generateRandomString(15);
    $nf_number_replaced             = rand(1, 999999);
    $nf_number_replace              = rand(1, 999999);
    $desciption                     = $this->generateRandomString(10);

    self::$NfReturnLayoutCommonTxt->extractRps($this->generateRps(
      $nf_number, $nf_status, $verification_code, $nf_datetime_emission, $rps_type, $rps_serie, $rps_number, $rps_date_emission,
      $provider_document_type, $provider_document, $provider_municipal_inscription, $provider_estadual_inscription, $provider_social_name,
      $provider_fantasy_name, $provider_address_type, $provider_address, $provider_address_number, $provider_address_complement,
      $provider_address_district, $provider_address_city, $provider_address_state, $provider_address_zipcode, $provider_phone, $provider_email,
      $taker_document_type, $taker_document, $taker_municipal_inscription, $taker_estadual_inscription, $taker_name, $taker_address_type,
      $taker_address, $taker_address_number, $taker_address_complement, $taker_address_district, $taker_address_city, $taker_address_state,
      $taker_address_zipcode, $taker_phone, $taker_email, $tributation_type, $service_city, $service_state, $special_tax, $simple_option,
      $cultural_incentive, $federal_service_code, $benefit_code, $municipal_service_code, $aliquot, $service_value, $deduction_value,
      $conditional_discount_value, $unconditional_discount_value, $cofins_value, $csll_value, $inss_value, $irpj_value, $pis_pasep_value,
      $other_retentions_value, $iss_value, $credit_value, $iss_status, $cancel_date, $competence_date, $guide_number, $guide_date, $protocol_lot,
      $work_code, $responsible_anotation, $nf_number_replaced, $nf_number_replace, $desciption
    ));

    $this->assertInstanceOf('\ArrayObject', self::$NfReturnLayoutCommonTxt->getRps());
    $this->assertEquals($nf_number, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNumeroNf());
    $this->assertEquals($nf_status, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getStatusNf());
    $this->assertEquals($verification_code, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCodigoVerificacao());
    $this->assertEquals($nf_datetime_emission, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getDataEmissaoNf()->format('YmdHis'));
    $this->assertEquals($rps_type, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTipoRps());
    $this->assertEquals($rps_serie, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getSerieRps());
    $this->assertEquals($rps_number, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNumeroRps());
    $this->assertEquals($rps_date_emission, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getDataEmissaoRps()->format('Ymd'));
    $this->assertEquals($provider_document_type, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTipoIdentificacaoPrestador());
    $this->assertEquals($provider_document, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getIdentificacaoPrestador());
    $this->assertEquals($provider_municipal_inscription, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getInscricaoMunicipalPrestador());
    $this->assertEquals($provider_estadual_inscription, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getInscricaoEstadualPrestador());
    $this->assertEquals($provider_social_name, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getRazaoPrestador());
    $this->assertEquals($provider_fantasy_name, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNomePrestador());
    $this->assertEquals($provider_address_type, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTipoEnderecoPrestador());
    $this->assertEquals($provider_address, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getEnderecoPrestador());
    $this->assertEquals($provider_address_number, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNumeroEnderecoPrestador());
    $this->assertEquals($provider_address_complement, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getComplementoEnderecoPrestador());
    $this->assertEquals($provider_address_district, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getBairroPrestador());
    $this->assertEquals($provider_address_city, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCidadePrestador());
    $this->assertEquals($provider_address_state, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getUfPrestador());
    $this->assertEquals($provider_address_zipcode, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCepPrestador());
    $this->assertEquals($provider_phone, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTelefonePrestador());
    $this->assertEquals($provider_email, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getEmailPrestador());
    $this->assertEquals($taker_document_type, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTipoIdentificacaoTomador());
    $this->assertEquals($taker_document, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getIdentificacaoTomador());
    $this->assertEquals($taker_municipal_inscription, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getInscricaoMunicipalTomador());
    $this->assertEquals($taker_estadual_inscription, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getInscricaoEstadualTomador());
    $this->assertEquals($taker_name, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNomeTomador());
    $this->assertEquals($taker_address_type, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTipoEnderecoTomador());
    $this->assertEquals($taker_address, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getEnderecoTomador());
    $this->assertEquals($taker_address_number, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNumeroEnderecoTomador());
    $this->assertEquals($taker_address_complement, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getComplementoEnderecoTomador());
    $this->assertEquals($taker_address_district, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getBairroTomador());
    $this->assertEquals($taker_address_city, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCidadeTomador());
    $this->assertEquals($taker_address_state, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getUfTomador());
    $this->assertEquals($taker_address_zipcode, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCepTomador());
    $this->assertEquals($taker_phone, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTelefoneTomador());
    $this->assertEquals($taker_email, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getEmailTomador());
    $this->assertEquals($tributation_type, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getTipoTributacao());
    $this->assertEquals($service_city, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCidadePrestacao());
    $this->assertEquals($service_state, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getUfPrestacao());
    $this->assertEquals($special_tax, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getRegimeEspecial());
    $this->assertEquals($simple_option, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getOpcaoSimples());
    $this->assertEquals($cultural_incentive, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getIncentivoCultural());
    $this->assertEquals($federal_service_code, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCodigoServicoFederal());
    $this->assertEquals($benefit_code, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCodigoBeneficio());
    $this->assertEquals($municipal_service_code, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCodigoServicoMunicipal());
    $this->assertEquals($aliquot, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getAliquota());
    $this->assertEquals($service_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorServicos());
    $this->assertEquals($deduction_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorDeducoes());
    $this->assertEquals($conditional_discount_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorDescontoCondicionado());
    $this->assertEquals($unconditional_discount_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorDescontoIncondicionado());
    $this->assertEquals($cofins_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorCofins());
    $this->assertEquals($csll_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorCsll());
    $this->assertEquals($inss_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorInss());
    $this->assertEquals($irpj_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorIrpj());
    $this->assertEquals($pis_pasep_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorPisPasep());
    $this->assertEquals($other_retentions_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorOutrasRetencoes());
    $this->assertEquals($iss_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorIss());
    $this->assertEquals($credit_value, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getValorCredito());
    $this->assertEquals($iss_status, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getIssRetido());
    $this->assertEquals($cancel_date, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getDataCancelamento()->format('Ymd'));
    $this->assertEquals($competence_date, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getDataCompetencia()->format('Ymd'));
    $this->assertEquals($guide_number, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNumeroGuia());
    $this->assertEquals($guide_date, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getDataQuitacao()->format('Ymd'));
    $this->assertEquals($protocol_lot, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getLote());
    $this->assertEquals($work_code, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getCodigoObra());
    $this->assertEquals($responsible_anotation, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getAnotacaoTecnica());
    $this->assertEquals($nf_number_replaced, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNfSubstituido());
    $this->assertEquals($nf_number_replace, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getNfSubstituto());
    $this->assertEquals($desciption, self::$NfReturnLayoutCommonTxt->getRps()->offsetGet($rps_number)->getDiscriminacaoServicos());
  }

  public function generateHeader(
    $document_type         = '1',
    $document              = '00000000000000',
    $municipal_inscription = '000000000000000',
    $date_begin            = '20170101',
    $date_end              = '20170101'
  ) {
    return '10003' . $document_type . $document . $municipal_inscription . $date_begin . $date_end;
  }

  public function generateFooter(
    $line_number                  = '99999999',
    $total_value                  = '000000000000000',
    $deduction_value              = '000000000000000',
    $conditional_discount_value   = '000000000000000',
    $unconditional_discount_value = '000000000000000',
    $cofins_value                 = '000000000000000',
    $csll_value                   = '000000000000000',
    $inss_value                   = '000000000000000',
    $irpj_value                   = '000000000000000',
    $pis_pasep_value              = '000000000000000',
    $other_retentions_value       = '000000000000000',
    $iss_value                    = '000000000000000',
    $credit_value                 = '000000000000000'
  ) {
    return '90'
    . str_pad($line_number, 8, '0', STR_PAD_LEFT)
    . str_pad($total_value, 15, '0', STR_PAD_LEFT)
    . str_pad($deduction_value, 15, '0', STR_PAD_LEFT)
    . str_pad($conditional_discount_value, 15, '0', STR_PAD_LEFT)
    . str_pad($unconditional_discount_value, 15, '0', STR_PAD_LEFT)
    . str_pad($cofins_value, 15, '0', STR_PAD_LEFT)
    . str_pad($csll_value, 15, '0', STR_PAD_LEFT)
    . str_pad($inss_value, 15, '0', STR_PAD_LEFT)
    . str_pad($irpj_value, 15, '0', STR_PAD_LEFT)
    . str_pad($pis_pasep_value, 15, '0', STR_PAD_LEFT)
    . str_pad($other_retentions_value, 15, '0', STR_PAD_LEFT)
    . str_pad($iss_value, 15, '0', STR_PAD_LEFT)
    . str_pad($credit_value, 15, '0', STR_PAD_LEFT);
  }

  public function generateRps(
    $nf_number                      = '000000000000000',
    $nf_status                      = '1',
    $verification_code              = 'oij8joinm',
    $nf_datetime_emission           = '20170101000000',
    $rps_type                       = '2',
    $rps_serie                      = 'kkiu7',
    $rps_number                     = '000000000000000',
    $rps_date_emission              = '20170101',
    $provider_document_type         = '1',
    $provider_document              = '00000000000000',
    $provider_municipal_inscription = '000000000000000',
    $provider_estadual_inscription  = '000000000000000',
    $provider_social_name           = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsqicnhaicyqycqhsciqsnbciuscuacjhabkcjnkquniwniajsnckajnciiqwnijqn',
    $provider_fantasy_name          = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiunckajnciiqwnijqn',
    $provider_address_type          = 'asd',
    $provider_address               = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsqicnhaicyqycqhsciqsnbciuscuacjhabkcjnkquniwniajsnckajnciiqwnijqnalsmjokasm',
    $provider_address_number        = 'oimmnm121a',
    $provider_address_complement    = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsadadasdad',
    $provider_address_district      = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsadadasdadadadadadddas',
    $provider_address_city          = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncih',
    $provider_address_state         = 'SP',
    $provider_address_zipcode       = '00000000',
    $provider_phone                 = 'lkj123jjdi9',
    $provider_email                 = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihadadalsdackmdkamlkamclkasmlasa',
    $taker_document_type            = '2',
    $taker_document                 = '00000000000000',
    $taker_municipal_inscription    = '000000000000000',
    $taker_estadual_inscription     = '000000000000000',
    $taker_name                     = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsqicnhaicyqycqhsciqsnbciuscuacjhabkcjnkquniwniajsnckajnciiqwnijqn',
    $taker_address_type             = 'asd',
    $taker_address                  = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsqicnhaicyqycqhsciqsnbciuscuacjhabkcjnkquniwniajsnckajnciiqwnijqnalsmjokasm',
    $taker_address_number           = 'oimmnm121a',
    $taker_address_complement       = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsadadasdad',
    $taker_address_district         = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihsadadasdadadadadadddas',
    $taker_address_city             = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncih',
    $taker_address_state            = 'MG',
    $taker_address_zipcode          = '00000000',
    $taker_phone                    = 'lkj123jjdi9',
    $taker_email                    = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncihadadalsdackmdkamlkamclkasmlasa',
    $tributation_type               = '01',
    $service_city                   = 'jsanckajslncaojnclonpoqnoiqnanskanckjanscqiuj1ncih',
    $service_state                  = 'RJ',
    $special_tax                    = '01',
    $simple_option                  = '1',
    $cultural_incentive             = '0',
    $federal_service_code           = 'asd1',
    $benefit_code                   = '000',
    $municipal_service_code         = 'asu7sy',
    $aliquot                        = '00000',
    $service_value                  = '000000000000000',
    $deduction_value                = '000000000000000',
    $conditional_discount_value     = '000000000000000',
    $unconditional_discount_value   = '000000000000000',
    $cofins_value                   = '000000000000000',
    $csll_value                     = '000000000000000',
    $inss_value                     = '000000000000000',
    $irpj_value                     = '000000000000000',
    $pis_pasep_value                = '000000000000000',
    $other_retentions_value         = '000000000000000',
    $iss_value                      = '000000000000000',
    $credit_value                   = '000000000000000',
    $iss_status                     = '1',
    $cancel_date                    = '20170101',
    $competence_date                = '20170101',
    $guide_number                   = '000000000000000',
    $guide_date                     = '20170101',
    $protocol_lot                   = '000000000000000',
    $work_code                      = 'lamlckalmcakmca',
    $responsible_anotation          = 'lamlckalmcakmca',
    $nf_number_replaced             = '000000000000000',
    $nf_number_replace              = '000000000000000',
    $desciption                     = 'asdasdadadaoaijs9uqh9ijuas'
  ) {
    return '20'
      . str_pad($nf_number, 15, '0', STR_PAD_LEFT)
      . $nf_status
      . $verification_code
      . str_pad($nf_datetime_emission, 14, '0', STR_PAD_LEFT)
      . $rps_type
      . $rps_serie
      . str_pad($rps_number, 15, '0', STR_PAD_LEFT)
      . str_pad($rps_date_emission, 8, '0', STR_PAD_LEFT)
      . $provider_document_type
      . str_pad($provider_document, 14, '0', STR_PAD_LEFT)
      . str_pad($provider_municipal_inscription, 15, '0', STR_PAD_LEFT)
      . str_pad($provider_estadual_inscription, 15, '0', STR_PAD_LEFT)
      . $provider_social_name
      . $provider_fantasy_name
      . $provider_address_type
      . $provider_address
      . $provider_address_number
      . $provider_address_complement
      . $provider_address_district
      . $provider_address_city
      . $provider_address_state
      . str_pad($provider_address_zipcode, 8, '0', STR_PAD_LEFT)
      . $provider_phone
      . $provider_email
      . $taker_document_type
      . str_pad($taker_document, 14, '0', STR_PAD_LEFT)
      . str_pad($taker_municipal_inscription, 15, '0', STR_PAD_LEFT)
      . str_pad($taker_estadual_inscription, 15, '0', STR_PAD_LEFT)
      . $taker_name
      . $taker_address_type
      . $taker_address
      . $taker_address_number
      . $taker_address_complement
      . $taker_address_district
      . $taker_address_city
      . $taker_address_state
      . str_pad($taker_address_zipcode, 8, '0', STR_PAD_LEFT)
      . $taker_phone
      . $taker_email
      . $tributation_type
      . $service_city
      . $service_state
      . $special_tax
      . $simple_option
      . $cultural_incentive
      . $federal_service_code
      . '           '
      . $benefit_code
      . $municipal_service_code
      . $aliquot
      . str_pad($service_value, 15, '0', STR_PAD_LEFT)
      . str_pad($deduction_value, 15, '0', STR_PAD_LEFT)
      . str_pad($conditional_discount_value, 15, '0', STR_PAD_LEFT)
      . str_pad($unconditional_discount_value, 15, '0', STR_PAD_LEFT)
      . str_pad($cofins_value, 15, '0', STR_PAD_LEFT)
      . str_pad($csll_value, 15, '0', STR_PAD_LEFT)
      . str_pad($inss_value, 15, '0', STR_PAD_LEFT)
      . str_pad($irpj_value, 15, '0', STR_PAD_LEFT)
      . str_pad($pis_pasep_value, 15, '0', STR_PAD_LEFT)
      . str_pad($other_retentions_value, 15, '0', STR_PAD_LEFT)
      . str_pad($iss_value, 15, '0', STR_PAD_LEFT)
      . str_pad($credit_value, 15, '0', STR_PAD_LEFT)
      . $iss_status
      . str_pad($cancel_date, 8, '0', STR_PAD_LEFT)
      . str_pad($competence_date, 8, '0', STR_PAD_LEFT)
      . str_pad($guide_number, 15, '0', STR_PAD_LEFT)
      . str_pad($guide_date, 8, '0', STR_PAD_LEFT)
      . str_pad($protocol_lot, 15, '0', STR_PAD_LEFT)
      . $work_code
      . $responsible_anotation
      . str_pad($nf_number_replaced, 15, '0', STR_PAD_LEFT)
      . str_pad($nf_number_replace, 15, '0', STR_PAD_LEFT)
      . $desciption;
  }

  public function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
}
