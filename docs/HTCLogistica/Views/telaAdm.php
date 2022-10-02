<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 1) {
    header('location: ../index.php');
    session_destroy();
    exit;
}
require_once "../Conn/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleTelaAdm.css" />
    <title>ADMINISTRADOR</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-button">
                <button id="cadReboque" class="frota" onclick="window.location.href = 'cadReboque.php'">CADASTRAR SEMI REBOQUE</button>
                <button id="cadFrota" class="frota" onclick="window.location.href = 'cadFrota.php'">CADASTRAR FROTA</button>
                <button id="cadMotorista" class="frota" onclick="window.location.href = 'cadMotorista.php'">CADASTRAR MOTORISTA</button>
                <button id="exibirReboques" class="frota" onclick="window.location.href = 'exibirReboques.php'">EXIBIR SEMI REBOQUES</button>
                <button id="exibirFrotas" class="frota" onclick="window.location.href = 'exibirFrotas.php'">EXIBIR FROTAS</button>
                <button id="exibirMotoristas" class="frota" onclick="window.location.href = 'exibirMotoristas.php'">EXIBIR MOTORISTAS</button>
                <button id="relatorio" class="frota" onclick="window.location.href = 'relatorio.php'">RELAT&Oacute;RIOS</button>
                <button id="sair" class="sair" onclick="window.location.href = '../Controller/sair.php'">SAIR</button>
            </div>
        </div>
    </div>
</body>

</html>