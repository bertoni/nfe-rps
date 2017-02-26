<?php
/**
 * File that brings the Importacao Remove Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     ImportacaoRemoveTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Importacao;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Importacao;

/**
 * Importacao Remove Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class ImportacaoRemoveTest extends CommomTest
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
    public function testRemoveImportacao()
    {
        if (self::$Importacao instanceof Importacao) {
            $id = self::$Importacao->getIdImportacao();
    
            self::$em->remove(self::$Importacao);
            self::$em->flush();
    
            $Importacao = self::$em->getRepository('NfeBundle:Importacao')
                ->find($id);
    
            $this->assertFalse($Importacao instanceof Importacao);
            self::$Importacao = null;
        }
    }
}