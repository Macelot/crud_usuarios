<?php


require_once 'CrudDepartamento.php';

class Departamentos extends CrudDepartamento {

    protected $tabela = 'tblDepartamento';

    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela WHERE tblDepartamento_id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findOne($nome) {
        $sql = "SELECT * FROM $this->tabela WHERE tblDepartamento_descricao=$this->nome";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findAllDepFomUser($id) {
        $sql = "SELECT tu.tblUsuario_id as idU, ".
        "td.tblDepartamento_descricao, ".
        "td.tblDepartamento_id FROM tblUsuario as tu ".
        "LEFT JOIN tblUsuario_has_tblDepartamento tud ON ".
        "tu.tblUsuario_id = tud.tblUsuario_tblUsuario_id ".
        "LEFT JOIN tblDepartamento as td ON ".
        "tud.tblDepartamento_tblDepartamento_id=td.tblDepartamento_id ".
        "WHERE tu.tblUsuario_id = ".$id;
        $stm = DB::prepare($sql);
        $stm->execute();
        //var_dump($stm);
        //echo " coloca ". $id;
        return $stm->fetchAll();
    }


    public function insert() {
        $sql = "INSERT INTO $this->tabela (
          tblDepartamento_descricao
        )
        VALUES (
          :bdpDescricao)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':bdpDescricao', $this->getDescricao());
        return $stm->execute();
    }


    public function update($id) {
        $sql = "UPDATE $this->tabela SET
        tblDepartamento_descricao = :bdpDescricao,
        tblDepartamento_versao = :bdpVersao WHERE tblDepartamento_id = :id";

        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':bdpDescricao', $this->getDescricao());
        $stm->bindParam(':bdpVersao', $this->getVersao());
        return $stm->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE tblDepartamento_id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }

}
