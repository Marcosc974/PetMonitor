<?php
require_once 'Pet.php';
require_once 'PetDAO.php';
class controlPet {
    var $response;
    
    public function salvarPet() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['registro']) && isset($_POST['nome'])) {
            $u = new Pet();
            $ud = new PetDAO();
            $u->setNomePet($_POST['nome']);
            $u->setNumRegistro($_POST['registro']);
            $u->setIdade($_POST['idade']);
            $u->setTipo($_POST['tipo']);
            $u->setGenero($_POST['genero']);
            $u->setTutor($_POST['tutor']);

            if ($ud->salvar($u)) {
                return $this->response = "PET cadastrado com sucesso!";
            } else {
                return $this->response = "Erro ao Cadastrar, tente novamente";
            }
        }
    }
}
