 <?php

 class FuncionarioModel {
	
	//CAMPOS DA TABELA FUNCIONARIO
	public $id, $avatar, 
			$path, $nome, $cpf, 
			$login, $senha, $cargo_id, $area_atuacao_id, $tipo_user;

	public function save(){
		include 'DAO/FuncionarioDao.php';

		$dao = new FuncionarioDao();

		$dao->insert($this);
	}
 }