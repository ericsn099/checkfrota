<?php
include 'Controller/FrotaController.php';
include 'Controller/TipoFrotaController.php';
include 'Controller/AdmController.php';
include 'Controller/MotoristaController.php';
include 'Controller/TipoSemiReboqueController.php';
include 'Controller/SemiReboqueController.php';
include 'Controller/ChecklistController.php';
include 'Controller/LoginController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case '/':
        LoginController::index();
    break;

    case '/login/validarLogin':
        LoginController::validarLogin();
    break;

    case '/adm':
        AdmController::index();
    break;

    case '/frota':
        FrotaController::index();
    break;

    case '/frota/form':
        FrotaController::form();
    break;

    case '/frota/delete':
        FrotaController::delete();
    break;

    case '/frota/form/save':
        FrotaController::save();
    break;

    case '/tipoFrota':
        TipoFrotaController::index();
    break;

    case '/tipoFrota/form':
        TipoFrotaController::form();
    break;

    case '/tipoFrota/delete':
        TipoFrotaController::delete();
    break;

    case '/tipoFrota/form/save':
        TipoFrotaController::save();
    break;

    case '/motorista':
        MotoristaController::index();
    break;

    case '/motorista/form':
        MotoristaController::form();
    break;

    case '/motorista/delete':
        MotoristaController::delete();
    break;

    case '/motorista/form/save':
        MotoristaController::save();
    break;

    case '/tipoSemiReboque':
        TipoSemiReboqueController::index();
    break;

    case '/tipoSemiReboque/form':
        TipoSemiReboqueController::form();
    break;

    case '/tipoSemiReboque/delete':
        TipoSemiReboqueController::delete();
    break;

    case '/tipoSemiReboque/form/save':
        TipoSemiReboqueController::save();
    break;

    case '/semiReboque':
        SemiReboqueController::index();
    break;

    case '/semiReboque/form':
        SemiReboqueController::form();
    break;

    case '/semiReboque/delete':
        SemiReboqueController::delete();
    break;

    case '/semiReboque/form/save':
        SemiReboqueController::save();
    break;

    case '/checklist':
        ChecklistController::index();
    break;

    case '/checklist/form':
        ChecklistController::form();
    break;

    case '/checklist/detalhes':
        ChecklistController::detalhes();
    break;

    case '/checklist/form/save':
        ChecklistController::save();
    break;

    default:
        include "Views/modules/404.php";
}
