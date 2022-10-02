<?php


include 'Controller/FuncionarioController.php';
include 'Controller/AdmController.php';
include 'Controller/LoginController.php';
include 'controller/DemandaController.php';
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



switch($url){
	case '/':
		LoginController::index();
	break;

	case '/adm':
		AdmController::index();
	break;

	case '/adm/save':
		FuncionarioController::save();
	break;
	
	
	case '/atualizarFuncionario':
		AdmController::alterarFuncionario();
	break;

	case '/paginaInicial':
		FuncionarioController::index();
	break;

	case '/paginaInicial/save':
		DemandaController::save();
	break;

	case '/login/validarLogin':
        LoginController::validarLogin();
    break;

	default:
		echo 'Erro  404';
	break;
};