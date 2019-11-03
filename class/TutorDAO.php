<?php

require_once'Conexao.php';

Class TutorDAO {

    public function salvar(Tutor $u) {
        try {
            $sql = "INSERT INTO tutor(nomeTutor,telefone,email) VALUES (?,?,?)";
            $stm = Conexao::conectar()->prepare($sql);
            
            $stm->bindValue(1, $u->getNomeTutor());
            $stm->bindValue(2, $u->getTelefone());
            $stm->bindValue(3, $u->getUemail());
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM tutor";
            $stm = Conexao::conectar()->query($sql);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(Tutor $u) {
        try {
            $sql = "UPDATE tutor SET nomeTutor=?, telefone=?, email=? WHERE idtutor=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getNomeTutor());
            $stm->bindValue(2, $u->getTelefone());
            $stm->bindValue(3, $u->getUemail());
            $stm->bindValue(4, $u->getIdTutor());
            $stm->execute();

            return "Dados Atualizados Com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscar(Tutor $u) {
        try {
            $sql = "SELECT * FROM tutor WHERE idtutor=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getIdUser());
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchObject();
                return $result;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscarLogin(Tutor $u) {
        $sql = "SELECT * FROM tutor WHERE email=?";
        $stm = Conexao::conectar()->prepare($sql);
        $stm->bindValue(1, $u->getUemail());
        $stm->execute();
        if ($stm->rowCount() > 0) {
            $result = $stm->fetchAll();
            return $result;
        }
        return false;
    }

    
}
