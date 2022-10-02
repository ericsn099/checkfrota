<?php
class SemiReboqueDao
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
    public function insert(SemiReboqueModel $model)
    {
        $sql = "INSERT INTO reboque(placar,tiporeboque_id) 
        VALUES (?,?)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->placar);
        $stmt->bindValue(2, $model->cmtipocarro);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return false;
                exit;
            }
        }
    }

    public function update(SemiReboqueModel $model)
    {
        $sql = "UPDATE reboque SET placar=?,tiporeboque_id=? WHERE id=? ";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->placar);
        $stmt->bindValue(2, $model->cmtipocarro);
        $stmt->bindValue(3, $model->id);

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
        $sql = "DELETE FROM reboque WHERE id = ?";
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
        $sql = "SELECT reboque.id, reboque.placar, tiporeboque.nome
        FROM reboque, tiporeboque 
        WHERE reboque.tiporeboque_id = tiporeboque.id
        AND reboque.id >1
        ORDER BY reboque.placar 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectSearch(string $search)
    {
        $sql = "SELECT reboque.id, reboque.placar, tiporeboque.nome
        FROM reboque, tiporeboque 
        WHERE reboque.tiporeboque_id = tiporeboque.id
        AND reboque.id > 1 
        AND reboque.placar
        LIKE '%$search%'
        ORDER BY reboque.placar 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once "Model/SemiReboqueModel.php";

        $sql = "SELECT reboque.id, reboque.placar, tiporeboque.nome
        FROM reboque, tiporeboque 
        WHERE reboque.tiporeboque_id = tiporeboque.id
        AND reboque.id = ?
        ORDER BY reboque.placar 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("SemiReboqueModel");
    }
}
