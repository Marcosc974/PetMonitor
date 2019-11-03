<?php
class Pet {
    var $idPet;
    var $numRegistro;
    var $nomePet;
    var $idade;
    var $tutor;
    var $tipo;
    var $genero;
    function getIdPet() {
        return $this->idPet;
    }
    function getNumRegistro() {
        return $this->numRegistro;
    }
    function getNomePet() {
        return $this->nomePet;
    }
    function getIdade() {
        return $this->idade;
    }
    function getTutor() {
        return $this->tutor;
    }
    function getTipo() {
        return $this->tipo;
    }
    function getGenero() {
        return $this->genero;
    }
    function setIdPet($idPet) {
        $this->idPet = $idPet;
    }
    function setNumRegistro($numRegistro) {
        $this->numRegistro = $numRegistro;
    }
    function setNomePet($nomePet) {
        $this->nomePet = $nomePet;
    }
    function setIdade($idade) {
        $this->idade = $idade;
    }
    function setTutor($tutor) {
        $this->tutor = $tutor;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setGenero($genero) {
        $this->genero = $genero;
    }
}
