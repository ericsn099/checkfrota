<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 1) {
    header('location:index.php');
    session_destroy();
    exit;
}
$logado = $_SESSION['login'];
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleTelaMotorista.css" />
    <title>CADASTRO DO MOTORISTA</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-form">
                <div class="form-img">
                    <div class="img-area">
                        <img src="css/img/user.png" alt="user">
                    </div>
                </div>
                <form class="form" action="cadastrar_motorista.php" method="post">
                    <label class="label-input">
                        <input type="text" id="nome" placeholder="Nome completo" name="nome" required>
                    </label>
                    <br>
                    <label class="label-input">
                        <input type="number" id="cpf" placeholder="CPF" name="cpf" onkeydown="return FilterInput(event)" onpaste="handlePaste(event)" required>
                    </label>
                    <br>
                    <label class="label-input">
                        <input type="number" id="habilitacao" placeholder="Nº da CNH" name="habilitacao" onkeydown="return FilterInput(event)" onpaste="handlePaste(event)" required>
                    </label>
                    <div class="container-button">
                        <button class="frota" id="cadastrar">CADASTRAR</button>
                    </div>
                </form>
                <div class="container-button">
                    <button class="frota" id="voltar">VOLTAR</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    document.getElementById("voltar").addEventListener("click", voltar);

    function voltar(event) {
        if (event.target.id === "voltar") {
            window.location.href = "telaAdm.php";
        }
    }

    function FilterInput(event) {
        var keyCode = ('which' in event) ? event.which : event.keyCode;

        isNotWanted = (keyCode == 69 || keyCode == 101 || keyCode == 107 || keyCode == 109 || keyCode == 187 || keyCode == 189 || keyCode == 38 || keyCode == 40);
        return !isNotWanted;
    };

    function handlePaste(e) {
        var clipboardData, pastedData;

        // Get pasted data via clipboard API
        clipboardData = e.clipboardData || window.clipboardData;
        pastedData = clipboardData.getData('Text').toUpperCase();

        if (pastedData.indexOf('E') > -1) {
            //alert('found an E');
            e.stopPropagation();
            e.preventDefault();
        }
    };
</script>