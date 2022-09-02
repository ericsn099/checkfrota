<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
$msg = null;
$tipo = null;
if (isset($_POST['login'])) {
    // Conexão com o banco de dados	
    require "./conexao.php";
    // Recupera os dados
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipousuario"];
    // select no banco de dados
    $SQL = "SELECT id, login, senha, tipouser FROM usuario WHERE login = '" . $_POST["login"] . "' AND senha='" . $_POST["senha"] . "' AND tipouser='" . $_POST["tipousuario"] . "' ";
    $result_id = mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
    $total = mysqli_num_rows($result_id);
    /* Caso o usuário tenha digitado um login válido o número de linhas será 1..
    verifica o tipo de usuário, se é AGP OU ADM e faz o redirecionamento para a página do usuário*/
    if ($tipo == 1) {
        if ($total) {
            // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
            $dados = mysqli_fetch_array($result_id);
            // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["id"] = $dados["id"];
            $_SESSION["tipousuario"] = $_POST["tipousuario"];
            header("Location: telaAgp.php");
            exit;
        }
        // Senha inválida
        else {
            $msg = "Acesso inválido!";
        }
        //verifica o tipo de usuário, se é AGP OU ADM e faz o redirecionamento para a página do usuário
    } else if ($tipo == 2) {
        if ($total) {
            // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
            $dados = mysqli_fetch_array($result_id);
            // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["id"] = $dados["id"];
            $_SESSION["tipousuario"] = $_POST["tipousuario"];
            header("Location: telaAdm.php");
            exit;
        }
        // Senha inválida
        else {
            $msg = "Acesso inválido!";
        }
    } else {
        $msg = "Acesso inválido!";
    }
}
?>
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
                    <form class="form" action="" method="POST">
                        <?php if (!is_null($msg)) { ?>
                            <div class="alert-danger" role="alert">
                                <?php echo $msg ?>
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