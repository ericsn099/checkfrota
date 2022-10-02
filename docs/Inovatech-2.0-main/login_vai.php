<?php
// Conexão com o banco de dados	
// Inicia sessões
session_start() or die('A sessão não pode ser iniciada');
require "./conexao.php";
// Recupera o login
$login = $_POST["login"];
$senha = $_POST["senha"];

// Usuário não forneceu a senha ou o login
if (!$_POST["login"] || !$_POST["senha"]) {
	echo "Você deve digitar sua senha e login!";
	exit;
}

$SQL = "SELECT id, login, senha FROM agente WHERE login = '" . $_POST["login"] . "'";
$result_id = mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if ($total) {
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = mysqli_fetch_array($result_id);
	// Agora verifica a senha
	if ($_POST["senha"] == $dados["senha"]) {
		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
		$_SESSION["login"] = $_POST["login"];
		$_SESSION["id"] = $dados["id"];
		header("Location: ocorrencia.php");
		exit;
	}
	// Senha inválida
	else {
		echo "senha invalido";
		exit;
	}
}
// Login inválido
else {
	echo "login invalido";
	exit;
}
?>