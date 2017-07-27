<?php
/**
 * File that brings the NF Return Layout Common Txt class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     NfReturnLayoutCommonTxt
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity\NF;

use NfeBundle\Entity\NF\NfReturnLayout;
use NfeBundle\Entity\NF\NfReturnHeader;
use NfeBundle\Entity\NF\NfReturnFooter;
use NfeBundle\Entity\NF\NfReturnRps;

/**
 * NF Return Layout Common Txt class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  https://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class NfReturnLayoutCommonTxt extends NfReturnLayout
{
  protected $file_path;

  public function __construct($file_path)
  {
    $this->file_path = $file_path;
  }

  public function process(NfReturnRpsLote $NfReturnRpsLote)
  {
    try {
      $this->validateFile();
    } catch (\Exception $e) {
      throw $e;
    }

    $contents = file_get_contents($this->file_path);
    $contents = explode("\n", $contents);
    array_pop($contents);
    foreach ($contents as $line=>$content) {
      if (!$line) {
        try {
          $this->extractHeader(trim($content));
        } catch (\Exception $e) {
          throw $e;
        }
      } else if ((count($contents) - 1) == $line) {
        try {
          $this->extractFooter(trim($content));
        } catch (\Exception $e) {
          throw $e;
        }
      } else {
        try {
          $this->extractRps(trim($content));
        } catch (\Exception $e) {
          throw $e;
        }
      }
    }
  }

  public function validateFile()
  {
    if (!is_file($this->file_path)) {
      throw new \Exception("\nO caminho informado não é um arquivo\n");
    }
    if (mime_content_type($this->file_path) != 'text/plain') {
      throw new \Exception("\nO formato do arquivo de retorno do RPS não é suportado por este layout\n");
    }
    if (!filesize($this->file_path)) {
      throw new \Exception("\nO arquivo de retorno do RPS está vazio\n");
    }
    $content = file_get_contents($this->file_path);
    if ($content === false) {
      throw new \Exception("\nNão é possível ler o conteúdo do arquivo de retorno do RPS\n");
    }
    $content = explode("\n", $content);
    array_pop($content);
    if (count($content) < 3) {
      throw new \Exception("\nO retorno do RPS não contém um mínimo de 1 cabeçalho, 1 detalhe e 1 rodapé\n");
    }
  }

  public function validateHeader($data_header)
  {
    if (strlen($data_header) != 51) {
      throw new \Exception("\nA quantidade de caracteres do cabeçalho é inválida\n");
    }
    if (!preg_match('/^10$/', substr($data_header, 0, 2))) {
      throw new \Exception("\nTipo de registro do cabeçalho inválido\n");
    }
    if (!preg_match('/^003$/', substr($data_header, 2, 3))) {
      throw new \Exception("\nVersão do Arquivo do cabeçalho inválido\n");
    }
    if (!preg_match('/^[1-2]$/', substr($data_header, 5, 1))) {
      throw new \Exception("\nIdentificação CPF ou CNPJ do Contribuinte do cabeçalho inválido\n");
    }
    if (!preg_match('/^[0-9]{14}$/', substr($data_header, 6, 14))) {
      throw new \Exception("\nCPF ou CNPJ do Contribuinte do cabeçalho inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_header, 20, 15))) {
      throw new \Exception("\nInscrição Municipal do Contribuinte do cabeçalho inválido\n");
    }
    if (!preg_match('/^[0-9]{8}$/', substr($data_header, 35, 8))) {
      throw new \Exception("\nData de Início do Período Transferido no Arquivo do cabeçalho inválido\n");
    }
    if (!preg_match('/^[0-9]{8}$/', substr($data_header, 43, 8))) {
      throw new \Exception("\nData de Fim do Período Transferido no Arquivo do cabeçalho inválido\n");
    }
  }

  public function extractHeader($data_header)
  {
    try {
      $this->validateHeader($data_header);
    } catch (\Exception $e) {
      throw $e;
    }
    $this->Header = new NfReturnHeader();
    $this->Header->setTipoIdentificacaoContribuinte(substr($data_header, 5, 1))
      ->setIdentificacaoContribuinte(substr($data_header, 6, 14))
      ->setInscricaoMunicipalContribuinte(substr($data_header, 20, 15))
      ->setInicioPeriodo(\DateTime::createFromFormat('Ymd', substr($data_header, 35, 8)))
      ->setTerminoPeriodo(\DateTime::createFromFormat('Ymd', substr($data_header, 43, 8)));
  }

  public function validateFooter($data_footer)
  {
    if (strlen($data_footer) != 190) {
      throw new \Exception("\nA quantidade de caracteres do rodapé é inválida\n");
    }
    if (!preg_match('/^90$/', substr($data_footer, 0, 2))) {
      throw new \Exception("\nTipo de registro do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{8}$/', substr($data_footer, 2, 8))) {
      throw new \Exception("\nNúmero de linhas de detalhe do arquivo do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 10, 15))) {
      throw new \Exception("\nValor total dos serviços contido no arquivo do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 25, 15))) {
      throw new \Exception("\nValor total das deduções contidas no arquivo do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 40, 15))) {
      throw new \Exception("\nValor total dos descontos condicionados contidos no arquivo do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 55, 15))) {
      throw new \Exception("\nValor total dos descontos incondicionados contidos no arquivo do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 70, 15))) {
      throw new \Exception("\nValor total das retenções de COFINS do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 85, 15))) {
      throw new \Exception("\nValor total das retenções de CSLL do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 100, 15))) {
      throw new \Exception("\nValor total das retenções de INSS do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 115, 15))) {
      throw new \Exception("\nValor total das retenções de IRPJ do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 130, 15))) {
      throw new \Exception("\nValor total das retenções de PIS/PASEP do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 145, 15))) {
      throw new \Exception("\nValor total de outras retenções federais do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 160, 15))) {
      throw new \Exception("\nValor total do ISS do rodapé inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_footer, 175, 15))) {
      throw new \Exception("\nValor total dos créditos do rodapé inválido\n");
    }
  }

  public function extractFooter($data_footer)
  {
    try {
      $this->validateFooter($data_footer);
    } catch (\Exception $e) {
      throw $e;
    }
    $this->Footer = new NfReturnFooter();
    $this->Footer->setNumeroLinhas(substr($data_footer, 2, 8))
      ->setValorTotal(substr($data_footer, 10, 15))
      ->setValorDeducoes(substr($data_footer, 25, 15))
      ->setValorDescontosCondicionados(substr($data_footer, 40, 15))
      ->setValorDescontosIncondicionados(substr($data_footer, 55, 15))
      ->setValorCofins(substr($data_footer, 70, 15))
      ->setValorCsll(substr($data_footer, 85, 15))
      ->setValorInss(substr($data_footer, 100, 15))
      ->setValorIrpj(substr($data_footer, 115, 15))
      ->setValorPisPasep(substr($data_footer, 130, 15))
      ->setValorOutrasRetencoes(substr($data_footer, 145, 15))
      ->setValorIss(substr($data_footer, 160, 15))
      ->setValorCredito(substr($data_footer, 175, 15));
  }

  public function validateRps($data_rps)
  {
    if (strlen($data_rps) < 1676) {
      throw new \Exception("\nA quantidade de caracteres do detalhe de RPS é inválida\n");
    }
    if (!preg_match('/^20$/', substr($data_rps, 0, 2))) {
      throw new \Exception("\nTipo de registro no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 2, 15))) {
      throw new \Exception("\nNúmero da Nota Fiscal no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[1-2]$/', substr($data_rps, 17, 1))) {
      throw new \Exception("\nStatus da Nota Fiscal no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{9}$/', substr($data_rps, 18, 9))) {
      throw new \Exception("\nCódigo de Verificação no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{14}$/', substr($data_rps, 27, 14))) {
      throw new \Exception("\nData Hora da Emissão da Nota no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-2]$/', substr($data_rps, 41, 1))) {
      throw new \Exception("\nTipo de RPS no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{5}$/', substr($data_rps, 42, 5))) {
      throw new \Exception("\nSérie do RPS no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 47, 15))) {
      throw new \Exception("\nNúmero do RPS no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{8}$/', substr($data_rps, 62, 8))) {
      throw new \Exception("\nData de Emissão do RPS no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[1-2]$/', substr($data_rps, 70, 1))) {
      throw new \Exception("\nIndicador de CPF ou CNPJ do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{14}$/', substr($data_rps, 71, 14))) {
      throw new \Exception("\nCPF ou CNPJ do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 85, 15))) {
      throw new \Exception("\nInscrição Municipal do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 100, 15))) {
      throw new \Exception("\nInscrição Estadual do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{115}$/', substr($data_rps, 115, 115))) {
      throw new \Exception("\nRazão Social do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{60}$/', substr($data_rps, 230, 60))) {
      throw new \Exception("\nNome Fantasia do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{3}$/', substr($data_rps, 290, 3))) {
      throw new \Exception("\nTipo do Endereço do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{125}$/', substr($data_rps, 293, 125))) {
      throw new \Exception("\nEndereço do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{10}$/', substr($data_rps, 418, 10))) {
      throw new \Exception("\nNúmero do Endereço do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{60}$/', substr($data_rps, 428, 60))) {
      throw new \Exception("\nComplemento do Endereço do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{72}$/', substr($data_rps, 488, 72))) {
      throw new \Exception("\nBairro do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{50}$/', substr($data_rps, 560, 50))) {
      throw new \Exception("\nCidade do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[a-zA-Z]{2}$/', substr($data_rps, 610, 2))) {
      throw new \Exception("\nUF do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{8}$/', substr($data_rps, 612, 8))) {
      throw new \Exception("\nCEP do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{11}$/', substr($data_rps, 620, 11))) {
      throw new \Exception("\nTelefone de Contato do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{80}$/', substr($data_rps, 631, 80))) {
      throw new \Exception("\nE-mail do Prestador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[1-3]$/', substr($data_rps, 711, 1))) {
      throw new \Exception("\nIndicador de CPF ou CNPJ do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{14}$/', substr($data_rps, 712, 14))) {
      throw new \Exception("\nCPF ou CNPJ do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 726, 15))) {
      throw new \Exception("\nInscrição Municipal do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 741, 15))) {
      throw new \Exception("\nInscrição Estadual do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{115}$/', substr($data_rps, 756, 115))) {
      throw new \Exception("\nNome ou Razão Social do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{3}$/', substr($data_rps, 871, 3))) {
      throw new \Exception("\nTipo do Endereço do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{125}$/', substr($data_rps, 874, 125))) {
      throw new \Exception("\nEndereço do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{10}$/', substr($data_rps, 999, 10))) {
      throw new \Exception("\nNúmero do Endereço do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{60}$/', substr($data_rps, 1009, 60))) {
      throw new \Exception("\nComplemento do Endereço do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{72}$/', substr($data_rps, 1069, 72))) {
      throw new \Exception("\nBairro do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{50}$/', substr($data_rps, 1141, 50))) {
      throw new \Exception("\nCidade do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^([a-zA-Z]{2}|\s{2})$/', substr($data_rps, 1191, 2))) {
      throw new \Exception("\nUF do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{8}$/', substr($data_rps, 1193, 8))) {
      throw new \Exception("\nCEP do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{11}$/', substr($data_rps, 1201, 11))) {
      throw new \Exception("\nTelefone de Contato do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{80}$/', substr($data_rps, 1212, 80))) {
      throw new \Exception("\nEmail do Tomador no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^0[1-6]$/', substr($data_rps, 1292, 2))) {
      throw new \Exception("\nTipo de Tributação de Serviços no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{50}$/', substr($data_rps, 1294, 50))) {
      throw new \Exception("\nCidade de Prestação do Serviço no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[a-zA-Z]{2}$/', substr($data_rps, 1344, 2))) {
      throw new \Exception("\nUF de Prestação do Serviço no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^0[0-5]$/', substr($data_rps, 1346, 2))) {
      throw new \Exception("\nRegime Especial de Tributação no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-1]$/', substr($data_rps, 1348, 1))) {
      throw new \Exception("\nOpção Pelo Simples no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-1]$/', substr($data_rps, 1349, 1))) {
      throw new \Exception("\nIncentivo Cultural no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{4}$/', substr($data_rps, 1350, 4))) {
      throw new \Exception("\nCódigo do Serviço Federal no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{3}$/', substr($data_rps, 1365, 3))) {
      throw new \Exception("\nCódigo do Benefício no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{6}$/', substr($data_rps, 1354, 6))) {
      throw new \Exception("\nCódigo do Serviço Municipal no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{5}$/', substr($data_rps, 1374, 5))) {
      throw new \Exception("\nAlíquota no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1379, 15))) {
      throw new \Exception("\nValor dos Serviços no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1394, 15))) {
      throw new \Exception("\nValor das Deduções no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1409, 15))) {
      throw new \Exception("\nValor do Desconto Condicionado no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1424, 15))) {
      throw new \Exception("\nValor do Desconto Incondicionado no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1439, 15))) {
      throw new \Exception("\nValor COFINS no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1454, 15))) {
      throw new \Exception("\nValor CSLL no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1469, 15))) {
      throw new \Exception("\nValor INSS no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1484, 15))) {
      throw new \Exception("\nValor IRPJ no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1499, 15))) {
      throw new \Exception("\nValor PIS/PASEP no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1514, 15))) {
      throw new \Exception("\nValor de Outras Retenções Federais no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1529, 15))) {
      throw new \Exception("\nValor do ISS no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1544, 15))) {
      throw new \Exception("\nValor do Crédito no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-1]$/', substr($data_rps, 1559, 1))) {
      throw new \Exception("\nISS Retido no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^([0-9]|\s){8}$/', substr($data_rps, 1560, 8))) {
      throw new \Exception("\nData de Cancelamento no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{8}$/', substr($data_rps, 1568, 8))) {
      throw new \Exception("\nData de Competência no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1576, 15))) {
      throw new \Exception("\nNúmero da Guia no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^([0-9]|\s){8}$/', substr($data_rps, 1591, 8))) {
      throw new \Exception("\nData de Quitação da Guia Vinculada a Nota Fiscal no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1599, 15))) {
      throw new \Exception("\nLote (Protocolo) no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{15}$/', substr($data_rps, 1614, 15))) {
      throw new \Exception("\nCódigo da Obra no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{15}$/', substr($data_rps, 1629, 15))) {
      throw new \Exception("\nAnotação de Responsabilidade Técnica no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1644, 15))) {
      throw new \Exception("\nNúmero da Nota Fiscal Substituida no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^[0-9]{15}$/', substr($data_rps, 1659, 15))) {
      throw new \Exception("\nNúmero da Nota Substituta no detalhe de RPS inválido\n");
    }
    if (!preg_match('/^.{1,}$/', substr($data_rps, 1674))) {
      throw new \Exception("\nDiscriminação dos Serviços no detalhe de RPS inválido\n");
    }
  }

  public function extractRps($data_rps)
  {
    try {
      $this->validateRps($data_rps);
    } catch (\Exception $e) {
      throw $e;
    }
    $Rps = new NfReturnRps();
    $Rps->setNumeroNf(trim(substr($data_rps, 2, 15)))
      ->setStatusNf(trim(substr($data_rps, 17, 1)))
      ->setCodigoVerificacao(trim(substr($data_rps, 18, 9)))
      ->setDataEmissaoNf(\DateTime::createFromFormat('YmdHis', trim(substr($data_rps, 27, 14))))
      ->setTipoRps(trim(substr($data_rps, 41, 1)))
      ->setSerieRps(trim(substr($data_rps, 42, 5)))
      ->setNumeroRps(trim(substr($data_rps, 47, 15)))
      ->setDataEmissaoRps(\DateTime::createFromFormat('Ymd', trim(substr($data_rps, 62, 8))))
      ->setTipoIdentificacaoPrestador(trim(substr($data_rps, 70, 1)))
      ->setIdentificacaoPrestador(trim(substr($data_rps, 71, 14)))
      ->setInscricaoMunicipalPrestador(trim(substr($data_rps, 85, 15)))
      ->setInscricaoEstadualPrestador(trim(substr($data_rps, 100, 15)))
      ->setRazaoPrestador(trim(substr($data_rps, 115, 115)))
      ->setNomePrestador(trim(substr($data_rps, 230, 60)))
      ->setTipoEnderecoPrestador(trim(substr($data_rps, 290, 3)))
      ->setEnderecoPrestador(trim(substr($data_rps, 293, 125)))
      ->setNumeroEnderecoPrestador(trim(substr($data_rps, 418, 10)))
      ->setComplementoEnderecoPrestador(trim(substr($data_rps, 428, 60)))
      ->setBairroPrestador(trim(substr($data_rps, 488, 72)))
      ->setCidadePrestador(trim(substr($data_rps, 560, 50)))
      ->setUfPrestador(trim(substr($data_rps, 610, 2)))
      ->setCepPrestador(trim(substr($data_rps, 612, 8)))
      ->setTelefonePrestador(trim(substr($data_rps, 620, 11)))
      ->setEmailPrestador(trim(substr($data_rps, 631, 80)))
      ->setTipoIdentificacaoTomador(trim(substr($data_rps, 711, 1)))
      ->setIdentificacaoTomador(trim(substr($data_rps, 712, 14)))
      ->setInscricaoMunicipalTomador(trim(substr($data_rps, 726, 15)))
      ->setInscricaoEstadualTomador(trim(substr($data_rps, 741, 15)))
      ->setNomeTomador(trim(substr($data_rps, 756, 115)))
      ->setTipoEnderecoTomador(trim(substr($data_rps, 871, 3)))
      ->setEnderecoTomador(trim(substr($data_rps, 874, 125)))
      ->setNumeroEnderecoTomador(trim(substr($data_rps, 999, 10)))
      ->setComplementoEnderecoTomador(trim(substr($data_rps, 1009, 60)))
      ->setBairroTomador(trim(substr($data_rps, 1069, 72)))
      ->setCidadeTomador(trim(substr($data_rps, 1141, 50)))
      ->setUfTomador(trim(substr($data_rps, 1191, 2)))
      ->setCepTomador(trim(substr($data_rps, 1193, 8)))
      ->setTelefoneTomador(trim(substr($data_rps, 1201, 11)))
      ->setEmailTomador(trim(substr($data_rps, 1212, 80)))
      ->setTipoTributacao(trim(substr($data_rps, 1292, 2)))
      ->setCidadePrestacao(trim(substr($data_rps, 1294, 50)))
      ->setUfPrestacao(trim(substr($data_rps, 1344, 2)))
      ->setRegimeEspecial(trim(substr($data_rps, 1346, 2)))
      ->setOpcaoSimples(trim(substr($data_rps, 1348, 1)))
      ->setIncentivoCultural(trim(substr($data_rps, 1349, 1)))
      ->setCodigoServicoFederal(trim(substr($data_rps, 1350, 4)))
      ->setCodigoBeneficio(trim(substr($data_rps, 1365, 3)))
      ->setCodigoServicoMunicipal(trim(substr($data_rps, 1368, 6)))
      ->setAliquota(trim(substr($data_rps, 1374, 5)))
      ->setValorServicos(trim(substr($data_rps, 1379, 15)))
      ->setValorDeducoes(trim(substr($data_rps, 1394, 15)))
      ->setValorDescontoCondicionado(trim(substr($data_rps, 1409, 15)))
      ->setValorDescontoIncondicionado(trim(substr($data_rps, 1424, 15)))
      ->setValorCofins(trim(substr($data_rps, 1439, 15)))
      ->setValorCsll(trim(substr($data_rps, 1454, 15)))
      ->setValorInss(trim(substr($data_rps, 1469, 15)))
      ->setValorIrpj(trim(substr($data_rps, 1484, 15)))
      ->setValorPisPasep(trim(substr($data_rps, 1499, 15)))
      ->setValorOutrasRetencoes(trim(substr($data_rps, 1514, 15)))
      ->setValorIss(trim(substr($data_rps, 1529, 15)))
      ->setValorCredito(trim(substr($data_rps, 1544, 15)))
      ->setIssRetido(trim(substr($data_rps, 1559, 1)))
      ->setDataCancelamento(strlen(trim(substr($data_rps, 1560, 8))) ? \DateTime::createFromFormat('Ymd', trim(substr($data_rps, 1560, 8))) : null)
      ->setDataCompetencia(strlen(trim(substr($data_rps, 1568, 8))) ? \DateTime::createFromFormat('Ymd', trim(substr($data_rps, 1568, 8))) : null)
      ->setNumeroGuia(trim(substr($data_rps, 1576, 15)))
      ->setDataQuitacao(strlen(trim(substr($data_rps, 1591, 8))) ? \DateTime::createFromFormat('Ymd', trim(substr($data_rps, 1591, 8))) : null)
      ->setLote(trim(substr($data_rps, 1599, 15)))
      ->setCodigoObra(trim(substr($data_rps, 1614, 15)))
      ->setAnotacaoTecnica(trim(substr($data_rps, 1629, 15)))
      ->setNfSubstituido(trim(substr($data_rps, 1644, 15)))
      ->setNfSubstituto(trim(substr($data_rps, 1659, 15)))
      ->setDiscriminacaoServicos(trim(substr($data_rps, 1674)));
    $this->setRps($Rps);
  }
}
