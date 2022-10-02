<?php

class FuncionarioDao
{

	private $conexao;

	public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

		$this->conexao = new PDO($dsn, 'root', '19019407eric@');
	}


	public function insert(FuncionarioModel $model)
	{
		$sql = "INSERT INTO funcionario(avatar,path,nome,cpf,login,senha,cargo_id,area_atuacao_id,tipouser) 
				VALUES (?,?,?,?,?,?,?,?,?)";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, $model->avatar);
		$stmt->bindValue(2, $model->path);
		$stmt->bindValue(3, $model->nome);
		$stmt->bindValue(4, $model->cpf);
		$stmt->bindValue(5, $model->login);
		$stmt->bindValue(6, $model->senha);
		$stmt->bindValue(7, $model->cargo_id);
		$stmt->bindValue(8, $model->area_atuacao_id);
		$stmt->bindValue(9, $model->tipouser);

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
