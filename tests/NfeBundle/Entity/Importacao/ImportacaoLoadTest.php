<?php
/**
 * File that brings the Importacao Load Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     ImportacaoLoadTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Importacao;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Importacao;

/**
 * Importacao Load Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class ImportacaoLoadTest extends CommomTest
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
    public function testLoadImportacao()
    {
        $Importacao = self::$em->getRepository('NfeBundle:Importacao')
            ->find(self::$Importacao->getIdImportacao());
        $this->assertInstanceOf('NfeBundle\Entity\Importacao', $Importacao);
    
        $this->assertEquals($Importacao->getIdImportacao(),   self::$Importacao->getIdImportacao());
        $this->assertEquals($Importacao->getDataImportacao(), self::$Importacao->getDataImportacao());
        $this->assertEquals($Importacao->getNomeArquivo(),    self::$Importacao->getNomeArquivo());
        $this->assertEquals($Importacao->getLog(),            self::$Importacao->getLog());
    }
}