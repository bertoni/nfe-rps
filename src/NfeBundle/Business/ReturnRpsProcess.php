<?php
/**
 * File that brings the Return RPS Process class
 *
 * PHP Version 5.3
 *
 * @category Business
 * @package  Nfe
 * @name     ReturnRpsProcess
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Business;

use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Doctrine\ORM\EntityManager;
use NfeBundle\Entity\LoteRps;
use NfeBundle\Entity\NF\NfReturnRpsLote;
use NfeBundle\Entity\NF\NfReturnLayoutCommonTxt;
use NfeBundle\Entity\NF\NfExternalUrl;

/**
 * Return RPS Process class
 *
 * @category Business
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo@emoda.com.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class ReturnRpsProcess
{
	/**
	 * @var    string
	 * @access protected
	 */
	protected static $name = 'RETURNRPS';

  /**
   * Process sheet rps
   *
   * @param LoteRps          	   $LoteRps
   * @param EntityManager        $EntityManager
   * @param DebugLoggerInterface $Logger
   *
   * @access public
   * @return boolean
   */
public static function staticProcessReturnRps(LoteRps $LoteRps, EntityManager $EntityManager, DebugLoggerInterface $Logger)
  {
    $Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => 'Iniciando processamento retorno do RPS'));

    if ($LoteRps->getEnviado()) {
        $Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => 'O Lote ja foi enviado'));
        return false;
    }

		$Rps = $EntityManager
			->getRepository('NfeBundle:Rps')
			->findBy(array('id_lote_rps' => $LoteRps->getIdLoteRps()), array('data_criacao' => 'DESC'));
		if (!$Rps || !count($Rps)) {
			$Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => 'O Lote nao possui RPS'));
			return false;
		}

    $file = __DIR__ . '/../Resources/public/upload/retorno/' . $LoteRps->getIdLoteRps() . '.txt';

    $NfReturnRpsLote = new NfReturnRpsLote(new NfReturnLayoutCommonTxt($file));

    try {
      $NfReturnRpsLote->process();
    } catch (\Exception $e) {
    	$Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => $e->getMessage()));
      return false;
    }

		try {
      $LoteRps->setEnviado(true)
				->setDataPeriodoInicial($NfReturnRpsLote->getHeader()->getInicioPeriodo())
				->setDataPeriodoFinal($NfReturnRpsLote->getHeader()->getTerminoPeriodo())
				->setValorTotal($NfReturnRpsLote->getFooter()->getValorTotal())
				->setValorDeducao($NfReturnRpsLote->getFooter()->getValorDeducoes())
				->setValorIss($NfReturnRpsLote->getFooter()->getValorInss())
				->setValorCredito($NfReturnRpsLote->getFooter()->getValorCredito());
    } catch (\Exception $e) {
    	$Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => $e->getMessage()));
      return false;
    }

		foreach ($Rps as $key=>$value) {
			if (!$NfReturnRpsLote->getRps()->offsetExists($value->getIdRps())) {
				$Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => 'Nao existe o RPS de numero ' . $value->getIdRps()));
	      return false;
			}
			$RpsReturn = $NfReturnRpsLote->getRps()->offsetGet($value->getIdRps());
			try {
				$value->setNumeroNf($RpsReturn->getNumeroNf())
					->setCodigoVerificacao($RpsReturn->getCodigoVerificacao())
					->setLinkNf(NfExternalUrl::getNfUrl($RpsReturn, 'RJ', 'Rio de Janeiro'));
			} catch (\Exception $e) {
				$Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => $e->getMessage()));
				return false;
			}
		}

		try {
      $EntityManager->flush();
    } catch (\Exception $e) {
    	$Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => $e->getMessage()));
      return false;
    }

    return true;
  }
}
