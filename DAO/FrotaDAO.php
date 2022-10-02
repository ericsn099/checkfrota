<?php
class FrotaDao
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

    public function insert(FrotaModel $model)
    {
        $sql = "INSERT INTO frota(placa,id_tipocaminhao) 
        VALUES (?,?)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->placa);
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

    public function update(FrotaModel $model)
    {

        $sql = "UPDATE frota SET placa=?,id_tipocaminhao=? WHERE id=? ";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->placa);
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
        $sql = "DELETE FROM frota WHERE id = ?";
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
        $sql = "SELECT frota.id, frota.placa, tipocaminhao.nome
        FROM frota, tipocaminhao 
        WHERE frota.id_tipocaminhao = tipocaminhao.id
        ORDER BY frota.placa 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectSearch(string $search)
    {
        $sql = "SELECT frota.id, frota.placa, tipocaminhao.nome
        FROM frota, tipocaminhao 
        WHERE frota.id_tipocaminhao = tipocaminhao.id
        AND frota.placa
        LIKE '%$search%'
        ORDER BY frota.placa 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once "Model/FrotaModel.php";

        $sql = "SELECT frota.id, frota.placa, tipocaminhao.nome
        FROM frota, tipocaminhao 
        WHERE frota.id_tipocaminhao = tipocaminhao.id
        AND frota.id = ?
        ORDER BY frota.placa 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("FrotaModel");
    }
}
