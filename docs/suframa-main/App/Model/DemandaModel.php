<?php

class DemandaModel {
   
   //CAMPOS DA TABELA FUNCIONARIO
   public $id, $descricao, 
		   $data_inicio, $data_termino, $observacao, 
		   $prioridade_id, $tipo_demanda_id, $andamento_id, $funcionario_id;

   public function save(){
	   include 'DAO/DemandaDao.php';

	   $dao = new DemandaDao();

	   $dao->insert($this);
   }
}