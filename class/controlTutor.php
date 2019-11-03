<?php

require_once 'Tutor.php';
require_once 'TutorDAO.php';

class controlTutor {

    var $response;
    var $data;

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['email']) && isset($_POST['email'])) {
            $u = new Tutor();
            $ud = new TutorDAO();
            $u->setUemail(trim($_POST['email']));

            if ($u->getUemail()) {

                $row = $ud->buscarLogin($u);
                if ($row[0]['email'] == $_POST['email']) {
                    session_start();
                    $_SESSION['logado'] = $row[0]['nometutor'];
                    $_SESSION['idtutor'] = $row[0]['idtutor'];
                    header("location:home.php");
                }
                return $this->response = "Login ou senha Inválidos!.";
            }
            return $this->response = "Informações não existentes em nosso banco de dados!";
        }
    }

    public function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['email']) && isset($_POST['nome'])) {
            $u = new Tutor();
            $ud = new TutorDAO();
            $u->setNomeTutor($_POST['nome']);
            $u->setTelefone($_POST['telefone']);
            $u->setUemail($_POST['email']);

            if ($ud->salvar($u)) {
                return $this->response = "Cadastro realizado com sucesso!";
            } else {
                return $this->response = "Erro ao Cadastrar tente novamente";
            }
        }
    }

    public function verifySession() {
        if (!isset($_SESSION['logado'])) {
            session_destroy();
            header("location:index.php");
        } else {
            $this->data = $_SESSION['logado'];
        }
    }

}
