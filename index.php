<?php
require_once './class/controlTutor.php';
$control = new controlTutor();
$control->login();
$control->cadastro();
include_once './header.php';
?>
<main class="container">
            <div class="row">
                <section class="col-md-4 col-sm-4">
                    <h1 class="text-center">Cadastre-se</h1>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="nome" class="form-control" placeholder="Informe seu nome">
                        </div>

                        <div class="form-group">
                            <input type="tel" name="telefone" class="form-control" placeholder="Seu telefone">
                        </div>

                        <div class="form-group">
                            <input type="mail" name="email" class="form-control" placeholder="Seu e-mail">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary form-control btn-lg"><i class="fa fa-send"></i> Cadastre-se</button>
                        </div>
                    </form>
                </section>
                <section class="col-md-4 col-sm-4">
                    <?php
                    if(isset($control->response)){
                        echo "<p class='alert alert-danger'>". $control->response."</p>";
                    }
                    ?>
                    <h1 class="text-center">Tutor</h1>
                    <p class="text-center">Após ter adquirido o Rastreador do seu Pet, realize o cadastro na plataforma de monitoramento.</br>
                        Não esqueça de cadastrar os dados do seu PET e vinculá-lo ao seu amado bixo de estimação.
                    </p>
                </section>
                <section class="col-md-4 col-sm-4">
                    <h1 class="text-center">Faça Login</h1>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" name="telefone" class="form-control" placeholder="Seu telefone">
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Seu e-mail">
                        </div>
                        <div class="form-group text-center">
                            <button class="form-control btn-lg btn btn-primary"><i class="fa fa-lock"></i> Acessar o Sistema</button>
                        </div>
                    </form>
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