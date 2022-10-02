<?php
class LoginModel
{
    public $id;
    public $nome;
    public $avatar;
    public $cpf;
    public $login;
    public $senha;
    public $tipouser;
    private $conexao;

    public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

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

	public function getByLogin(string $login)
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();

        $obj = $dao->selectByLogin($login);
        if($obj){
            return $obj;
        }
    }

}
