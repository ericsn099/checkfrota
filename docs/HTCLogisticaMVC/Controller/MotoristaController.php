<?php
class MotoristaController
{
    public static function index()
    {
        include 'Model/MotoristaModel.php';

        $modelMotorista = new MotoristaModel();
        
        if (isset($_GET['checar'])) {
            $modelMotorista->getAllRowsSearch($_GET['checar']);
            include 'Views/modules/Motorista/listaMotorista.php';
        } else {
            $modelMotorista->getAllRows();
            include 'Views/modules/Motorista/listaMotorista.php';
        }
    }

    public static function form()
    {
        include 'Model/MotoristaModel.php';

        $modelMotorista = new MotoristaModel();

        if (isset($_GET['id'])) {
            $modelMotorista = $modelMotorista->getById((int) $_GET['id']);
        }
        include 'Views/modules/Motorista/formMotorista.php';
    }

    public static function save()
    {
        include 'Model/MotoristaModel.php';

        $modelMotorista = new Motoristamodel();

        $modelMotorista->id = $_POST['id'];
        $modelMotorista->nome = $_POST['nome'];
        $modelMotorista->cpf = $_POST['cpf'];
        $modelMotorista->habilitacao = $_POST['habilitacao'];

        $obj = $modelMotorista->save();
        if ($obj === true) {
            header('location: /motorista/form?message=success-create');
        } else if ($obj === false) {
            header('location: /motorista/form?message=error-create');
        }
    }

    public static function delete()
    {
        include 'Model/MotoristaModel.php';
        $modelMotorista = new MotoristaModel();

        $obj = $modelMotorista->delete((int) $_GET['id']);

        if ($obj === true) {
            header('location: /motorista?message=success-delete');
        } else if ($obj === false) {
            header('location: /motorista?message=error-delete');
        }
    }
}
