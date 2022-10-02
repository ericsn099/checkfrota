<?php

class TipoFrotaController{

    public static function index()
    {

        include 'Model/TipoFrotaModel.php';

        $modelTipoFrota = new TipoFrotaModel();
        if (isset($_GET['nome'])) {
            $modelTipoFrota->getAllRowsSearch($_GET['nome']);
            include 'Views/modules/TipoFrota/listaTipoFrota.php';
        } else {
            $modelTipoFrota->getAllRows();
            include 'Views/modules/TipoFrota/listaTipoFrota.php';
        }
    }

    public static function form()
    {
        include 'Model/TipoFrotaModel.php';

        $modelTipoFrota = new TipoFrotaModel();

        if (isset($_GET['id'])) {
            $modelTipoFrota = $modelTipoFrota->getById((int) $_GET['id']);
        }
        include 'Views/modules/TipoFrota/formTipoFrota.php';
    }

    public static function save()
    {
        include 'Model/TipoFrotaModel.php';
        $modelTipoFrota = new TipoFrotaModel();

        $modelTipoFrota->id = $_POST['id'];
        $modelTipoFrota->nome = $_POST['nome'];

        $obj = $modelTipoFrota->save();
        if ($obj === true) {
            header('location: /tipoFrota/form?message=success-create');
        } else if ($obj === false) {
            header('location: /tipoFrota/form?message=error-create');
        }
    }

    public static function delete()
    {
        include 'Model/TipoFrotaModel.php';
        $modelTipoFrota = new TipoFrotaModel();

        $obj = $modelTipoFrota->delete((int) $_GET['id']);

        if ($obj === true) {
            header('location: /tipoFrota?message=success-delete');
        } else if ($obj === false) {
            header('location: /tipoFrota?message=error-delete');
        }
    }

}