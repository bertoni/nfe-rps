<?php
/**
 * File that brings the NF External Url class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfExternalUrl
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

use NfeBundle\Entity\NF\NfReturnRps;

/**
 * NF External Url class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfExternalUrl
{
  public static function getNfUrl(NfReturnRps $NfReturnRps, $uf, $cidade)
  {
    $method = 'getNfUrl' . ucwords(strtolower($uf)) . preg_replace('/\s/', '', ucwords(strtolower($cidade)));
    if (!method_exists('NfeBundle\Entity\NF\NfExternalUrl', $method)) {
        throw new \Exception('O estado/cidade informado não é suportado');
    }
    return self::$method($NfReturnRps);
  }

  protected static function getNfUrlRjRioDeJaneiro(NfReturnRps $NfReturnRps)
  {
    return 'https://notacarioca.rio.gov.br/nfse.aspx?'
      . 'ccm=' . $NfReturnRps->getInscricaoMunicipalPrestador()
      . '&nf=' . $NfReturnRps->getNumeroNf()
      . '&cod=' . $NfReturnRps->getCodigoVerificacao();
  }
}
