<?php
class FuncionarioController
{

	public static function index()
	{
		include 'Model/LoginModel.php';

		$model = new LoginModel();
		$model = $model->getByLogin($_SESSION['login']);
		
		include 'View/modules/Funcionario/PaginaInicial.php';

	}


	public static function save()
	{
		include 'Model/FuncionarioModel.php';

		$model = new FuncionarioModel();

		$arquivo = $_FILES['avatar'];
		if ($arquivo["error"])
			die("falha ao enviar arquivo");

		$pasta = "upload/";
		$nomeDoArquivo = $arquivo['name'];
		$novoNomeDoArquivo = uniqid();
		$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));


		$model->nome = $_POST['nome'];
		$model->cpf = $_POST['cpf'];
		$model->login = $_POST['login'];
		$model->senha = $_POST['senha'];
		$model->cargo_id = $_POST['cargo_id'];
		$model->area_atuacao_id = $_POST['area_atuacao_id'];
		$model->tipouser = $_POST['usuario'];

		$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

		$model->avatar = $nomeDoArquivo;
		$model->path = $path;

		if ($extensao !== "jpg" && $extensao !== "png" && $extensao !== "jpeg" && $extensao !== 'gif')
			die("Tipo de arquivo não aceito");

		move_uploaded_file($arquivo["tmp_name"], $path);

		$model->save();
	}
}
