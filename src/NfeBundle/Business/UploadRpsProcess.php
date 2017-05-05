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
use \DateTime as DateTime;

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
        $message = 'Iniciando processamento planilha';
        $Logger->info(
            self::$name, array('importacao' => $Importacao->getIdImportacao(), 'file' => $Importacao->getNomeArquivo(), 'info' => $message)
        );
        $Importacao->setLog($Importacao->getLog() . "\n" . $message);
        
        $file = __DIR__ . '/../Resources/public/upload/csv/' . $Importacao->getNomeArquivo();
        
        if (!is_file($file)) {
            $message = 'O arquivo não existe';
            $Logger->info(self::$name, array('importacao' => $Importacao->getIdImportacao(), 'info' => $message));
            $Importacao->setLog($Importacao->getLog() . "\n" . $message);
            $EntityManager->flush();
            return false;
        }
        
        if (($handle = fopen($file, "r")) !== false) {
            $row = 0;
            while (($data = fgetcsv($handle, 0, ';', '"')) !== false) {
                $row++;
                if ($row == 1) {
                    continue;
                }
                
                $Importacao->setLog($Importacao->getLog() . "\nIniciando a importação da linha " . $row);
                
                $num = count($data);
                if ($num != $config['field_validate']['num_field']) {
                    $message = 'A linha ' . $row . ' possui apenas ' . $num . ' colunas, quando o corretor era ter '
                        . $config['field_validate']['num_field'];
                    $Logger->info(self::$name, array('importacao' => $Importacao->getIdImportacao(), 'info' => $message));
                    $Importacao->setLog($Importacao->getLog() . "\n" . $message);
                    continue;
                }
                
                $message = 'A linha ' . $row . ' possui o numero correto de colunas';
                $Logger->info(self::$name, array('importacao' => $Importacao->getIdImportacao(), 'info' => $message));
                
                $Rps = new Rps();
                for ($col=0; $col<$num; $col++) {
                    $set    = true;
                    $value  = (strlen($data[$col]) ? $data[$col] : $config['field_validate']['fields'][($col+1)]['default']);
                    $method = $config['field_validate']['fields'][($col+1)]['method'];
                    if ($config['field_validate']['fields'][($col + 1)]['required']) {
                        if (!preg_match($config['field_validate']['fields'][($col + 1)]['regex'], $value)) {
                            $message = 'A linha ' . $row . ' coluna ' . ($col+1) . ' (' . $config['field_validate']['fields'][($col+1)]['name'] . ') '
                                . ' com valor ' . $value . ' nao possui um valor aceitavel';
                            $Logger->info(
                                self::$name,
                                array('importacao' => $Importacao->getIdImportacao(), 'info' => $message)
                            );
                            $Importacao->setLog($Importacao->getLog() . "\n" . $message);
                            $set = false;
                        }
                    }
                    if (strlen($value) > $config['field_validate']['fields'][($col+1)]['limit']) {
                        $message = 'A linha ' . $row . ' coluna ' . ($col+1) . ' (' . $config['field_validate']['fields'][($col+1)]['name'] . ') '
                            . ' com valor ' . $value . ' possui ' . strlen($value)
                            . ' caracteres, quando o limite era ' . $config['field_validate']['fields'][($col+1)]['limit'];
                        $Logger->info(
                            self::$name,
                            array('importacao' => $Importacao->getIdImportacao(), 'info' => $message)
                        );
                        $Importacao->setLog($Importacao->getLog() . "\n" . $message);
                        $value = substr($value, 0, $config['field_validate']['fields'][($col+1)]['limit']);
                    }
                    if (isset($config['field_validate']['fields'][($col+1)]['convert'])) {
                        $convert = preg_replace('/\$value/', $value, $config['field_validate']['fields'][($col+1)]['convert']);
                        eval('$value = ' . $convert . ';');
                    }
		    if ($set) {
			if (is_string($value)) {
			    if (mb_check_encoding($value, 'UTF-8') === false) {
			        $value = utf8_encode($value);
			    }
			}
                        try {
                            $Rps->$method($value);
                        } catch (\Exception $e) {
                            $Logger->info(self::$name, array('importacao' => $Importacao->getIdImportacao(), 'info' => $e->getMessage()));
                            $Importacao->setLog($Importacao->getLog() . "\n" . $e->getMessage());
                        }
                        
                    }
                }
                
                try {
                    $Rps->setDataCriacao(new DateTime())
                        ->setSerieRps($config['field_default']['serie_rps'])
                        ->setStatusRps($config['field_default']['status_rps']);
                    
                    $EntityManager->persist($Rps);
                    $EntityManager->flush();
                } catch (\Exception $e) {
                    $Logger->info(self::$name, array('importacao' => $Importacao->getIdImportacao(), 'info' => $e->getMessage()));
                    $Importacao->setLog($Importacao->getLog() . "\n" . 'Não foi possível salvar a linha ' . $row);
                    
                    if (!$EntityManager->isOpen()) {
                        $EntityManager = $EntityManager->create(
                            $EntityManager->getConnection(),
                            $EntityManager->getConfiguration()
                        );
                    }
                }
            }
            fclose($handle);
        }
        
        $EntityManager = $EntityManager->create(
            $EntityManager->getConnection(),
            $EntityManager->getConfiguration()
        );
        
        $log = $Importacao->getLog();
        $Importacao = $EntityManager->getRepository('NfeBundle:Importacao')
            ->find($Importacao->getIdImportacao());
        $Importacao->setLog($log);
        
        
        try {
            $EntityManager->flush();
        } catch (\Exception $e) {
            $Logger->info(
                self::$name,
                array('importacao' => $Importacao->getIdImportacao(), 'info' => 'Erro na atualização do log da importação. ' . $e->getMessage())
            );
        }
        
        
        return true;
    }
}
