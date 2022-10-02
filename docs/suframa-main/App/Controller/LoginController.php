
<?php
session_start() or die;

class LoginController
{

	public static function index()
	{
		include 'View/modules/Login/Login.php';
	}

	public static function validarLogin()
	{
		include 'Model/LoginModel.php';
		$modelLogin = new LoginModel();

		$Validacao = $modelLogin->validarLogin($_POST['login'], $_POST['senha'], $_POST['usuario']);
		if ($Validacao == true) {
			session_start() or die();

			if ($_POST['usuario'] == 1) {
				$_SESSION["login"] = $_POST["login"];
				$_SESSION["usuario"] = $_POST["usuario"];
				header("location: /adm");
			} else if ($_POST['usuario'] == 2) {
				$_SESSION["login"] = $_POST["login"];
				$_SESSION["usuario"] = $_POST["usuario"];
				header("location: /paginaInicial");
			}
		} else {
			header("location: /?erro");
		}
	}


	public static function login()
	{
		include 'Model/LoginModel.php';
	}
}
