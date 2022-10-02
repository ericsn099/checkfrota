<?php
class LoginDao
{
    private $conexao;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost:3306;dbname=htc";
            $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $this->conexao = new PDO($dsn, 'root', '19019407eric@', $opcoes);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
