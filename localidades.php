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
        <section class="col-md-12 col-sm-12">
            <h1 class="text-center">Olá: <strong><?php echo $_SESSION['logado']; ?></strong>, seja bem vindo!</h1>
            <?php
            $pet = $pd->buscar($_GET['idPet']);
            if ($pet) {
                ?>
                <strong>Nome do PET: </strong><?= $pet[0]['nomePet'] ?><br/>
                <strong>Ativação do Rastreador: </strong><?= date('d/m/Y', strtotime($pet[0]['data_hora_ativacao'])) ?> as <?= date('H:m', strtotime($pet[0]['data_hora_ativacao'])) ?> <br/>
                <strong>Apelido do rastreador: </strong><?= $pet[0]['apelido'] ?><br/>
                <table class="table table-responsive table-striped">
                    <thead>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    </thead>
                    <?php
                    foreach ($pet as $p => $v) {
                        ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($v['data_hora'])) ?></td>
                            <td><?= date('H:m', strtotime($v['data_hora'])) ?></td>
                            <td><?= $v['latitude'] ?></td>
                            <td><?= $v['longitude'] ?></td>
                        </tr>

                        <?php
                    }
                    echo '</table>';
                    ?>
            </section>
            <section class="col-md-12 col-sm-12">
                <div id="map"></div>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
                <script type="text/javascript" src='demo.js'></script>
            </section>
            <?php
        } else {
            echo '<p class="alert alert-danger">O PET procurado ainda não está sendo rastreado.</p>';
        }
        ?>
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