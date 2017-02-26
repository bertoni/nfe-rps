<?php
/**
 * File that brings the Importacao class
 *
 * PHP Version 5.5.9
 *
 * @category Entity
 * @package  Nfe
 * @name     Importacao
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */

namespace NfeBundle\Entity;

/**
 * Importacao class
 *
 * @category Entity
 * @package  Nfe
 * @author   Arnaldo Bertoni <arnaldo.bertoni01@fatec.sp.gov.br>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://br.linkedin.com/in/abertoni
 */
class Importacao
{
    /**
     * @var integer
     */
    protected $id_importacao;
    /**
     * @var DateTime
     */
    protected $data_importacao;
    /**
     * @var string
     */
    protected $nome_arquivo;
    /**
     * @var string
     */
    protected $log;

    /**
     * Get idImportacao
     *
     * @return integer
     */
    public function getIdImportacao()
    {
        return $this->id_importacao;
    }

    /**
     * Set dataImportacao
     *
     * @param DateTime $dataImportacao
     *
     * @return Importacao
     */
    public function setDataImportacao(\DateTime $dataImportacao)
    {
        $this->data_importacao = $dataImportacao;

        return $this;
    }

    /**
     * Get dataImportacao
     *
     * @return DateTime
     */
    public function getDataImportacao()
    {
        return $this->data_importacao;
    }

    /**
     * Set nomeArquivo
     *
     * @param string $nomeArquivo
     *
     * @return Importacao
     */
    public function setNomeArquivo($nomeArquivo)
    {
        if (is_null($nomeArquivo) || empty($nomeArquivo)) {
            throw new \Exception('Nome do arquivo não informado');
        }
        if (strlen($nomeArquivo) > 100) {
            throw new \Exception('Nome do arquivo ultrapassa os 100 caracteres');
        }
        $this->nome_arquivo = $nomeArquivo;

        return $this;
    }

    /**
     * Get nomeArquivo
     *
     * @return string
     */
    public function getNomeArquivo()
    {
        return $this->nome_arquivo;
    }

    /**
     * Set log
     *
     * @param string $log
     *
     * @return Importacao
     */
    public function setLog($log)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get log
     *
     * @return string
     */
    public function getLog()
    {
        return $this->log;
    }
}
