<?php
class TipoSemiReboqueDao
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

    public function insert(TipoSemiReboqueModel $model)
    {
        $sql = "INSERT INTO tiporeboque(nome) 
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

    public function update(TipoSemiReboqueModel $model)
    {
        $sql = "UPDATE tiporeboque SET nome=? WHERE id=? ";
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
        $sql = "DELETE FROM tiporeboque WHERE id = ?";
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
        FROM tiporeboque 
        WHERE id>1
        ORDER BY tiporeboque.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectSearch(string $search)
    {
        $sql = "SELECT *
        FROM tiporeboque 
        WHERE tiporeboque.nome
        LIKE '%$search%'
        AND id>1
        ORDER BY tiporeboque.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once "Model/TipoSemiReboqueModel.php";

        $sql = "SELECT *
        FROM tiporeboque 
        WHERE tiporeboque.id = ?
        ORDER BY tiporeboque.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("TipoSemiReboqueModel");
    }
}
