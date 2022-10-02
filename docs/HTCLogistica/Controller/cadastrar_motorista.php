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
require_once "../Modelo/Motorista.php";
require_once "../Conn/conexao.php";

$motorista = new Motorista();
$motorista->setNome($_POST['nome']);
$motorista->setCpf($_POST['cpf']);
$motorista->setHabilitacao($_POST['habilitacao']);

$nome = $motorista->getNome();
$cpf = $motorista->getCpf();
$habilitacao = $motorista->getHabilitacao();

$sql = "INSERT INTO `motorista`(`nome`, `cpf`,`habilitacao`) 
VALUES ('$nome','$cpf','$habilitacao')";

try {
    if (mysqli_query($conn, $sql)) {
        $message = 'success-create';
        return header("Location: ../Views/cadMotorista.php?message=$message");
    } else {
        $message = 'error-create';
        return header("Location: ../Views/cadMotorista.php?message=$message");
    }
} catch (Exception $e) {
    $message = 'error-create';
    return header("Location: ../Views/cadMotorista.php?message=$message");
}
mysqli_close($conn);
