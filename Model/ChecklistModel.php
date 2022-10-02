<?php
class ChecklistModel
{
    public $id;
    public $nome;
    public $placa;
    public $placar;
    public $datahora;
    public $quilometragem;
    public $extintor;
    public $luz_de_freio;
    public $piscas_direita;
    public $piscas_esquerda;
    public $giroflex;
    public $piscas_alerta;
    public $limpador_de_parabrisas;
    public $higiene_interna;
    public $calibragem_dos_pneus;
    public $cartao_de_pedagio;
    public $lanternas_dianteiras_da_esquerda;
    public $lanternas_dianteiras_da_direita;
    public $lanternas_traseira_da_direita;
    public $lanternas_traseira_da_esquerda;
    public $habilitacao;
    public $estado_dos_pneus;
    public $batida_lateral_direita;
    public $batida_lateral_esquerda;
    public $batido_dianteiro;
    public $batido_traseiro;
    public $boleto;
    public $cracha;
    public $capacete;
    public $bota;
    public $colete;
    public $bicos;
    public $obs;
    public $sig;
    public $foto;
    public $rows;

    public function save()
    {
        include 'DAO/ChecklistDAO.php';
        $dao = new ChecklistDAO();

        if (empty($this->id)) {
            if ($dao->insert($this) === false) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function getAllRowsSearch(string $search)
    {
        include 'DAO/ChecklistDAO.php';
        $dao = new ChecklistDao();
        $obj = $this->rows = $dao->selectSearch($search);
        if($obj){
            return $obj;
        }else{
            return false;
        }
    }

    public function getAllRows()
    {
        include 'DAO/ChecklistDAO.php';

        $dao = new ChecklistDAO();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/ChecklistDAO.php';
        $dao = new ChecklistDAO();

        $obj = $dao->selectById($id);
        if ($obj) {
            return $obj;
        } else {
            return new ChecklistModel();
        }
    }
}
