<?php
class SemiReboqueController
{
    public static function index()
    {
        include 'Model/SemiReboqueModel.php';
        $model = new SemiReboqueModel();

        if (isset($_GET['placa'])) {
            $model->getAllRowsSearch($_GET['placa']);
            include 'Views/modules/SemiReboque/listaSemiReboque.php';
        } else {
            $model->getAllRows();
            include 'Views/modules/SemiReboque/listaSemiReboque.php';
        }
    }

    public static function form()
    {
        include 'Model/SemiReboqueModel.php';
        include 'Model/TipoSemiReboqueModel.php';

        $model = new SemiReboqueModel();
        $modelTipoSemiReboque = new TipoSemiReboqueModel();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);
        }
        $modelTipoSemiReboque->getAllRows();
        include 'Views/modules/SemiReboque/formSemiReboque.php';
    }

    public static function save()
    {
        include 'Model/SemiReboqueModel.php';

        $model = new SemiReboqueModel();

        $model->id = $_POST['id'];
        $model->placar = $_POST['placar'];
        $model->cmtipocarro = $_POST['cmtipocarro'];

        $obj = $model->save();
        if ($obj === true) {
            header('location: /semiReboque/form?message=success-create');
        } else if ($obj === false) {
            header('location: /semiReboque/form?message=error-create');
        }
    }

    public static function delete()
    {
        include 'Model/SemiReboqueModel.php';
        $modelSemiReboque = new SemiReboqueModel();

        $obj = $modelSemiReboque->delete((int) $_GET['id']);

        if ($obj === true) {
            header('location: /semiReboque?message=success-delete');
        } else if ($obj === false) {
            header('location: /semiReboque?message=error-delete');
        }
    }
}
