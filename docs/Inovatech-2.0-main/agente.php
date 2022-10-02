<?php
session_start() or die('A sessão não pode ser iniciada');
include "conexao.php";
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
   simplesmente não fazer o login e digitar na barra de endereço do seu navegador
   o caminho para a página principal do site (sistema), burlando assim a obrigação de
   fazer um login, com isso se ele não estiver feito o login não será criado a session,
   então ao verificar que a session não existe a página redireciona o mesmo
   para a index.php.*/
if ((!isset($_SESSION['login']))) {
    header('location:index.php');
    exit;
}


$SQL = "SELECT * FROM agente WHERE login = '" . $_SESSION['login'] . "'";
$dados = mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
$linha = mysqli_fetch_assoc($dados);
?>

<form class="form" method="POST" action="update_agente.php">

    NOME <input type="text" placeholder="Nome" name="nome" value="<?php echo $linha["nome"]; ?>" required> <br>
    LOGIN <input type="text" placeholder="Login" name="login" value="<?php echo $linha["login"]; ?>" required> <br>
    SENHA <input type="password" placeholder="Senha" name="senha" value="<?php echo $linha["senha"]; ?>" required> <br>

    <button type="submit">Alterar</button>
    <a href="index.php">Voltar</a>
    <br>
    <br>
</form>
<form action="excluir_agente.php" method="POST">
    <button type="submit">Excluir conta</button>
</form>