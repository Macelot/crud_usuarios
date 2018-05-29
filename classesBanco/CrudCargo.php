<?php

require_once 'DB.php';

abstract class CrudCargo extends DB {

    protected $tabela;
    public $descricao;
    public $versao;
    public $dataCadastro;
    public $dataAlteracao;

    /**
     * Get the value of Tabela
     *
     * @return mixed
     */
    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * Set the value of Tabela
     *
     * @param mixed tabela
     *
     * @return self
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;

        return $this;
    }

    /**
     * Get the value of Descricao
     *
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of Descricao
     *
     * @param mixed descricao
     *
     * @return self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of Versao
     *
     * @return mixed
     */
    public function getVersao()
    {
        return $this->versao;
    }

    /**
     * Set the value of Versao
     *
     * @param mixed versao
     *
     * @return self
     */
    public function setVersao($versao)
    {
        $this->versao = $versao;

        return $this;
    }

    /**
     * Get the value of Data Cadastro
     *
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set the value of Data Cadastro
     *
     * @param mixed dataCadastro
     *
     * @return self
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get the value of Data Alteracao
     *
     * @return mixed
     */
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }

    /**
     * Set the value of Data Alteracao
     *
     * @param mixed dataAlteracao
     *
     * @return self
     */
    public function setDataAlteracao($dataAlteracao)
    {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }

}
