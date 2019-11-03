<?php
require_once 'Conexao.php';
class RastreadorDAO {
   public function salvar(Rastreador $u) {
        try {
            $sql = "INSERT INTO rastreador(apelido,Pet_idPet)VALUES (?,?)";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getApelido());
            $stm->bindValue(2, $u->getPet());
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM rastreador";
            $stm = Conexao::conectar()->query($sql);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(Rastreador $u) {
        try {
            $sql = "UPDATE rastreador SET nomeRastreador=?, telefone=?, email=? WHERE idrastreador=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getNomeRastreador());
            $stm->bindValue(2, $u->getTelefone());
            $stm->bindValue(3, $u->getUemail());
            $stm->bindValue(4, $u->getIdRastreador());
            $stm->execute();

            return "Dados Atualizados Com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function buscar(Rastreador $u) {
        try {
            $sql = "SELECT * FROM rastreador WHERE idrastreador=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getIdUser());
            $stm->execute();
            if ($stm->rowCount() > 0) {
                return $stm->fetchAll();
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function verificarRastreamento($pet) {
        try {
            $sql = "SELECT * FROM rastreador WHERE Pet_idPet=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $pet);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
