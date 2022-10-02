<?php 

class AdmController {

	public static function index(){
		include 'View/modules/Adm/adm.php';
	}

	public static function alterarFuncionario(){
		include 'View/modules/Adm/AtualizarFuncionario.php';
	}
}