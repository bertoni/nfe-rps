<?php
/**
 * File that brings the File RPS Process class
 *
 * PHP Version 5.3
 *
 * @category Business
 * @package  Nfe
 * @name     FileRpsProcess
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Business;

use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use Doctrine\ORM\EntityManager;
use NfeBundle\Entity\Rps;
use NfeBundle\Entity\LoteRps;
use NfeBundle\Entity\NF\NfRpsLote;
use NfeBundle\Entity\NF\NfTxt;
use NfeBundle\Entity\NF\NfRps;

/**
 * File RPS Process class
 *
 * @category Business
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo@emoda.com.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class FileRpsProcess
{
    /**
     * @var    string
     * @access protected
     */
    protected static $name = 'RPSFILE';
    
    /**
     * Generate file rps
     *
     * @param LoteRps              $LoteRps
     * @param array                $config
     * @param EntityManager        $EntityManager
     * @param DebugLoggerInterface $Logger
     *
     * @access public
     * @return void
     * @throws Exception
     */
    public function generateFileRps(LoteRps $LoteRps, $file, array $config, EntityManager $EntityManager, DebugLoggerInterface $Logger)
    {
        $Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => 'Iniciando a geração do Arquivo de RPS'));
        
        $NfRpsLote = new NfRpsLote(
            new NfTxt(),
            $config['header']['default']['tipo_identificacao_contribuinte'],
            $config['header']['default']['identificacao_contribuinte'],
            $config['header']['default']['inscricao_municipal_contribuinte']
        );
        
        $Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => 'Buscando RPS do lote'));
        $Rps = $EntityManager->getRepository('NfeBundle:Rps')
            ->findBy(array('id_lote_rps' => $LoteRps->getIdLoteRps()), array('data_emissao' => 'ASC'));
        
        if (!is_array($Rps) || !count($Rps)) {
            $message = 'Nao existem RPS no lote informado';
            $Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => $message));
            throw new \Exception($message);
        }
        
        foreach ($Rps as $ItemRps) {
            $NfRps = null;
            try {
                $NfRps = $this->getNfRpsByRps($ItemRps);
            } catch (\Exception $e) {
                $Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => $e->getMessage()));
                throw $e;
            }
            
            if ($NfRps instanceof NfRps) {
                $NfRpsLote->setRps($NfRps);
            }
        }
        
        try {
            $NfRpsLote->process();
        } catch (\Exception $e) {
            $Logger->info(self::$name, array('Lote' => $LoteRps->getIdLoteRps(), 'info' => $e->getMessage()));
            throw $e;
        }
        
        $result = file_put_contents($file, $NfRpsLote->getContent());
        if (!$result) {
            throw new \Exception('Não foi possível gerar o arquivo RPS');
        }
    }

    public function getNfRpsByRps(Rps $Rps)
    {
        $NfRps = new NfRps();
        try {
            $NfRps->setTipoRps($Rps->getTipoRps())
                ->setSerieRps($Rps->getSerieRps())
                ->setNumeroRps($Rps->getIdRps())
                ->setDataEmissao($Rps->getDataEmissao())
                ->setStatusRps($Rps->getStatusRps())
                ->setTipoIdentificacaoTomador($Rps->getTipoIdentificaoTomador())
                ->setIdentificacaoTomador($Rps->getIdentificacaoTomador())
                ->setInscricaoMunicipalTomador($Rps->getInscricaoMunicipalTomador())
                ->setInscricaoEstadualTomador($Rps->getInscricaoEstadualTomador())
                ->setNomeTomador($Rps->getNomeTomador())
                ->setTipoEndereco($Rps->getTipoEnderecoTomador())
                ->setEndereco($Rps->getEnderecoTomador())
                ->setNumeroEndereco($Rps->getNumeroEnderecoTomador())
                ->setComplementoEndereco($Rps->getComplementoEnderecoTomador())
                ->setBairro($Rps->getBairroTomador())
                ->setCidade($Rps->getCidadeTomador())
                ->setUf($Rps->getUfTomador())
                ->setCep($Rps->getCepTomador())
                ->setTelefone($Rps->getTelefoneTomador())
                ->setEmail($Rps->getEmailTomador())
                ->setTipoTributacao($Rps->getTipoTributacaoServico())
                ->setCidadePrestacao($Rps->getCidadePrestacaoServico())
                ->setUfPrestacao($Rps->getUfPrestacaoServico())
                ->setRegimeEspecial($Rps->getRegimeEspecialTributacao())
                ->setOpcaoSimples($Rps->getOpcaoPeloSimples())
                ->setIncentivoCultural($Rps->getIncentivoCultural())
                ->setCodigoServicoFederal($Rps->getCodigoServicoFederal())
                ->setCodigoPais($Rps->getCodigoPais())
                ->setCodigoBeneficio($Rps->getCodigoBeneficio())
                ->setCodigoServicoMunicipal($Rps->getCodigoServicoMunicipal())
                ->setAliquota($Rps->getAliquota())
                ->setValorServicos($Rps->getValorServicos())
                ->setValorDeducoes($Rps->getValorDeducoes())
                ->setValorDescontoCondicionado($Rps->getValorDescontoCondicionado())
                ->setValorDescontoIncondicionado($Rps->getValorDescontoIncondicionado())
                ->setValorCofins($Rps->getValorCofins())
                ->setValorCsll($Rps->getValorCsll())
                ->setValorInss($Rps->getValorInss())
                ->setValorIrpj($Rps->getValorIrpj())
                ->setValorPisPasep($Rps->getValorPisPasep())
                ->setValorOutrasRetencoes($Rps->getValorOutrasRetencoesFederais())
                ->setValorIss($Rps->getValorIss())
                ->setIssRetido($Rps->getIssRetido())
                ->setDataCompetencia($Rps->getDataCompetencia())
                ->setCodigoObra($Rps->getCodigoObra())
                ->setAnotacaoTecnica($Rps->getAnotacaoResponsabilidadeTecnica())
                ->setSerieRpsSubstituido($Rps->getSerieRpsSubstituido())
                ->setNumeroRpsSubstituido($Rps->getNumeroRpsSusbtituido())
                ->setDiscriminacaoServicos($Rps->getDiscriminacaoServico());
        } catch (\Exception $e) {
            throw $e;
        }
        return $NfRps;
    }
}