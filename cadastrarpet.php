<?php
session_start();
require_once './class/controlTutor.php';
require_once './class/controlPet.php';
require_once './class/PetDAO.php';
require_once './class/Listagem.php';
$pd = new PetDAO();
$ct = new controlTutor();
$l = new Listagem();
$cp = new controlPet();
$cp->salvarPet();
$ct->verifySession();
include_once './header.php';
include_once './navegacao.php';
?>
<main class="container">
    <div class="row">
        <section class="col-md-8 col-sm-8">
            <h1 class="text-center">Olá: <strong><?php echo $_SESSION['logado']; ?></strong>, seja bem vindo!</h1>
            <h3 class="text-center">Para iniciarmos, cadastre o set PET</h3>
            <?php
            if (isset($cp->response)) {
                echo "<p class='alert alert-info'>".$cp->response."</p>";
            }
            ?>
            <form method="POST">
                <input type="hidden" name="tutor" value="<?=$_SESSION['idtutor']?>">
                <div class="form-group">
                    <input type="text" name="nome" class="form-control" placeholder="Nome do PET">
                </div>
                <div class="form-group">
                    <input type="number" maxlength="8" name="registro" class="form-control" placeholder="Número de registro do PET">
                </div>
                <div class="form-group">
                    <input type="number" name="idade" class="form-control" placeholder="Idade em meses">
                </div>

                <div class="form-group">
                    <select class="form-control" name="genero">
                        <option disabled selected>Sexo do PET</option>
                        <?php
                        foreach ($l->listargenero() as $g) {
                            ?>
                            <option value="<?= $g['idGenero'] ?>"><?= $g['descricaoGenero'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="tipo">
                        <option disabled selected>Espécie do PET</option>
                        <?php
                        foreach ($l->listarTipo() as $e) {
                            ?>
                            <option value="<?= $e['idTipo'] ?>"><?= $e['descricaoTipo'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary form-control btn-lg"><i class="fa fa-save"></i> Cadastrar PET</button>
                </div>
            </form>
        </section>
        <section class="col-md-4 col-sm-4 alert alert-info">
            <h1 class="text-center">Tutor</h1>
            <p class="text-center">Você pode cadastrar quantos PET's quiser e possuir no entanto,
                lembre-se, eles só serão rastreados após você vincular o cadastro dele a um rastreador.</p>
        </section>

    </div>
</main>
<br/>
<br/>
<br/>
<?php
include_once './footer.php';
?>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>