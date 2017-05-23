<?php
/**
 * File that brings the NF Txt class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfTxt
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

use NfeBundle\Entity\NF\NfLayout;
use NfeBundle\Entity\NF\NfRpsLote;
use NfeBundle\Entity\NF\NfRps;
use NfeBundle\Entity\NF\NfHeader;
use NfeBundle\Entity\NF\NfFooter;

/**
 * NF Txt class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfTxt extends NfLayout
{
    public function process(NfRpsLote $NfRpsLote)
    {
        try {
            $this->validaLote($NfRpsLote);
        } catch (\Exception $e) {
            throw $e;
        }
        
        $this->content .= $this->formatHeader($NfRpsLote->getHeader());
        $Iterator = $NfRpsLote->getRps()->getIterator();
        while ($Iterator->valid()) {
            $this->content .= $this->formatRps($Iterator->current());
            $Iterator->next();
        }
        $this->content .= $this->formatFooter($NfRpsLote->getFooter());
    }

    protected function formatRps(NfRps $NfRps)
    {
        $r  = '';
        $r .= str_pad($NfRps->getTipoRegistro(), 2, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getTipoRps(), 1, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getSerieRps(), 5, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getNumeroRps(), 15, '0', STR_PAD_LEFT);
        $r .= $NfRps->getDataEmissao()->format('Ymd');
        $r .= str_pad($NfRps->getStatusRps(), 1, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getTipoIdentificacaoTomador(), 1, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getIdentificacaoTomador(), 14, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getInscricaoMunicipalTomador(), 15, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getInscricaoEstadualTomador(), 15, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getNomeTomador(), 115, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getTipoEndereco(), 3, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getEndereco(), 125, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getNumeroEndereco(), 10, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getComplementoEndereco(), 60, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getBairro(), 72, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getCidade(), 50, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getUf(), 2, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getCep(), 8, ' ', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getTelefone(), 11, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getEmail(), 80, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getTipoTributacao(), 2, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getCidadePrestacao(), 50, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getUfPrestacao(), 2, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getRegimeEspecial(), 2, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getOpcaoSimples(), 1, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getIncentivoCultural(), 1, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getCodigoServicoFederal(), 4, '0', STR_PAD_LEFT);
        $r .= str_pad('', 6, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getCodigoPais(), 5, ' ', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getCodigoBeneficio(), 3, ' ', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getCodigoServicoMunicipal(), 6, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getAliquota(), 5, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorServicos(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorDeducoes(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorDescontoCondicionado(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorDescontoIncondicionado(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorCofins(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorCsll(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorInss(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorIrpj(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorPisPasep(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorOutrasRetencoes(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getValorIss(), 15, '0', STR_PAD_LEFT);
        $r .= str_pad($NfRps->getIssRetido(), 1, '0', STR_PAD_LEFT);
        $r .= $NfRps->getDataCompetencia()->format('Ymd');
        $r .= str_pad($NfRps->getCodigoObra(), 15, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getAnotacaoTecnica(), 15, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getSerieRpsSubstituido(), 5, ' ', STR_PAD_RIGHT);
        $r .= str_pad($NfRps->getNumeroRpsSubstituido(), 15, ' ', STR_PAD_LEFT);
        $r .= str_pad('', 30, ' ', STR_PAD_RIGHT);
        $r .= str_replace("\n", '|', str_replace("\r", '|', $NfRps->getDiscriminacaoServicos()));
        $r .= chr(13).chr(10);
        return $r;
    }

    protected function formatHeader(NfHeader $NfHeader)
    {
        $h  = '';
        $h .= str_pad($NfHeader->getTipoRegistro(), 2, '0', STR_PAD_LEFT);
        $h .= str_pad($NfHeader->getVersaoArquivo(), 3, '0', STR_PAD_LEFT);
        $h .= str_pad($NfHeader->getTipoIdentificacaoContribuinte(), 1, '0', STR_PAD_LEFT);
        $h .= str_pad($NfHeader->getIdentificacaoContribuinte(), 14, '0', STR_PAD_LEFT);
        $h .= str_pad($NfHeader->getInscricaoMunicipalContribuinte(), 15, '0', STR_PAD_LEFT);
        $h .= $NfHeader->getInicioPeriodo()->format('Ymd');
        $h .= $NfHeader->getTerminoPeriodo()->format('Ymd');
        $h .= chr(13).chr(10);
        return $h;
    }

    protected function formatFooter(NfFooter $NfFooter)
    {
        $f  = '';
        $f .= str_pad($NfFooter->getTipoRegistro(), 2, '0', STR_PAD_LEFT);
        $f .= str_pad($NfFooter->getNumeroLinhas(), 8, '0', STR_PAD_LEFT);
        $f .= str_pad($NfFooter->getValorTotal(), 15, '0', STR_PAD_LEFT);
        $f .= str_pad($NfFooter->getValorDeducoes(), 15, '0', STR_PAD_LEFT);
        $f .= str_pad($NfFooter->getValorDescontosCondicionados(), 15, '0', STR_PAD_LEFT);
        $f .= str_pad($NfFooter->getValorDescontosIncondicionados(), 15, '0', STR_PAD_LEFT);
        $f .= chr(13).chr(10);
        return $f;
    }
}
