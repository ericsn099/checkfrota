<?php
session_start();

class LoginModel
{
    public $id;
    public $nome;
    public $login;
    public $senha;
    public $tipouser;

    public function validarLogin(string $login, string $senha, string $tipouser)
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();

        $obj = $dao->validarUser($login, $senha, $tipouser);
        if($obj){
            return $obj;
        }else{
            return false;
        }
    }

}
