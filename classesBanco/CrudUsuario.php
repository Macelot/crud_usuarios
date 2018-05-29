<?php

require_once 'DB.php';

abstract class CrudUsuario extends DB {

    protected $tabela;
    public $nome;
    public $email;
    public $telefone;
    public $senha;
    public $salario;
    public $cargo;
    public $foto;
    public $idGerente;
    public $obs;
    public $sexo;
    public $dias;
    public $raca;
    public $versao;
    public $dataCadastro;
    public $usuarioCadastro;
    public $dataAlteracao;
    public $usuarioAlteracao;


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
     * Get the value of Nome
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of Nome
     *
     * @param mixed nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Senha
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of Senha
     *
     * @param mixed senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of Salario
     *
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set the value of Salario
     *
     * @param mixed salario
     *
     * @return self
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get the value of Cargo
     *
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set the value of Cargo
     *
     * @param mixed cargo
     *
     * @return self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get the value of Foto
     *
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of Foto
     *
     * @param mixed foto
     *
     * @return self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get the value of Id Departamento
     *
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Set the value of Id Departamento
     *
     * @param mixed idDepartamento
     *
     * @return self
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get the value of Id Gerente
     *
     * @return mixed
     */
    public function getIdGerente()
    {
        return $this->idGerente;
    }

    /**
     * Set the value of Id Gerente
     *
     * @param mixed idGerente
     *
     * @return self
     */
    public function setIdGerente($idGerente)
    {
        $this->idGerente = $idGerente;

        return $this;
    }

    /**
     * Get the value of Obs
     *
     * @return mixed
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set the value of Obs
     *
     * @param mixed obs
     *
     * @return self
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get the value of Sexo
     *
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of Sexo
     *
     * @param mixed sexo
     *
     * @return self
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of Dias
     *
     * @return mixed
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set the value of Dias
     *
     * @param mixed dias
     *
     * @return self
     */
    public function setDias($dias)
    {
        $this->dias = $dias;

        return $this;
    }

    /**
     * Get the value of Raca
     *
     * @return mixed
     */
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * Set the value of Raca
     *
     * @param mixed raca
     *
     * @return self
     */
    public function setRaca($raca)
    {
        $this->raca = $raca;

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



    /**
     * Get the value of Telefone
     *
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of Telefone
     *
     * @param mixed telefone
     *
     * @return self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of Usuario Cadastro
     *
     * @return mixed
     */
    public function getUsuarioCadastro()
    {
        return $this->usuarioCadastro;
    }

    /**
     * Set the value of Usuario Cadastro
     *
     * @param mixed usuarioCadastro
     *
     * @return self
     */
    public function setUsuarioCadastro($usuarioCadastro)
    {
        $this->usuarioCadastro = $usuarioCadastro;

        return $this;
    }

    /**
     * Get the value of Usuario Alteracao
     *
     * @return mixed
     */
    public function getUsuarioAlteracao()
    {
        return $this->usuarioAlteracao;
    }

    /**
     * Set the value of Usuario Alteracao
     *
     * @param mixed usuarioAlteracao
     *
     * @return self
     */
    public function setUsuarioAlteracao($usuarioAlteracao)
    {
        $this->usuarioAlteracao = $usuarioAlteracao;

        return $this;
    }

}
