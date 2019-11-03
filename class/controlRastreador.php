<?php
require_once 'Rastreador.php';
require_once 'RastreadorDAO.php';
class controlRastreador {
var $response;
    public function rastrear() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['apelido']) && isset($_POST['apelido'])) {
            $u = new Rastreador();
            $ud = new RastreadorDAO();
            $u->setApelido($_POST['apelido']);
            $u->setPet($_POST['pet']);
            if ($ud->salvar($u)) {
                return $this->response = "Rastreamento iniciado com sucesso!";
            } else {
                return $this->response = "Erro ao Rastrear, tente novamente";
            }
        }
    }

}
