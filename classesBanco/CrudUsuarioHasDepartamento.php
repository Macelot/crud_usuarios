<?php

require_once 'DB.php';

abstract class CrudUsuarioHasDepartamento extends DB {

    protected $tabela;
    public $usuario;
    public $departamento;

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
     * Get the value of Usuario
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @param mixed usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }



    /**
     * Get the value of Departamento
     *
     * @return mixed
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set the value of Departamento
     *
     * @param mixed departamento
     *
     * @return self
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

}
