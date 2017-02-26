<?php
/**
 * File that brings the Upload RPS Process class
 *
 * PHP Version 5.3
 *
 * @category Business
 * @package  Nfe
 * @name     UploadRpsProcess
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Business;

use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Doctrine\ORM\EntityManager;
use NfeBundle\Entity\Importacao;
use NfeBundle\Entity\Rps;

/**
 * Upload RPS Process class
 *
 * @category Business
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo@emoda.com.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class UploadRpsProcess
{
    /**
     * @var    string
     * @access protected
     */
    protected static $name = 'UPLOAD';

    /**
     * Process sheet rps
     *
     * @param Importacao           $Importacao
     * @param array                $config
     * @param EntityManager        $EntityManager
     * @param DebugLoggerInterface $Logger
     *
     * @access public
     * @return boolean
     */
    public function processSheetRps(Importacao $Importacao, array $config, EntityManager $EntityManager, DebugLoggerInterface $Logger)
    {
        return self::staticProcessSheetRps($Importacao, $config, $EntityManager, $Logger);
    }

    /**
     * Process sheet rps
     *
     * @param Importacao           $Importacao
     * @param array                $config
     * @param EntityManager        $EntityManager
     * @param DebugLoggerInterface $Logger
     *
     * @access public
     * @return boolean
     */
    public static function staticProcessSheetRps(Importacao $Importacao, array $config, EntityManager $EntityManager, DebugLoggerInterface $Logger)
    {
        $Logger->info(
            self::$name,
            array(
                'importacao' => $Importacao->getIdImportacao(), 'file' => $Importacao->getNomeArquivo(), 'info' => 'Iniciando processamento planilha'
            )
        );
        
        return false;
    }
}