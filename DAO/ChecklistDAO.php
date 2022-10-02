<?php
class ChecklistDao
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
    public function insert(ChecklistModel $model)
    {
        $sql = "INSERT INTO checklist(id_frota, id_motorista, id_reboque, datahora, quilometragem, extintor, luz_de_freio, piscas_direita, piscas_esquerda, 
        giroflex, piscas_alerta, limpador_de_parabrisas, higiene_interna, calibragem_dos_pneus, cartao_de_pedagio, lanternas_dianteiras_da_esquerda, 
        lanternas_dianteiras_da_direita, lanternas_traseira_da_direita, lanternas_traseira_da_esquerda, habilitacao, estado_dos_pneus,batida_lateral_direita, 
        batida_lateral_esquerda, batido_dianteiro, batido_traseiro, boleto, cracha, capacete, bota, colete, bicos, obs, sig, foto)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_frota);
        $stmt->bindValue(2, $model->id_motorista);
        $stmt->bindValue(3, $model->id_reboque);
        $stmt->bindValue(4, $model->datahora);
        $stmt->bindValue(5, $model->quilometragem);
        $stmt->bindValue(6, $model->extintor);
        $stmt->bindValue(7, $model->luz_de_freio);
        $stmt->bindValue(8, $model->piscas_direita);
        $stmt->bindValue(9, $model->piscas_esquerda);
        $stmt->bindValue(10, $model->giroflex);
        $stmt->bindValue(11, $model->piscas_alerta);
        $stmt->bindValue(12, $model->limpador_de_parabrisas);
        $stmt->bindValue(13, $model->higiene_interna);
        $stmt->bindValue(14, $model->calibragem_dos_pneus);
        $stmt->bindValue(15, $model->cartao_de_pedagio);
        $stmt->bindValue(16, $model->lanternas_dianteiras_da_esquerda);
        $stmt->bindValue(17, $model->lanternas_dianteiras_da_direita);
        $stmt->bindValue(18, $model->lanternas_traseira_da_direita);
        $stmt->bindValue(19, $model->lanternas_traseira_da_esquerda);
        $stmt->bindValue(20, $model->habilitacao);
        $stmt->bindValue(21, $model->estado_dos_pneus);
        $stmt->bindValue(22, $model->batida_lateral_direita);
        $stmt->bindValue(23, $model->batida_lateral_esquerda);
        $stmt->bindValue(24, $model->batido_dianteiro);
        $stmt->bindValue(25, $model->batido_traseiro);
        $stmt->bindValue(26, $model->boleto);
        $stmt->bindValue(27, $model->cracha);
        $stmt->bindValue(28, $model->capacete);
        $stmt->bindValue(29, $model->bota);
        $stmt->bindValue(30, $model->colete);
        $stmt->bindValue(31, $model->bicos);
        $stmt->bindValue(32, $model->obs);
        $stmt->bindValue(33, $model->sig);
        $stmt->bindValue(34, $model->foto);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                return false;
                exit;
            }
        }
    }

    public function select()
    {
        $sql = "SELECT frota.placa, checklist.id, motorista.nome, checklist.datahora, checklist.sig 
        FROM frota, motorista, checklist 
        where checklist.id_frota = frota.id 
        and checklist.id_motorista = motorista.id
        order by checklist.datahora 
        DESC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectSearch(string $search)
    {
        $sql = "SELECT frota.placa, checklist.id, motorista.nome, checklist.datahora, checklist.sig 
        FROM frota, motorista, checklist 
        where checklist.id_frota = frota.id 
        and checklist.id_motorista = motorista.id
        and checklist.datahora LIKE '%$search%'
        order by checklist.datahora 
        DESC;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once "Model/ChecklistModel.php";

        $sql = "SELECT *
                FROM frota, motorista, checklist, reboque
                where checklist.id_frota = frota.id 
                and checklist.id_reboque = reboque.id 
                and checklist.id_motorista = motorista.id 
                and checklist.id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ChecklistModel");
    }
}
