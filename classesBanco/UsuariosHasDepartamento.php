<?php

require_once 'CrudUsuarioHasDepartamento.php';

class UsuariosHasDepartamento extends CrudUsuarioHasDepartamento {
    protected $tabela = 'tblUsuario_has_tblDepartamento';

    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    public function insert() {
        $sql = "INSERT INTO $this->tabela (
          tblUsuario_tblUsuario_id,
          tblDepartamento_tblDepartamento_id
        )
        VALUES (
          :bdpUsuario,
          :bdpDepartamento)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':bdpUsuario', $this->usuario);
        $stm->bindParam(':bdpDepartamento', $this->departamento);
        return $stm->execute();
    }

}
