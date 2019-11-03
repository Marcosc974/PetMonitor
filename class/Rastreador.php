<?php

class Rastreador {

    private $idRastreador;
    private $apelido;
    private $dataHora;
    private $pet;

    function getIdRastreador() {
        return $this->idRastreador;
    }

    function getApelido() {
        return $this->apelido;
    }

    function getDataHora() {
        return $this->dataHora;
    }

    function getPet() {
        return $this->pet;
    }

    function setIdRastreador($idRastreador) {
        $this->idRastreador = $idRastreador;
    }

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    function setDataHora($dataHora) {
        $this->dataHora = $dataHora;
    }

    function setPet($pet) {
        $this->pet = $pet;
    }

}
