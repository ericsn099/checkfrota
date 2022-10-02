<?php
class MotoristaDao
{

    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=id19509910_dbcheckfrota";

        $this->conexao = new PDO($dsn, 'id19509910_usercheckfrota', 'p@ssCheckFr0ta');
    }

    public function insert(MotoristaModel $model)
    {
        $sql = "INSERT INTO motorista(nome,cpf,habilitacao) 
        VALUES (?,?,?)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->habilitacao);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return false;
                exit;
            }
        }
    }

    public function update(MotoristaModel $model)
    {
        $sql = "UPDATE motorista SET nome=?,cpf=?,habilitacao=? WHERE id=? ";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->habilitacao);
        $stmt->bindValue(4, $model->id);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return false;
                exit;
            }
        }
    }

    public function selectSearch(string $search)
    {
        $sql = "SELECT *
        FROM motorista 
        WHERE motorista.nome
        LIKE '%$search%'
        OR motorista.cpf
        LIKE '%$search%' 
        OR motorista.habilitacao
        LIKE '%$search%'
        ORDER BY motorista.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function select()
    {
        $sql = "SELECT *
        FROM motorista 
        ORDER BY motorista.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once "Model/MotoristaModel.php";

        $sql = "SELECT *
        FROM motorista 
        WHERE motorista.id = ?
        ORDER BY motorista.nome 
        ASC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("MotoristaModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM motorista WHERE id = ?";
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
}
