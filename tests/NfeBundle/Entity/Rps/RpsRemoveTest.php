<?php
/**
 * File that brings the Rps Remove Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     RpsRemoveTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Rps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Rps;

/**
 * Rps Remove Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class RpsRemoveTest extends CommomTest
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
    public function testRemoveRps()
    {
        if (self::$Rps instanceof Rps) {
            $id = self::$Rps->getIdRps();
    
            self::$em->remove(self::$Rps);
            self::$em->flush();
    
            $Rps = self::$em->getRepository('NfeBundle:Rps')
                ->find($id);
    
            $this->assertFalse($Rps instanceof Rps);
            self::$Rps = null;
        }
    }
}