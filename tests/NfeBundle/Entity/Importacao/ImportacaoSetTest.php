<?php
/**
 * File that brings the Importacao Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     ImportacaoSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Importacao;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Importacao;

/**
 * Importacao Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class ImportacaoSetTest extends CommomTest
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
        self::$Importacao = new Importacao();
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
    public function testSetValidDataImportacao()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Importacao', self::$Importacao->setDataImportacao(new \DateTime()));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullNomeArquivo()
    {
        self::$Importacao->setNomeArquivo(null);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyNomeArquivo()
    {
        self::$Importacao->setNomeArquivo('');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongNomeArquivo()
    {
        self::$Importacao->setNomeArquivo('ajsnocjan osjcn aousnc oajnc iab jnojwnc ajsbc an sclkqnicba jsncoa bcihq sihcb aihc uah co oqj iajaj');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidNomeArquivo()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Importacao', self::$Importacao->setNomeArquivo('um-nome-valido.csv'));
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidLog()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Importacao', self::$Importacao->setLog(null));
        $this->assertInstanceOf('NfeBundle\Entity\Importacao', self::$Importacao->setLog(''));
        $this->assertInstanceOf('NfeBundle\Entity\Importacao', self::$Importacao->setLog('um log de importação'));
    }





    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function tearDownAfterClass()
    {
        self::$Importacao = null;
    }
}