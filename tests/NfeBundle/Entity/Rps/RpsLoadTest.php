<?php
/**
 * File that brings the Rps Load Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     RpsLoadTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Rps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Rps;

/**
 * Rps Load Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class RpsLoadTest extends CommomTest
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
    public function testLoadRps()
    {
        $Rps = self::$em->getRepository('NfeBundle:Rps')
            ->find(self::$Rps->getIdRps());
        $this->assertInstanceOf('NfeBundle\Entity\Rps', $Rps);
    
        $this->assertEquals($Rps->getIdRps(),                           self::$Rps->getIdRps());
        $this->assertEquals($Rps->getIssRetido(),                       self::$Rps->getIssRetido());
        $this->assertEquals($Rps->getTipoRps(),                         self::$Rps->getTipoRps());
        $this->assertEquals($Rps->getOpcaoPeloSimples(),                self::$Rps->getOpcaoPeloSimples());
        $this->assertEquals($Rps->getStatusRps(),                       self::$Rps->getStatusRps());
        $this->assertEquals($Rps->getTipoIdentificaoTomador(),          self::$Rps->getTipoIdentificaoTomador());
        $this->assertEquals($Rps->getIncentivoCultural(),               self::$Rps->getIncentivoCultural());
        $this->assertEquals($Rps->getTipoTributacaoServico(),           self::$Rps->getTipoTributacaoServico());
        $this->assertEquals($Rps->getRegimeEspecialTributacao(),        self::$Rps->getRegimeEspecialTributacao());
        $this->assertEquals($Rps->getUfPrestacaoServico(),              self::$Rps->getUfPrestacaoServico());
        $this->assertEquals($Rps->getCodigoServicoFederal(),            self::$Rps->getCodigoServicoFederal());
        $this->assertEquals($Rps->getAliquota(),                        self::$Rps->getAliquota());
        $this->assertEquals($Rps->getCodigoServicoMunicipal(),          self::$Rps->getCodigoServicoMunicipal());
        $this->assertEquals($Rps->getIdentificacaoTomador(),            self::$Rps->getIdentificacaoTomador());
        $this->assertEquals($Rps->getValorServicos(),                   self::$Rps->getValorServicos());
        $this->assertEquals($Rps->getDataEmissao(),                     self::$Rps->getDataEmissao());
        $this->assertEquals($Rps->getDataCompetencia(),                 self::$Rps->getDataCompetencia());
        $this->assertEquals($Rps->getCidadePrestacaoServico(),          self::$Rps->getCidadePrestacaoServico());
        $this->assertEquals($Rps->getDiscriminacaoServico(),            self::$Rps->getDiscriminacaoServico());
        $this->assertEquals($Rps->getUfTomador(),                       self::$Rps->getUfTomador());
        $this->assertEquals($Rps->getCodigoBeneficio(),                 self::$Rps->getCodigoBeneficio());
        $this->assertEquals($Rps->getTipoEnderecoTomador(),             self::$Rps->getTipoEnderecoTomador());
        $this->assertEquals($Rps->getCodigoPais(),                      self::$Rps->getCodigoPais());
        $this->assertEquals($Rps->getSerieRps(),                        self::$Rps->getSerieRps());
        $this->assertEquals($Rps->getSerieRpsSubstituido(),             self::$Rps->getSerieRpsSubstituido());
        $this->assertEquals($Rps->getIdLoteRps(),                       self::$Rps->getIdLoteRps());
        $this->assertEquals($Rps->getCepTomador(),                      self::$Rps->getCepTomador());
        $this->assertEquals($Rps->getNumeroEnderecoTomador(),           self::$Rps->getNumeroEnderecoTomador());
        $this->assertEquals($Rps->getTelefoneTomador(),                 self::$Rps->getTelefoneTomador());
        $this->assertEquals($Rps->getNumeroRpsSusbtituido(),            self::$Rps->getNumeroRpsSusbtituido());
        $this->assertEquals($Rps->getValorIss(),                        self::$Rps->getValorIss());
        $this->assertEquals($Rps->getValorPisPasep(),                   self::$Rps->getValorPisPasep());
        $this->assertEquals($Rps->getValorOutrasRetencoesFederais(),    self::$Rps->getValorOutrasRetencoesFederais());
        $this->assertEquals($Rps->getValorInss(),                       self::$Rps->getValorInss());
        $this->assertEquals($Rps->getValorIrpj(),                       self::$Rps->getValorIrpj());
        $this->assertEquals($Rps->getValorCofins(),                     self::$Rps->getValorCofins());
        $this->assertEquals($Rps->getValorCsll(),                       self::$Rps->getValorCsll());
        $this->assertEquals($Rps->getValorDescontoIncondicionado(),     self::$Rps->getValorDescontoIncondicionado());
        $this->assertEquals($Rps->getValorDescontoCondicionado(),       self::$Rps->getValorDescontoCondicionado());
        $this->assertEquals($Rps->getValorDeducoes(),                   self::$Rps->getValorDeducoes());
        $this->assertEquals($Rps->getInscricaoEstadualTomador(),        self::$Rps->getInscricaoEstadualTomador());
        $this->assertEquals($Rps->getAnotacaoResponsabilidadeTecnica(), self::$Rps->getAnotacaoResponsabilidadeTecnica());
        $this->assertEquals($Rps->getCodigoObra(),                      self::$Rps->getCodigoObra());
        $this->assertEquals($Rps->getInscricaoMunicipalTomador(),       self::$Rps->getInscricaoMunicipalTomador());
        $this->assertEquals($Rps->getIdentificacaoVenda(),              self::$Rps->getIdentificacaoVenda());
        $this->assertEquals($Rps->getCidadeTomador(),                   self::$Rps->getCidadeTomador());
        $this->assertEquals($Rps->getComplementoEnderecoTomador(),      self::$Rps->getComplementoEnderecoTomador());
        $this->assertEquals($Rps->getBairroTomador(),                   self::$Rps->getBairroTomador());
        $this->assertEquals($Rps->getEmailTomador(),                    self::$Rps->getEmailTomador());
        $this->assertEquals($Rps->getNomeTomador(),                     self::$Rps->getNomeTomador());
        $this->assertEquals($Rps->getEnderecoTomador(),                 self::$Rps->getEnderecoTomador());
    }
}