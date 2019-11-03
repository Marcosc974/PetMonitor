<?php
session_start();
require_once './class/controlTutor.php';
require_once './class/PetDAO.php';
require_once './class/controlRastreador.php';
require_once './class/RastreadorDAO.php';
$rdao = new RastreadorDAO();
$cr = new controlRastreador();
$pd = new PetDAO();
$ct = new controlTutor();
$ct->verifySession();
$cr->rastrear();
include_once './header.php';
include_once './navegacao.php';
?>
<main class="container">
    <div class="row">
        <section class="col-md-4 col-sm-4">
            <h1 class="text-center">Olá: <strong><?php echo $_SESSION['logado']; ?></strong>, seja bem vindo!</h1>
            <?php
            if ($cr->response) {
                echo "<p class='alert alert-info'>" . $cr->response . "</p>";
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <input type="text" name="apelido" class="form-control" placeholder="Apelido do rastreador" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="pet" required>
                        <option disabled selected>Escolha o PET</option>
                        <?php
                        foreach ($pd->buscarPet($_SESSION['idtutor']) as $pet) {
                            if (!$rdao->verificarRastreamento($pet['idPet'])) {
                                ?>
                                <option value="<?= $pet['idPet'] ?>"><?= $pet['nomePet'] ?> </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary form-control btn-lg"><i class="fa fa-map"></i> Começar o rastreamento</button>
                </div>
            </form>
        </section>
        
        <section class="col-md-8 col-sm-8 alert alert-warning">
            <h1 class="text-center">Vamos Começar a rastrear o seu PET?</h1>
            <p class="text-center">Para começar a restrear o seu PET certifique-se de que ele já está com
                o rastreador, em seguida vincule o PET cadastrado ao rastreador, e porfim o seu PET já estará sendo rastreado pelo nosso sistema.</p>
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