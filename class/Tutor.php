<?php

class Tutor {

    private $idTutor;
    private $nomeTutor;
    private $uemail;
    private $telefone;

    function getIdTutor() {
        return $this->idTutor;
    }

    function getNomeTutor() {
        return $this->nomeTutor;
    }

    function getUemail() {
        return $this->uemail;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setIdTutor($idTutor) {
        $this->idTutor = $idTutor;
    }

    function setNomeTutor($nomeTutor) {
        $this->nomeTutor = $nomeTutor;
    }

    function setUemail($uemail) {
        $this->uemail = $uemail;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

}
