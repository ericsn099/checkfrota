<?php
session_start();

class LoginModel
{
    public $id;
    public $nome;
    public $login;
    public $senha;
    public $tipouser;
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=htc";

        $this->conexao = new PDO($dsn, 'root', '19019407eric@');
    }

    public function validarLogin(string $login, string $senha, string $tipouser)
    {
        include 'DAO/LoginDAO.php ';
        $dao = new LoginDAO();

        $obj = $dao->validarUser($login, $senha, $tipouser);
        if($obj){
            return $obj;
        }else{
            return false;
        }
    }

}
