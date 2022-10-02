<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <title>Suframa</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <form method="POST" action="/login/validarLogin">
                <div class="image-form">
                    <img src="./image/suframa.jpg" />
                </div>
                <?php $msg = null;
                        if (isset($_GET["erro"])) { ?>
                            <div class="alert-danger" role="alert">
                                <?php echo "Acesso Inválido" ?>
                                <!-- RETORNA MENSAGEM DE ERRO SE A SENHA, USUÁRIO OU TIPO DE USUÁRIO ESTIVER INCORRETA-->
                            </div>
                        <?php } ?>
                <div class="input-item">
                    <div class="icon">
                        <i class="fa-sharp fa-solid fa-user"></i>
                    </div>
                    <input type="text" name="login" placeholder="Digite seu usuário" required />
                </div>
                <div class="input-item">
                    <div class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input type="password" name="senha" placeholder="Digite sua senha" required />
                </div>

                <div class="user-type">
                    <div class="type">
                        <input type="radio" value="1" name="usuario" required />
                        <label for="adm">Adminstrador</label>
                    </div>
                    <div class="type">
                        <input type="radio" value="2" name="usuario" required />
                        <label for="user">Usuário</label>
                    </div>
                </div>
                <div class=" entrar">
                    <input type="submit" value="Entrar" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>