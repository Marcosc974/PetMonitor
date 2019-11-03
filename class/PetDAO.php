<?php
require_once'Conexao.php';
class PetDAO {

    public function salvar(Pet $u) {
        try {
            $sql = "INSERT INTO pet(numRegistro, nomePet, idade, Tutor_idTutor, Tipo_idTipo, Genero_idGenero) VALUES (?,?,?,?,?,?)";
            $stm = Conexao::conectar()->prepare($sql);

            $stm->bindValue(1, $u->getNumRegistro());
            $stm->bindValue(2, $u->getNomePet());
            $stm->bindValue(3, $u->getIdade());
            $stm->bindValue(4, $u->getTutor());
            $stm->bindValue(5, $u->getTipo());
            $stm->bindValue(6, $u->getGenero());
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function listar() {
        try {
            $sql = "SELECT * FROM pet";
            $stm = Conexao::conectar()->query($sql);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(Pet $u) {
        try {
            $sql = "UPDATE pet SET nomePet=?, telefone=?, email=? WHERE idpet=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u->getNomePet());
            $stm->bindValue(2, $u->getTelefone());
            $stm->bindValue(3, $u->getUemail());
            $stm->bindValue(4, $u->getIdPet());
            $stm->execute();

            return "Dados Atualizados Com sucesso!";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function verificarPet($u) {
        try {
            $sql = "SELECT idpet,numRegistro,nomePet,idade,tutor.nometutor,genero.descricaoGenero,tipo.descricaoTipo FROM pet
                    INNER JOIN tutor ON pet.Tutor_idTutor = tutor.idtutor
                    INNER JOIN tipo ON pet.Tipo_idTipo = tipo.idTipo
                    INNER JOIN genero ON pet.Genero_idGenero = genero.idGenero WHERE Tutor_idTutor=?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll();
                return $result;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function buscarPet($u) {
        try {
            $sql = "SELECT * FROM pet WHERE Tutor_idTutor =?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll();
                return $result;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function buscar($u) {
        try {
            $sql = "SELECT * FROM posicionamento
            INNER JOIN rastreador ON posicionamento.Rastreador_idRastreador = rastreador.idRastreador
            INNER JOIN pet ON rastreador.Pet_idPet = pet.idPet WHERE pet.idPet =?";
            $stm = Conexao::conectar()->prepare($sql);
            $stm->bindValue(1, $u);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $result = $stm->fetchAll();
                return $result;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
