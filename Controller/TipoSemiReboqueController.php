<?php
class TipoSemiReboqueController
{
    public static function index()
    {
        include 'Model/TipoSemiReboqueModel.php';
        $modelTipoSemiReboque = new TipoSemiReboqueModel();

        if (isset($_GET['nome'])) {
            $modelTipoSemiReboque->getAllRowsSearch($_GET['nome']);
            include 'Views/modules/tipoSemiReboque/listaTipoSemiReboque.php';
        } else {
            $modelTipoSemiReboque->getAllRows();
            include 'Views/modules/tipoSemiReboque/listaTipoSemiReboque.php';
        }
    }

    public static function form()
    {
        include 'Model/TipoSemiReboqueModel.php';

        $modelTipoSemiReboque = new TipoSemiReboqueModel();

        if (isset($_GET['id'])) {
            $modelTipoSemiReboque = $modelTipoSemiReboque->getById((int) $_GET['id']);
        }
        include 'Views/modules/tipoSemiReboque/formTipoSemiReboque.php';
    }

    public static function save()
    {
        include 'Model/TipoSemiReboqueModel.php';
        $modelTipoSemiReboque = new TipoSemiReboqueModel();

        $modelTipoSemiReboque->id = $_POST['id'];
        $modelTipoSemiReboque->nome = $_POST['nome'];

        $obj = $modelTipoSemiReboque->save();
        if ($obj === true) {
            header('location: /tipoSemiReboque/form?message=success-create');
        } else if ($obj === false) {
            header('location: /tipoSemiReboque/form?message=error-create');
        }
    }

    public static function delete()
    {
        include 'Model/TipoSemiReboqueModel.php';
        $modelTipoSemiReboque = new TipoSemiReboqueModel();

        $obj = $modelTipoSemiReboque->delete((int) $_GET['id']);

        if ($obj === true) {
            header('location: /tipoSemiReboque?message=success-delete');
        } else if ($obj === false) {
            header('location: /tipoSemiReboque?message=error-delete');
        }
    }
}
