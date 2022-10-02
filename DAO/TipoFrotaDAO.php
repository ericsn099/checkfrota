<?php
class TipoFrotaDao
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

    public function insert(TipoFrotaModel $model)
    {
        $sql = "INSERT INTO tipocaminhao(nome) 
        VALUES (?)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return false;
                exit;
            }
        }
    }

    public function update(TipoFrotaModel $model)
    {
        $sql = "UPDATE tipocaminhao SET nome=? WHERE id=? ";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->id);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return false;
                exit;
            }
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM tipocaminhao WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return false;
            }
        }
    }

    public function select()
    {
        $sql = "SELECT *
        FROM tipocaminhao 
        ORDER BY tipocaminhao.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectSearch(string $search)
    {
        $sql = "SELECT *
        FROM tipocaminhao 
        WHERE tipocaminhao.nome
        LIKE '%$search%'
        ORDER BY tipocaminhao.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once "Model/TipoFrotaModel.php";

        $sql = "SELECT *
        FROM tipocaminhao 
        WHERE tipocaminhao.id = ?
        ORDER BY tipocaminhao.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("TipoFrotaModel");
    }
}
