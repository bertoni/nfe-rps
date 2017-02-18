<?php
/**
 * File that brings the LoteRps Remove Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     LoteRpsRemoveTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\LoteRps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\LoteRps;

/**
 * LoteRps Remove Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class LoteRpsRemoveTest extends CommomTest
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
    public function testRemoveLoteRps()
    {
        if (self::$LoteRps instanceof LoteRps) {
            $id = self::$LoteRps->getIdLoteRps();
    
            self::$em->remove(self::$LoteRps);
            self::$em->flush();
    
            $LoteRps = self::$em->getRepository('NfeBundle:LoteRps')
                ->find($id);
    
            $this->assertFalse($LoteRps instanceof LoteRps);
            self::$LoteRps = null;
        }
    }
}