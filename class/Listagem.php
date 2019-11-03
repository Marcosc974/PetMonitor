<?php

class Listagem {
    public function listarTipo() {
        try {
            $sql = "SELECT * FROM tipo";
            $stm = Conexao::conectar()->query($sql);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function listargenero() {
        try {
            $sql = "SELECT * FROM genero";
            $stm = Conexao::conectar()->query($sql);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
