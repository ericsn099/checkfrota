<?php 

class PrioridadeController {

	public static function index(){
		include 'View/modules/Login/Login.php';
	}
	
	public static function save()
	{
		include 'Model/FuncionarioModel.php';

		$model = new PrioridadeModel();

		$model->nome = $_POST['nome'];
		

		$model->save();
	}
}