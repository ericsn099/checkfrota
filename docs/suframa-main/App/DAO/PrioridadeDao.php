<?php

class PrioridadeDao
{

	private $conexao;

	public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

		$this->conexao = new PDO($dsn, 'root', '19019407eric@');

	}


	public function insert(PrioridadeModel $model)
	{
		$sql = "insert into prioridade(nome) values (?)";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $model->nome);
	
		

		$stmt->execute(); 
		header('Location: /adm');
	}

	public function update()
	{
	}

	public function select()
	{
	}
}
