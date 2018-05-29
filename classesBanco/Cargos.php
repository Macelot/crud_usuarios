<?php


require_once 'CrudCargo.php';

class Cargos extends CrudCargo {

    protected $tabela = 'tblCargo';

    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela WHERE tblCargo_id = :id";
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
        $sql = "SELECT * FROM $this->tabela WHERE tblCargo_descricao=$this->nome";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }



    public function insert() {
        $sql = "INSERT INTO $this->tabela (
          tblCargo_descricao
        )
        VALUES (
          :bdpDescricao)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':bdpDescricao', $this->getDescricao());
        return $stm->execute();
    }


    public function update($id) {
        $sql = "UPDATE $this->tabela SET
        tblCargo_descricao = :bdpDescricao,
        tblCargo_versao = :bdpVersao WHERE tblCargo_id = :id";

        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':bdpDescricao', $this->getDescricao());
        $stm->bindParam(':bdpVersao', $this->getVersao());
        return $stm->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE tblCargo_id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }

}
