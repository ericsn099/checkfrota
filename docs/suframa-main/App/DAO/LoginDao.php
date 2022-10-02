<?php
class LoginDao
{
    private $conexao;

    public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

		$this->conexao = new PDO($dsn, 'root', '19019407eric@');
		
	}

    public function validarUser($login, $senha, $tipouser)
    {
        include_once "Model/LoginModel.php";

        $sql = "SELECT id, login, senha, tipouser 
        FROM funcionario 
        WHERE login = ? 
        AND senha=? 
        AND tipouser=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $login);
        $stmt->bindValue(2, $senha);
        $stmt->bindValue(3, $tipouser);
        $stmt->execute();

        return $stmt->fetchObject("LoginModel");
    }

	public function selectByLogin(string $login)
    {
        include_once "Model/LoginModel.php";

        $sql = "SELECT * 
        FROM funcionario 
        WHERE login = ? 
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $login);
        $stmt->execute();

		return $stmt->fetchObject("LoginModel");

    }
}
