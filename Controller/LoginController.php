<?php

class LoginController
{
    public static function index()
    {
        include 'Model/LoginModel.php';
        include 'Views/modules/Login/login.php';
    }

    public static function validarLogin()
    {
        include 'Model/LoginModel.php';
        $modelLogin = new LoginModel();

        $Validacao = $modelLogin->validarLogin($_POST['login'], $_POST['senha'], $_POST['tipousuario']);
        if ($Validacao == true) {
            session_start() or die();

            if ($_POST['tipousuario'] == 1) {
                $_SESSION["login"] = $_POST["login"];
                $_SESSION["tipousuario"] = $_POST["tipousuario"];
                header("location: /checklist/form");
            } else if ($_POST['tipousuario'] == 2) {
                $_SESSION["login"] = $_POST["login"];
                $_SESSION["tipousuario"] = $_POST["tipousuario"];
                header("location: /adm");
            }
        } else {
            header("location: /?erro");
        }
    }
}
