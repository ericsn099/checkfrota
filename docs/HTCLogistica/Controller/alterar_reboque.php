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
require_once "../Modelo/Reboque.php";
require_once "../Conn/conexao.php";

$reboque = new Reboque();
$reboque->setId($_POST['id']);
$reboque->setPlacar($_POST['placar']);
$reboque->setTiporeboque_id($_POST['cmtipocarro']);

$id = $reboque->getId();
$placa = $reboque->getPlacar();
$idtipo = $reboque->getTiporeboque_id();

$sql = "UPDATE `reboque` SET `placar`='$placa',`tiporeboque_id`=$idtipo WHERE id =$id";
try {
    if (mysqli_query($conn, $sql)) {
        $message = 'success-update';
        return header("Location: ../Views/alterarReboque.php?id=$id&message=$message");
    } else {
        $message = 'error-update';
        return header("Location: ../Views/alterarReboque.php?id=$id&message=$message");
    }
} catch (Exception $e) {
    $message = 'error-update';
    return header("Location: ../Views/alterarReboque.php?id=$id&message=$message");
}
mysqli_close($conn);