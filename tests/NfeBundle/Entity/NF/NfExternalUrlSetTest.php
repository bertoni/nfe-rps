<?php
/**
 * File that brings the Nf External Url Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     NfExternalUrlSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\NF;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\NF\NfExternalUrl;
use NfeBundle\Entity\NF\NfReturnRps;

/**
 * Nf External Url Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfExternalUrlSetTest extends CommomTest
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
   * @expectedException Exception
   * @expectedExceptionMessage O estado/cidade informado não é suportado
   *
   * @access public
   * @return void
   */
  public function testInvalidUf()
  {
    NfExternalUrl::getNfUrl(self::$NfReturnRps, 'XX', 'Bla bla bla');
  }

  /**
   * @access public
   * @return void
   */
  public function testValidUfRjRioDeJaneiro()
  {
    self::$NfReturnRps->setInscricaoMunicipalPrestador(98866464)
      ->setNumeroNf(123456)
      ->setCodigoVerificacao('ajuyhgf5');
    $this->assertEquals(
      'https://notacarioca.rio.gov.br/nfse.aspx?'
        . 'ccm=' . self::$NfReturnRps->getInscricaoMunicipalPrestador()
        . '&nf=' . self::$NfReturnRps->getNumeroNf() . '&cod=' . self::$NfReturnRps->getCodigoVerificacao(),
      NfExternalUrl::getNfUrl(self::$NfReturnRps, 'RJ', 'Rio de Janeiro')
    );
  }
}
