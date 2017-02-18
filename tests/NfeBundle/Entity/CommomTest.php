<?php
/**
 * File that brings the Commom Test class
 *
 * PHP Version 5.5.9
 *
 * @category Test
 * @package  Nfe
 * @name     CommomTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Commom Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class CommomTest extends WebTestCase
{
    /**
     * @var    EntityManager
     * @access protected
     */
    protected static $em;
    /**
     * @var    LoteRps
     * @access protected
     */
    protected static $LoteRps;
    /**
     * @var    Rps
     * @access protected
     */
    protected static $Rps;
}