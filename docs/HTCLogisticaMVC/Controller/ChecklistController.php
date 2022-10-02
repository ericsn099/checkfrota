<?php
class ChecklistController
{
    public static function index()
    {

        include 'Model/ChecklistModel.php';

        $model = new ChecklistModel();
        if (isset($_GET['datahora'])) {
            $model->getAllRowsSearch($_GET['datahora']);
            include 'Views/modules/Checklist/listaChecklist.php';
        } else {
            $model->getAllRows();
            include 'Views/modules/Checklist/listaChecklist.php';
        }
    }

    public static function form()
    {
        include 'Model/FrotaModel.php';
        include 'Model/SemiReboqueModel.php';
        include 'Model/MotoristaModel.php';

        $modelFrota = new FrotaModel();
        $modelFrota->getAllRows();

        $modelSemiReboque = new SemiReboqueModel();
        $modelSemiReboque->getAllRows();

        $modelMotorista = new MotoristaModel();
        $modelMotorista->getAllRows();
        include 'Views/modules/Checklist/formChecklist.php';
    }

    public static function detalhes()
    {
        include 'Model/ChecklistModel.php';

        $model = new ChecklistModel();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);
        }
        include 'Views/modules/Checklist/detalhesChecklist.php';
    }

    public static function save()
    {
        include 'Model/ChecklistModel.php';
        date_default_timezone_set("America/Manaus");
        $model = new ChecklistModel();

        $model->datahora = date("y-m-d H:i:s");
        $model->id_frota = $_POST['cmplaca'];
        $model->id_motorista = $_POST['cmmotorista'];
        $model->id_reboque = $_POST['cmreboque'];
        $model->quilometragem = $_POST['quilometragem'];
        $model->extintor = $_POST['extintor'];
        $model->luz_de_freio = $_POST['luz_de_freio'];
        $model->piscas_direita = $_POST['piscas_direita'];
        $model->piscas_esquerda = $_POST['piscas_esquerda'];
        $model->giroflex = $_POST['giroflex'];
        $model->piscas_alerta = $_POST['piscas_alerta'];
        $model->limpador_de_parabrisas = $_POST['limpador_de_parabrisas'];
        $model->higiene_interna = $_POST['higiene_interna'];
        $model->calibragem_dos_pneus = $_POST['calibragem_dos_pneus'];
        $model->cartao_de_pedagio = $_POST['cartao_de_pedagio'];
        $model->lanternas_dianteiras_da_esquerda = $_POST['lanternas_dianteiras_da_esquerda'];
        $model->lanternas_dianteiras_da_direita = $_POST['lanternas_dianteiras_da_direita'];
        $model->lanternas_traseira_da_direita = $_POST['lanternas_traseira_da_direita'];
        $model->lanternas_traseira_da_esquerda = $_POST['lanternas_traseira_da_esquerda'];
        $model->habilitacao = $_POST['habilitacao'];
        $model->estado_dos_pneus = $_POST['estado_dos_pneus'];
        $model->batida_lateral_direita = $_POST['batida_lateral_direita'];
        $model->batida_lateral_esquerda = $_POST['batida_lateral_esquerda'];
        $model->batido_dianteiro = $_POST['batido_dianteiro'];
        $model->batido_traseiro = $_POST['batido_traseiro'];
        $model->boleto = $_POST['boleto'];
        $model->cracha = $_POST['cracha'];
        $model->capacete = $_POST['capacete'];
        $model->bota = $_POST['bota'];
        $model->colete = $_POST['colete'];
        $model->bicos = $_POST['bicos'];
        $model->obs = $_POST['obs'];
        $model->sig = $_POST['sig'];
        $model->foto = $_POST['fotoV'];

        $obj = $model->save();
        if ($obj === true) {
            header('location: /checklist/form?message=success-create');
        } else if ($obj === false) {
            header('location: /checklist/form?message=error-create');
        }
    }
}
