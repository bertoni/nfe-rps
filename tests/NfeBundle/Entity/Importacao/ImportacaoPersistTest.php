<?php
/**
 * File that brings the Importacao Persist Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     ImportacaoPersistTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Importacao;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Importacao;

/**
 * Importacao Persist Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class ImportacaoPersistTest extends CommomTest
{
    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function setUpBeforeClass()
    {
        self::bootKernel();
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
    public function testPersistImportacao()
    {
        if (!self::$Importacao instanceof Importacao) {
            self::$Importacao = new Importacao();
            self::$Importacao->setNomeArquivo('um-nome-valid.csv')
                ->setDataImportacao(new \DateTime())
                ->setLog(null);
    
            self::$em->persist(self::$Importacao);
            self::$em->flush();
        }
        $this->assertTrue(is_numeric(self::$Importacao->getIdImportacao()));
    }
}