<?php
/**
 * File that brings the Rps Set Test class
 *
 * PHP Version 5.3
 *
 * @category Test
 * @package  Nfe
 * @name     RpsSetTest
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace Tests\NfeBundle\Entity\Rps;

use Tests\NfeBundle\Entity\CommomTest;
use NfeBundle\Entity\Rps;

/**
 * Rps Set Test class
 *
 * @category Test
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class RpsSetTest extends CommomTest
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
        self::$Rps = new Rps();
        if (is_null(self::$em)) {
            self::$em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager();
        }
    }






    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyIssRetido()
    {
        self::$Rps->setIssRetido('');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullIssRetido()
    {
        self::$Rps->setIssRetido(null);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidIssRetido()
    {
        self::$Rps->setIssRetido('abc');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidIssRetido()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIssRetido(0));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIssRetido(1));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyTipoRps()
    {
        self::$Rps->setTipoRps('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullTipoRps()
    {
        self::$Rps->setTipoRps(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidTipoRps()
    {
        self::$Rps->setTipoRps('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidTipoRps()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoRps(0));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoRps(1));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyOpcaoPeloSimples()
    {
        self::$Rps->setOpcaoPeloSimples('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullOpcaoPeloSimples()
    {
        self::$Rps->setOpcaoPeloSimples(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidOpcaoPeloSimples()
    {
        self::$Rps->setOpcaoPeloSimples('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidOpcaoPeloSimples()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setOpcaoPeloSimples(0));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyStatusRps()
    {
        self::$Rps->setStatusRps('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullStatusRps()
    {
        self::$Rps->setStatusRps(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidStatusRps()
    {
        self::$Rps->setStatusRps('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidStatusRps()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setStatusRps(1));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setStatusRps(2));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyTipoIdentificaoTomador()
    {
        self::$Rps->setTipoIdentificaoTomador('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullTipoIdentificaoTomador()
    {
        self::$Rps->setTipoIdentificaoTomador(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidTipoIdentificaoTomador()
    {
        self::$Rps->setTipoIdentificaoTomador('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidTipoIdentificaoTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoIdentificaoTomador(1));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoIdentificaoTomador(2));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyIncentivoCultural()
    {
        self::$Rps->setIncentivoCultural('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullIncentivoCultural()
    {
        self::$Rps->setIncentivoCultural(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidIncentivoCultural()
    {
        self::$Rps->setIncentivoCultural('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidIncentivoCultural()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIncentivoCultural(0));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIncentivoCultural(1));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyTipoTributacaoServico()
    {
        self::$Rps->setTipoTributacaoServico('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullTipoTributacaoServico()
    {
        self::$Rps->setTipoTributacaoServico(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidTipoTributacaoServico()
    {
        self::$Rps->setTipoTributacaoServico('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidTipoTributacaoServico()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoTributacaoServico(1));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoTributacaoServico(2));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoTributacaoServico(3));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoTributacaoServico(4));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoTributacaoServico(5));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoTributacaoServico(6));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyRegimeEspecialTributacao()
    {
        self::$Rps->setRegimeEspecialTributacao('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullRegimeEspecialTributacao()
    {
        self::$Rps->setRegimeEspecialTributacao(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidRegimeEspecialTributacao()
    {
        self::$Rps->setRegimeEspecialTributacao('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidRegimeEspecialTributacao()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setRegimeEspecialTributacao(0));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setRegimeEspecialTributacao(1));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setRegimeEspecialTributacao(2));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setRegimeEspecialTributacao(3));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setRegimeEspecialTributacao(4));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setRegimeEspecialTributacao(5));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setRegimeEspecialTributacao(6));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyUfPrestacaoServico()
    {
        self::$Rps->setUfPrestacaoServico('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullUfPrestacaoServico()
    {
        self::$Rps->setUfPrestacaoServico(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidUfPrestacaoServico()
    {
        self::$Rps->setUfPrestacaoServico('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidUfPrestacaoServico()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setUfPrestacaoServico('SP'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyCodigoServicoFederal()
    {
        self::$Rps->setCodigoServicoFederal('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullCodigoServicoFederal()
    {
        self::$Rps->setCodigoServicoFederal(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidCodigoServicoFederal()
    {
        self::$Rps->setCodigoServicoFederal('12333');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCodigoServicoFederal()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoServicoFederal(754));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoServicoFederal('70.54'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyAliquota()
    {
        self::$Rps->setAliquota('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullAliquota()
    {
        self::$Rps->setAliquota(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidAliquota()
    {
        self::$Rps->setAliquota('abc');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeAliquota()
    {
        self::$Rps->setAliquota(-1);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongAliquota()
    {
        self::$Rps->setAliquota(100000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidAliquota()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setAliquota(754));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyCodigoServicoMunicipal()
    {
        self::$Rps->setCodigoServicoMunicipal('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullCodigoServicoMunicipal()
    {
        self::$Rps->setCodigoServicoMunicipal(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidCodigoServicoMunicipal()
    {
        self::$Rps->setCodigoServicoMunicipal('1233312');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCodigoServicoMunicipal()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoServicoMunicipal(7543));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoServicoMunicipal('700.540'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyIdentificacaoTomador()
    {
        self::$Rps->setIdentificacaoTomador('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullIdentificacaoTomador()
    {
        self::$Rps->setIdentificacaoTomador(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidIdentificacaoTomador()
    {
        self::$Rps->setIdentificacaoTomador('abc');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidIdentificacaoTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIdentificacaoTomador(37671922846));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorServicos()
    {
        self::$Rps->setValorServicos('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullValorServicos()
    {
        self::$Rps->setValorServicos(null);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorServicos()
    {
        self::$Rps->setValorServicos('abc');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorServicos()
    {
        self::$Rps->setValorServicos(-10);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorServicos()
    {
        self::$Rps->setValorServicos(1000000000000000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorServicos()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorServicos(1200000));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorServicos(0));
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidDataEmissao()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setDataEmissao(new \DateTime()));
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidDataCompetencia()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setDataCompetencia(new \DateTime()));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyCidadePrestacaoServico()
    {
        self::$Rps->setCidadePrestacaoServico('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullCidadePrestacaoServico()
    {
        self::$Rps->setCidadePrestacaoServico(null);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongCidadePrestacaoServico()
    {
        self::$Rps->setCidadePrestacaoServico('Cidade inválidao pois contém mais de cinquenta caracteres');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCidadePrestacaoServico()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCidadePrestacaoServico('São Paulo'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyDiscriminacaoServico()
    {
        self::$Rps->setDiscriminacaoServico('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNullDiscriminacaoServico()
    {
        self::$Rps->setDiscriminacaoServico(null);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidDiscriminacaoServico()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setDiscriminacaoServico('Serviços Prestados.'));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyUfTomador()
    {
        self::$Rps->setUfTomador('');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongUfTomador()
    {
        self::$Rps->setUfTomador('ABC');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidUfTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setUfTomador('SP'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setUfTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyCodigoBeneficio()
    {
        self::$Rps->setCodigoBeneficio('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongCodigoBeneficio()
    {
        self::$Rps->setCodigoBeneficio('1234');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCodigoBeneficio()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoBeneficio('123'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoBeneficio(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyTipoEnderecoTomador()
    {
        self::$Rps->setTipoEnderecoTomador('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongTipoEnderecoTomador()
    {
        self::$Rps->setTipoEnderecoTomador('1234');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidTipoEnderecoTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoEnderecoTomador('123'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTipoEnderecoTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyCodigoPais()
    {
        self::$Rps->setCodigoPais('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeCodigoPais()
    {
        self::$Rps->setCodigoPais(-2);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongCodigoPais()
    {
        self::$Rps->setCodigoPais(100000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCodigoPais()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoPais(123));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoPais(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptySerieRps()
    {
        self::$Rps->setSerieRps('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongSerieRps()
    {
        self::$Rps->setSerieRps('ABC123');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidSerieRps()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setSerieRps('AB-1'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setSerieRps(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptySerieRpsSubstituido()
    {
        self::$Rps->setSerieRpsSubstituido('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongSerieRpsSubstituido()
    {
        self::$Rps->setSerieRpsSubstituido('ABC123');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidSerieRpsSubstituido()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setSerieRpsSubstituido('AB-1'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setSerieRpsSubstituido(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyIdLoteRps()
    {
        self::$Rps->setIdLoteRps('');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeIdLoteRps()
    {
        self::$Rps->setIdLoteRps(-10);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongIdLoteRps()
    {
        self::$Rps->setIdLoteRps(10000000000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidIdLoteRps()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIdLoteRps(1234));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIdLoteRps(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyCepTomador()
    {
        self::$Rps->setCepTomador('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongCepTomador()
    {
        self::$Rps->setCepTomador(100000000);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCepTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCepTomador(3169050));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCepTomador(null));
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongNumeroEnderecoTomador()
    {
        self::$Rps->setNumeroEnderecoTomador('10282312344');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidNumeroEnderecoTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setNumeroEnderecoTomador(101));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setNumeroEnderecoTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongTelefoneTomador()
    {
        self::$Rps->setTelefoneTomador('(11)12345678');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidTelefoneTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTelefoneTomador(1121345678));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setTelefoneTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyNumeroRpsSusbtituido()
    {
        self::$Rps->setNumeroRpsSusbtituido('');
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidNumeroRpsSusbtituido()
    {
        self::$Rps->setNumeroRpsSusbtituido('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongNumeroRpsSusbtituido()
    {
        self::$Rps->setNumeroRpsSusbtituido(1000000000000000);
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeNumeroRpsSusbtituido()
    {
        self::$Rps->setNumeroRpsSusbtituido(-10);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidNumeroRpsSusbtituido()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setNumeroRpsSusbtituido(12346));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setNumeroRpsSusbtituido(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorIss()
    {
        self::$Rps->setValorIss('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorIss()
    {
        self::$Rps->setValorIss('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorIss()
    {
        self::$Rps->setValorIss(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorIss()
    {
        self::$Rps->setValorIss(-10);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorIss()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorIss(12346));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorIss(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorPisPasep()
    {
        self::$Rps->setValorPisPasep('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorPisPasep()
    {
        self::$Rps->setValorPisPasep('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorPisPasep()
    {
        self::$Rps->setValorPisPasep(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorPisPasep()
    {
        self::$Rps->setValorPisPasep(-10);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorPisPasep()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorPisPasep(12346));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorPisPasep(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorOutrasRetencoesFederais()
    {
        self::$Rps->setValorOutrasRetencoesFederais('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorOutrasRetencoesFederais()
    {
        self::$Rps->setValorOutrasRetencoesFederais('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorOutrasRetencoesFederais()
    {
        self::$Rps->setValorOutrasRetencoesFederais(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorOutrasRetencoesFederais()
    {
        self::$Rps->setValorOutrasRetencoesFederais(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorOutrasRetencoesFederais()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorOutrasRetencoesFederais(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorOutrasRetencoesFederais(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorInss()
    {
        self::$Rps->setValorInss('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorInss()
    {
        self::$Rps->setValorInss('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorInss()
    {
        self::$Rps->setValorInss(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorInss()
    {
        self::$Rps->setValorInss(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorInss()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorInss(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorInss(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorIrpj()
    {
        self::$Rps->setValorIrpj('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorIrpj()
    {
        self::$Rps->setValorIrpj('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorIrpj()
    {
        self::$Rps->setValorIrpj(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorIrpj()
    {
        self::$Rps->setValorIrpj(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorIrpj()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorIrpj(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorIrpj(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorCofins()
    {
        self::$Rps->setValorCofins('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorCofins()
    {
        self::$Rps->setValorCofins('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorCofins()
    {
        self::$Rps->setValorCofins(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorCofins()
    {
        self::$Rps->setValorCofins(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorCofins()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorCofins(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorCofins(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorCsll()
    {
        self::$Rps->setValorCsll('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorCsll()
    {
        self::$Rps->setValorCsll('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorCsll()
    {
        self::$Rps->setValorCsll(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorCsll()
    {
        self::$Rps->setValorCsll(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorCsll()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorCsll(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorCsll(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorDescontoIncondicionado()
    {
        self::$Rps->setValorDescontoIncondicionado('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorDescontoIncondicionado()
    {
        self::$Rps->setValorDescontoIncondicionado('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorDescontoIncondicionado()
    {
        self::$Rps->setValorDescontoIncondicionado(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorDescontoIncondicionado()
    {
        self::$Rps->setValorDescontoIncondicionado(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorDescontoIncondicionado()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorDescontoIncondicionado(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorDescontoIncondicionado(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorDescontoCondicionado()
    {
        self::$Rps->setValorDescontoCondicionado('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorDescontoCondicionado()
    {
        self::$Rps->setValorDescontoCondicionado('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorDescontoCondicionado()
    {
        self::$Rps->setValorDescontoCondicionado(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorDescontoCondicionado()
    {
        self::$Rps->setValorDescontoCondicionado(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorDescontoCondicionado()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorDescontoCondicionado(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorDescontoCondicionado(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetEmptyValorDeducoes()
    {
        self::$Rps->setValorDeducoes('');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetInvalidValorDeducoes()
    {
        self::$Rps->setValorDeducoes('abc');
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongValorDeducoes()
    {
        self::$Rps->setValorDeducoes(1000000000000000);
    }
    
    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetNegativeValorDeducoes()
    {
        self::$Rps->setValorDeducoes(-1);
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidValorDeducoes()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorDeducoes(12));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setValorDeducoes(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongInscricaoEstadualTomador()
    {
        self::$Rps->setInscricaoEstadualTomador('1234567890123456');
    }

    /**
     * @access public
     * @return void
     */
    public function testSetValidInscricaoEstadualTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setInscricaoEstadualTomador('1234567'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setInscricaoEstadualTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongAnotacaoResponsabilidadeTecnica()
    {
        self::$Rps->setAnotacaoResponsabilidadeTecnica('1234567890123456');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidAnotacaoResponsabilidadeTecnica()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setAnotacaoResponsabilidadeTecnica('1234567'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setAnotacaoResponsabilidadeTecnica(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongCodigoObra()
    {
        self::$Rps->setCodigoObra('1234567890123456');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCodigoObra()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoObra('1234567'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCodigoObra(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongInscricaoMunicipalTomador()
    {
        self::$Rps->setInscricaoMunicipalTomador('1234567890123456');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidInscricaoMunicipalTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setInscricaoMunicipalTomador('1234567'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setInscricaoMunicipalTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongIdentificacaoVenda()
    {
        self::$Rps->setIdentificacaoVenda(
            'qonoijqosiqoksc oqn 0ij0ij0ijaokskajs0ci1ojcq0ksmcoaksclajkscn1cic kscjnacjnasc-q9jcicoksncajco1iw 0qij0isjoakcljans coijd0ij c0aockanos'
            . 'ckj 10ijiajsoc aosc 10ic0c01jijcoakcj 01jc0ijscajsclkauc 0 oauhcoaic 0ijiajs piajsc j01j0 ca0icj0 odcja c0019u01u 0qas1u 91jn'
        );
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidIdentificacaoVenda()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIdentificacaoVenda('1234567'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setIdentificacaoVenda(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongCidadeTomador()
    {
        self::$Rps->setCidadeTomador('Nome de cidade inválido pois contém mais de cinquenta caracteres');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidCidadeTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCidadeTomador('São paulo'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setCidadeTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongComplementoEnderecoTomador()
    {
        self::$Rps->setComplementoEnderecoTomador('Complemento de endereço inválido pois contém mais de sessenta caracteres');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidComplementoEnderecoTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setComplementoEnderecoTomador('Próximo da Rua XYZ'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setComplementoEnderecoTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongBairroTomador()
    {
        self::$Rps->setBairroTomador('Bairro do endereço do tomador inválido pois contém mais de setenta e dois caracteres');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidBairroTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setBairroTomador('Ibirapuera'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setBairroTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongEmailTomador()
    {
        self::$Rps->setEmailTomador('um e-mail inválido pois contém mais de oitenta caracteres para o tomador da nota fiscal');
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidEmailTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setEmailTomador('umemailvalid@gmail.com'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setEmailTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongNomeTomador()
    {
        self::$Rps->setNomeTomador(
            'ajnsochq90oqisnoj sicjans0cj 9uhojn ocuha sijcn0 9uch isnc pasjmc9uhumwiasjcniajmc9u1h jnc paksc iuahs cunaon zijnc9a'
        );
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidNomeTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setNomeTomador('Tomador da Nota Fiscal'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setNomeTomador(null));
    }

    /**
     * @expectedException Exception
     *
     * @access public
     * @return void
     */
    public function testSetLongEnderecoTomador()
    {
        self::$Rps->setEnderecoTomador(
            'ajnsochq90oqisnoj sicjans0cj 9uhojn ocuha sijcn0 9uch isnc pasjmc9uhumwiasjcniajmc9u1h jnc paksc iuahs cunaon zijnc9a aos0ijas oc aos'
        );
    }
    
    /**
     * @access public
     * @return void
     */
    public function testSetValidEnderecoTomador()
    {
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setEnderecoTomador('Rua Dom Pedro II'));
        $this->assertInstanceOf('NfeBundle\Entity\Rps', self::$Rps->setEnderecoTomador(null));
    }






    /**
     * {@inheritDoc}
     *
     * @access public
     * @return void
     */
    public static function tearDownAfterClass()
    {
        self::$Rps = null;
    }
}