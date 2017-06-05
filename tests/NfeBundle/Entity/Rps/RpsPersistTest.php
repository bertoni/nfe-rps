<?php
/**
 * File that brings the Rps Persist Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     RpsPersistTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Rps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Rps;

/**
 * Rps Persist Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class RpsPersistTest extends CommomTest
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
    public function testPersistRps()
    {
        if (!self::$Rps instanceof Rps) {
            self::$Rps = new Rps();
            self::$Rps->setIssRetido(0)
                ->setTipoRps(0)
                ->setOpcaoPeloSimples(0)
                ->setStatusRps(1)
                ->setTipoIdentificaoTomador(1)
                ->setIncentivoCultural(0)
                ->setTipoTributacaoServico(1)
                ->setRegimeEspecialTributacao(0)
                ->setUfPrestacaoServico('SP')
                ->setCodigoServicoFederal(753)
                ->setAliquota(765)
                ->setCodigoServicoMunicipal(7543)
                ->setIdentificacaoTomador(37671922846)
                ->setValorServicos(1200000)
                ->setDataCriacao(new \DateTime())
                ->setDataEmissao(new \DateTime())
                ->setDataCompetencia(new \DateTime())
                ->setCidadePrestacaoServico('São Paulo')
                ->setDiscriminacaoServico('Serviços Prestados.')
                ->setUfTomador('SP')
                ->setCodigoBeneficio('123')
                ->setTipoEnderecoTomador('123')
                ->setCodigoPais(123)
                ->setSerieRps('AB-1')
                ->setSerieRpsSubstituido('AB-1')
                ->setIdLoteRps(1234)
                ->setCepTomador(3169050)
                ->setCodigoVerificacao('asdadas')
                ->setNumeroNf(09798876)
                ->setNumeroEnderecoTomador(101)
                ->setTelefoneTomador(1121345678)
                ->setNumeroRpsSusbtituido(12346)
                ->setValorIss(12346)
                ->setValorPisPasep(12346)
                ->setValorOutrasRetencoesFederais(12)
                ->setValorInss(12)
                ->setValorIrpj(12)
                ->setValorCofins(12)
                ->setValorCsll(12)
                ->setValorDescontoIncondicionado(12)
                ->setValorDescontoCondicionado(12)
                ->setValorDeducoes(12)
                ->setInscricaoEstadualTomador('1234567')
                ->setAnotacaoResponsabilidadeTecnica('1234567')
                ->setCodigoObra('1234567')
                ->setInscricaoMunicipalTomador('1234567')
                ->setIdentificacaoVenda('1234567')
                ->setCidadeTomador('São paulo')
                ->setComplementoEnderecoTomador('Próximo da Rua XYZ')
                ->setBairroTomador('Ibirapuera')
                ->setEmailTomador('umemailvalid@gmail.com')
                ->setNomeTomador('Tomador da Nota Fiscal')
                ->setEnderecoTomador('Rua Dom Pedro II')
                ->setLinkNf('https://notacarioca.rio.gov.br/nfse.aspx?ccm=123&nf=123&cod=123');

            self::$em->persist(self::$Rps);
            self::$em->flush();
        }
        $this->assertTrue(is_numeric(self::$Rps->getIdRps()));
    }
}
