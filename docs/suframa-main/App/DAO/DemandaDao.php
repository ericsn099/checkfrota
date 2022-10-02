
<?php

class DemandaDao
{

	private $conexao;

	public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

		$this->conexao = new PDO($dsn, 'root', '19019407eric@');

	}


	public function insert(DemandaModel $model)
	{
		$sql = "INSERT INTO demanda(descricao,data_inicio,data_termino,observacao,prioridade_id,tipo_demanda_id,andamento_id,
				funcionario_id) 
				VALUES (?,?,?,?,?,?,?,?)";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $model->descricao);
		$stmt->bindValue(2, $model->data_inicio);
		$stmt->bindValue(3, $model->data_termino);
		$stmt->bindValue(4, $model->observacao);
		$stmt->bindValue(5, $model->prioridade_id);
		$stmt->bindValue(6, $model->tipo_demanda_id);
		$stmt->bindValue(7, $model->andamento_id);
		$stmt->bindValue(8, $model->funcionario_id);

		$stmt->execute(); 
		header('Location: /paginaInicial');
	}

	public function update()
	{
	}

	public function select()
	{
	}
}




















