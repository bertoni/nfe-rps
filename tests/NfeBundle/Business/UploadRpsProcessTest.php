<?php
/**
 * File that brings the Upload Rps Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     UploadRpsProcessTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Business;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Yaml\Yaml;
use NfeBundle\Entity\Importacao;
use NfeBundle\Business\UploadRpsProcess;

/**
 * Upload Rps Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class UploadRpsProcessTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private static $_em;
    /**
     * @var \Symfony\Component\HttpKernel\Log\LoggerInterface
     */
    private static $_logger;
    /**
     * @var array
     */
    private static $_config;
    /**
     * @var Importacao
     */
    private static $_Importacao;

    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function setUpBeforeClass()
    {
        self::bootKernel();
    
        self::$_em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        self::$_logger = static::$kernel->getContainer()->get('logger');
        self::$_config = Yaml::parse(file_get_contents(__DIR__ . '/../../../src/NfeBundle/Resources/config/field_csv.yml'));
    
        self::$_Importacao = new Importacao();
        self::$_Importacao->setNomeArquivo('um-nome-valid.csv')
            ->setDataImportacao(new \DateTime())
            ->setLog(null);
        
        self::$_em->persist(self::$_Importacao);
        self::$_em->flush();
    }




    /**
     * @access public
     * @return void
     */
    public function testSignature()
    {
        $UploadRpsProcess  = new UploadRpsProcess();
        $was_processed     = $UploadRpsProcess->processSheetRps(self::$_Importacao, self::$_config, self::$_em, self::$_logger);
        $this->assertFalse($was_processed);
    }




    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function tearDownAfterClass()
    {
        $Rps = self::$_em->getRepository('NfeBundle:Importacao')
            ->find(self::$_Importacao->getIdImportacao());
        
        self::$_em->remove($Rps);
        
        self::$_em->flush();
        
        self::$_Importacao = null;
    }
}