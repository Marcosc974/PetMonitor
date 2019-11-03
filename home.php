<?php
session_start();
require_once './class/controlTutor.php';
require_once './class/PetDAO.php';
$pd = new PetDAO();
$ct = new controlTutor();
$ct->verifySession();
include_once './header.php';
include_once './navegacao.php';
?>
<main class="container">
    <div class="row">
        <section class="col-md-8 col-sm-8">
            <h1 class="text-center">Olá: <strong><?php echo $_SESSION['logado']; ?></strong>, seja bem vindo!</h1>
            <?php
            if ($pd->verificarPet($_SESSION['idtutor'])) {
                ?>
                <table class="table table-responsive table-striped">
                    <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Registro</th>
                    <th>Gênero</th>
                    <th>Tipo</th>
                    <th>Ação</th>
                    </thead>
                    <?php
                    foreach ($pd->verificarPet($_SESSION['idtutor']) as $v) {
                        ?>
                        <tr>
                            <td><?= $v['idpet'] ?></td>
                            <td><?= $v['nomePet'] ?></td>
                            <td><?= $v['numRegistro'] ?></td>
                            <td><?= $v['descricaoGenero'] ?></td>
                            <td><?= $v['descricaoTipo'] ?></td>
                            <td><a href="localidades.php?idPet=<?= $v['idpet'] ?>" class="btn btn-warning"><i class="fa fa-map"></i> Timeline</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            } else {
                ?>
                <p class="alert alert-warning">Você ainda não cadastrou nenhum pet.</p>
                <?php
            }
            ?>
        </section>
        <section class="col-md-4 col-sm-4 alert alert-info">
            <h1 class="text-center">Tutor</h1>
            <p class="text-center">Utilize a tabela ao lado para ver os PET's cadastrados.</br>
                Você pode Clicar em <small class="btn btn-warning btn-xs"><i class="fa fa-map"></i> Timeline</small>, para visulizar todos os pontos onde o seu PET esteve.
            </p>
        </section>

    </div>
</main>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php
include_once './footer.php';
?>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>