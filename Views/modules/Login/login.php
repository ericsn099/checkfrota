<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLogin.css" />
    <title>HTC LOG&Iacute;STICA</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-form">
                <div class="form-img">
                    <div class="img-area">
                        <img src="css/img/logo1.png">
                    </div>
                </div>
                <div class="form">
                    <!-- INICIO FORMULARIO-->
                    <form class="form" action="/login/validarLogin" method="POST">
                        <?php $msg = null;
                        if (isset($_GET["erro"])) { ?>
                            <div class="alert-danger" role="alert">
                                <?php echo "Acesso Inválido" ?>
                                <!-- RETORNA MENSAGEM DE ERRO SE A SENHA, USUÁRIO OU TIPO DE USUÁRIO ESTIVER INCORRETA-->
                            </div>
                        <?php } ?>
                        <label class="label-input">
                            <i class="fa-solid fa-user  icon-modify"></i>
                            <input type="text" placeholder="Usu&aacute;rio" name="login" require>
                        </label>

                        <label class="label-input">
                            <i class="fa-solid fa-lock icon-modify"></i>
                            <input type="password" placeholder="Senha" name="senha" require>
                        </label>

                        <!-- DIV CONTAINER PARA AS OPÇÕES RADIOS-->
                        <div class="container-radios">
                            <div class="container-question">
                                <input type="radio" name="tipousuario" value="1" required>
                                <label for="agp">AGP</label>
                            </div>
                            <div class="container-question">
                                <input type="radio" name="tipousuario" value="2" required>
                                <label for="adm">ADMINISTRADOR</label>
                            </div>
                        </div>
                        <div class="botoes">
                            <button class="btn btn-form" id="entrar">Entrar</button>
                        </div>
                    </form>
                    <!-- FIM FORMULARIO-->
                </div>
                <div class="espaco">

                </div>
            </div>
        </div>
    </div>
</body>

</html>