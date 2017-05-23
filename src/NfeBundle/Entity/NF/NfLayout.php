<?php
/**
 * File that brings the NF Layout class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfLayout
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

use NfeBundle\Entity\NF\NfRpsLote;
use NfeBundle\Entity\NF\NfRps;
use NfeBundle\Entity\NF\NfHeader;
use NfeBundle\Entity\NF\NfFooter;

/**
 * NF Layout class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
abstract class NfLayout
{
    protected $content = '';
    
    public function getContent()
    {
        return $this->content;
    }

    protected function validaLote(NfRpsLote $NfRpsLote)
    {
        if (!$NfRpsLote->getRps()->count()) {
            throw new \Exception("\nNenhum RPS foi informado para o lote\n");
        }
        
        $Iterator = $NfRpsLote->getRps()->getIterator();
        while ($Iterator->valid()) {
            try {
                $this->validaRps($Iterator->current());
            } catch (\Exception $e) {
                throw $e;
            }
            $Iterator->next();
        }
        
        try {
            $this->validaHeader($NfRpsLote->getHeader());
        } catch (\Exception $e) {
            throw $e;
        }
        
        try {
            $this->validaFooter($NfRpsLote->getFooter());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    protected function validaHeader(NfHeader $NfHeader)
    {
        if ($NfHeader->getTipoRegistro() != 10) {
            throw new \Exception("\nO tipo de registro do cabeçalho é incompatível com o esperado\n");
        }
        if ($NfHeader->getVersaoArquivo() != 3) {
            throw new \Exception("\nA versão do arquivo do cabeçalho é incompatível com o esperado\n");
        }
        if (!preg_match('/^[1-2]{1}$/', $NfHeader->getTipoIdentificacaoContribuinte())) {
            throw new \Exception("\nO tipo de identificação do contribuinte do cabeçalho é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-9]{9,14}$/', $NfHeader->getIdentificacaoContribuinte())) {
            throw new \Exception("\nA identificação do contribuinte do cabeçalho é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-9]{1,15}$/', $NfHeader->getInscricaoMunicipalContribuinte())) {
            throw new \Exception("\nA inscrição municipal do contribuinte do cabeçalho é incompatível com o esperado\n");
        }
        if (!$NfHeader->getInicioPeriodo() instanceof \DateTime) {
            throw new \Exception("\nA data de início do período está incompatível com o esperado\n");
        }
        if (!$NfHeader->getTerminoPeriodo() instanceof \DateTime) {
            throw new \Exception("\nA data final do período está incompatível com o esperado\n");
        }
        if ($NfHeader->getTerminoPeriodo() < $NfHeader->getInicioPeriodo()) {
            throw new \Exception("\nAs datas do período estão incompatíveis com o esperado\n");
        }
    }

    protected function validaFooter(NfFooter $NfFooter)
    {
        if ($NfFooter->getTipoRegistro() != 90) {
            throw new \Exception("\nO tipo de registro do rodapé é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-9]{1,8}$/', $NfFooter->getNumeroLinhas())) {
            throw new \Exception("\nA quantidade de linhas informada no rodapé é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-9]{1,15}$/', $NfFooter->getValorTotal())) {
            throw new \Exception("\nO valor total informado no rodapé é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-9]{1,15}$/', $NfFooter->getValorDeducoes())) {
            throw new \Exception("\nO valor das deduções informado no rodapé é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-9]{1,15}$/', $NfFooter->getValorDescontosCondicionados())) {
            throw new \Exception("\nO valor dos descontos condicionados informado no rodapé é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-9]{1,15}$/', $NfFooter->getValorDescontosIncondicionados())) {
            throw new \Exception("\nO valor dos descontos incondicionados informado no rodapé é incompatível com o esperado\n");
        }
    }
    
    protected function validaRps(NfRps $NfRps)
    {
        $numero = $NfRps->getNumeroRps();
        if ($NfRps->getTipoRegistro() != 20) {
            throw new \Exception("\nO tipo de registro do detalhe é incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-1]{1}$/', $NfRps->getTipoRps())) {
            throw new \Exception("\nO tipo do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (strlen($NfRps->getSerieRps()) > 5) {
            throw new \Exception("\nA série do RPS " . $numero . " é maior que 5 caracteres\n");
        }
        if (!preg_match('/^[0-9]{1,15}$/', $NfRps->getNumeroRps())) {
            throw new \Exception("\nO número do RPS " . $numero . " não possui entre 1 e 15 números\n");
        }
        if (!$NfRps->getDataEmissao() instanceof \DateTime) {
            throw new \Exception("\nA data de emissão do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (!preg_match('/^[1-2]{1}$/', $NfRps->getStatusRps())) {
            throw new \Exception("\nA situação do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (!preg_match('/^[1-3]{1}$/', $NfRps->getTipoIdentificacaoTomador())) {
            throw new \Exception("\nO tipo de identificação do Tomador do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() != 3) {
            if (!preg_match('/^[0-9]{9,14}$/', $NfRps->getIdentificacaoTomador())) {
                throw new \Exception("\nA identificação do Tomador do RPS " . $numero . " está incompatível com o esperado\n");
            }
        }
        if (strlen($NfRps->getInscricaoMunicipalTomador()) > 15) {
            throw new \Exception("\nA inscrição municipal do Tomador do RPS " . $numero . " é maior que 15 caracteres\n");
        }
        if (strlen($NfRps->getInscricaoEstadualTomador()) > 15) {
            throw new \Exception("\nA inscrição estadual do Tomador do RPS " . $numero . " é maior que 15 caracteres\n");
        }
        if (strlen($NfRps->getNomeTomador()) > 115) {
            throw new \Exception("\nO nome do Tomador do RPS " . $numero . " é maior que 115 caracteres\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() == 2 && !strlen($NfRps->getNomeTomador())) {
            throw new \Exception("\nO nome do Tomador do RPS " . $numero . " é obrigatório para tomadores pessoa jurídica\n");
        }
        if (strlen($NfRps->getTipoEndereco()) > 3) {
            throw new \Exception("\nO tipo de endereço do Tomador do RPS " . $numero . " é maior que 3 caracteres\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() == 2 && !strlen($NfRps->getTipoEndereco())) {
            throw new \Exception("\nO tipo de endereço do Tomador do RPS " . $numero . " é obrigatório para tomadores pessoa jurídica\n");
        }
        if (strlen($NfRps->getEndereco()) > 125) {
            throw new \Exception("\nO endereço do Tomador do RPS " . $numero . " é maior que 125 caracteres\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() == 2 && !strlen($NfRps->getEndereco())) {
            throw new \Exception("\nO endereço do Tomador do RPS " . $numero . " é obrigatório para tomadores pessoa jurídica\n");
        }
        if (strlen($NfRps->getNumeroEndereco()) > 10) {
            throw new \Exception("\nO número do endereço do Tomador do RPS " . $numero . " é maior que 10 caracteres\n");
        }
        if (strlen($NfRps->getComplementoEndereco()) > 60) {
            throw new \Exception("\nO complemento do endereço do Tomador do RPS " . $numero . " é maior que 60 caracteres\n");
        }
        if (strlen($NfRps->getBairro()) > 72) {
            throw new \Exception("\nO bairro do Tomador do RPS " . $numero . " é maior que 72 caracteres\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() == 2 && !strlen($NfRps->getBairro())) {
            throw new \Exception("\nO bairro do Tomador do RPS " . $numero . " é obrigatório para tomadores pessoa jurídica\n");
        }
        if (strlen($NfRps->getCidade()) > 50) {
            throw new \Exception("\nA cidade do Tomador do RPS " . $numero . " é maior que 50 caracteres\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() == 2 && !strlen($NfRps->getCidade())) {
            throw new \Exception("\nA cidade do Tomador do RPS " . $numero . " é obrigatório para tomadores pessoa jurídica\n");
        }
        if (strlen($NfRps->getUf()) > 2) {
            throw new \Exception("\nO estado do Tomador do RPS " . $numero . " é maior que 2 caracteres\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() == 2 && strlen($NfRps->getUf()) != 2) {
            throw new \Exception("\nO estado do Tomador do RPS " . $numero . " é obrigatório para tomadores pessoa jurídica\n");
        }
        if (strlen($NfRps->getCep()) > 8) {
            throw new \Exception("\nO CEP do Tomador do RPS " . $numero . " é maior que 8 números\n");
        }
        if ($NfRps->getTipoIdentificacaoTomador() == 2 && !strlen($NfRps->getCep())) {
            throw new \Exception("\nO CEP do Tomador do RPS " . $numero . " é obrigatório para tomadores pessoa jurídica\n");
        }
        if (strlen($NfRps->getTelefone()) > 11) {
            throw new \Exception("\nO telefone do Tomador do RPS " . $numero . " é maior que 11 caracteres\n");
        }
        if (strlen($NfRps->getEmail()) > 80) {
            throw new \Exception("\nO email do Tomador do RPS " . $numero . " é maior que 80 caracteres\n");
        }
        if (!preg_match('/^[1-6]{1}$/', $NfRps->getTipoTributacao())) {
            throw new \Exception("\nO tipo de tributação de serviço do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (strlen($NfRps->getCidadePrestacao()) > 50) {
            throw new \Exception("\nA cidade da prestação do serviço do RPS " . $numero . " é maior que 50 caracteres\n");
        }
        if (!strlen($NfRps->getCidadePrestacao())) {
            throw new \Exception("\nA cidade da prestação do serviço do RPS " . $numero . " é de preenchimento obrigatório\n");
        }
        if (strlen($NfRps->getUfPrestacao()) > 2) {
            throw new \Exception("\nO estado da prestação do serviço do RPS " . $numero . " é maior que 2 caracteres\n");
        }
        if (strlen($NfRps->getUfPrestacao()) != 2) {
            throw new \Exception("\nO estado da prestação do serviço do RPS " . $numero . " é de preenchimento obrigatório\n");
        }
        if (!preg_match('/^[0-6]{1}$/', $NfRps->getRegimeEspecial())) {
            throw new \Exception("\nO regime especial de tributação do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-1]{1}$/', $NfRps->getOpcaoSimples())) {
            throw new \Exception("\nA opção pelo simples do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (!preg_match('/^[0-1]{1}$/', $NfRps->getIncentivoCultural())) {
            throw new \Exception("\nO incentivo cultural do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (strlen($NfRps->getCodigoServicoFederal()) > 4) {
            throw new \Exception("\nO código do serviço federal do RPS " . $numero . " é maior que 4 caracteres\n");
        }
        if (!strlen($NfRps->getCodigoServicoFederal())) {
            throw new \Exception("\nO código do serviço federal do RPS " . $numero . " é de preenchimento obrigatório\n");
        }
        if (strlen($NfRps->getCodigoPais()) > 5) {
            throw new \Exception("\nO código do país do RPS " . $numero . " é maior que 5 números\n");
        }
        if (strlen($NfRps->getCodigoBeneficio()) > 3) {
            throw new \Exception("\nO código do benefício do RPS " . $numero . " é maior que 3 números\n");
        }
        if (strlen($NfRps->getCodigoServicoMunicipal()) > 6) {
            throw new \Exception("\nO código do serviço municipal do RPS " . $numero . " é maior que 6 caracteres\n");
        }
        if (!strlen($NfRps->getCodigoServicoMunicipal())) {
            throw new \Exception("\nO código do serviço municipal do RPS " . $numero . " é de preenchimento obrigatório\n");
        }
        if (strlen($NfRps->getAliquota()) > 5) {
            throw new \Exception("\nA alíquota do RPS " . $numero . " é maior que 5 números\n");
        }
        if (!strlen($NfRps->getAliquota())) {
            throw new \Exception("\nA alíquota do RPS " . $numero . " é de preenchimento obrigatório\n");
        }
        if (strlen($NfRps->getValorServicos()) > 15) {
            throw new \Exception("\nO valor dos serviços do RPS " . $numero . " é maior que 15 números\n");
        }
        if (!strlen($NfRps->getValorServicos())) {
            throw new \Exception("\nO valor dos serviços do RPS " . $numero . " é de preenchimento obrigatório\n");
        }
        if (strlen($NfRps->getValorDeducoes()) > 15) {
            throw new \Exception("\nO valor das deduções do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorDescontoCondicionado()) > 15) {
            throw new \Exception("\nO valor do desconto condicionado do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorDescontoIncondicionado()) > 15) {
            throw new \Exception("\nO valor do desconto incondicionado do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorCofins()) > 15) {
            throw new \Exception("\nO valor do COFINS do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorCsll()) > 15) {
            throw new \Exception("\nO valor do CSLL do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorInss()) > 15) {
            throw new \Exception("\nO valor do INSS do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorIrpj()) > 15) {
            throw new \Exception("\nO valor do IRPJ do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorPisPasep()) > 15) {
            throw new \Exception("\nO valor do PIS/PASEP do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorOutrasRetencoes()) > 15) {
            throw new \Exception("\nO valor das outras retenções federais do RPS " . $numero . " é maior que 15 números\n");
        }
        if (strlen($NfRps->getValorIss()) > 15) {
            throw new \Exception("\nO valor do ISS do RPS " . $numero . " é maior que 15 números\n");
        }
        if (!preg_match('/^[0-1]{1}$/', $NfRps->getIssRetido())) {
            throw new \Exception("\nO ISS retido do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (!$NfRps->getDataCompetencia() instanceof \DateTime) {
            throw new \Exception("\nA data da competência do RPS " . $numero . " está incompatível com o esperado\n");
        }
        if (strlen($NfRps->getCodigoObra()) > 15) {
            throw new \Exception("\nO código da obra do RPS " . $numero . " é maior que 15 caracteres\n");
        }
        if (strlen($NfRps->getAnotacaoTecnica()) > 15) {
            throw new \Exception("\nA anotação de responsabilidade técnica do RPS " . $numero . " é maior que 15 caracteres\n");
        }
        if (strlen($NfRps->getSerieRpsSubstituido()) > 5) {
            throw new \Exception("\nA série substituta do RPS " . $numero . " é maior que 5 caracteres\n");
        }
        if (strlen($NfRps->getNumeroRpsSubstituido()) > 15) {
            throw new \Exception("\nO número substituta do RPS " . $numero . " é maior que 15 números\n");
        }
        if (!strlen($NfRps->getDiscriminacaoServicos())) {
            throw new \Exception("\nA descrição dos serviços do RPS " . $numero . " é de preenchimento obrigatório\n");
        }
    }

    abstract public function process(NfRpsLote $NfRpsLote);
}
