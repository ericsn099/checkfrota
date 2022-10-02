<?php
class FrotaController
{

    public static function index()
    {
        include 'Model/FrotaModel.php';
        $model = new FrotaModel();

        if (isset($_GET['placa'])) {
            $model->getAllRowsSearch($_GET['placa']);
            include 'Views/modules/Frota/listaFrota.php';
        } else {
            $model->getAllRows();
            include 'Views/modules/Frota/listaFrota.php';
        }
    }

    public static function form()
    {
        include 'Model/FrotaModel.php';
        include 'Model/TipoFrotaModel.php';

        $model = new FrotaModel();
        $modelTipoFrota = new TipoFrotaModel();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);
        }
        $modelTipoFrota->getAllRows();
        include 'Views/modules/Frota/formFrota.php';
    }

    public static function save()
    {
        include 'Model/FrotaModel.php';

        $model = new FrotaModel();

        $model->id = $_POST['id'];
        $model->placa = $_POST['placa'];
        $model->cmtipocarro = $_POST['cmtipocarro'];

        $obj = $model->save();
        if ($obj === true) {
            header('location: /frota/form?message=success-create');
        } else if ($obj === false) {
            header('location: /frota/form?message=error-create');
        }
    }

    public static function delete()
    {
        include 'Model/FrotaModel.php';
        $modelFrota = new FrotaModel();

        $obj = $modelFrota->delete((int) $_GET['id']);

        if ($obj === true) {
            header('location: /frota?message=success-delete');
        } else if ($obj === false) {
            header('location: /frota?message=error-delete');
        }
    }
}
