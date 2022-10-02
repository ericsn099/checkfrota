<?php

class DemandaController
{

	public static function index()
	{
		include 'View/modules/Funcionario/PaginaInicial.php';
	}


	public static function save()
	{
		include 'Model/DemandaModel.php';

		$model = new DemandaModel();
		
		$model->id = $_POST['descricao'];
		$model->descricao = $_POST['descricao'];
		$model->tipo_demanda_id = $_POST['tipo_demanda_id'];
		$model->data_inicio = $_POST['data_inicio'];
		$model->data_termino = $_POST['data_termino'];
		$model->prioridade_id = $_POST['prioridade_id'];
		$model->andamento_id = $_POST['andamento_id'];
		$model->observacao = $_POST['observacao'];
		$model->funcionario_id = $_POST['funcionario_id'];

		$model->save();
	}
}
