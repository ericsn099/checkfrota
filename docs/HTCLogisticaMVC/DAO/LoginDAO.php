<?php
class LoginDao
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=id19509910_dbcheckfrota";

        $this->conexao = new PDO($dsn, 'id19509910_usercheckfrota', 'p@ssCheckFr0ta');
    }

    public function validarUser($login, $senha, $tipouser)
    {
        include_once "Model/LoginModel.php";

        $sql = "SELECT id, login, senha, tipouser 
        FROM usuario 
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
}
