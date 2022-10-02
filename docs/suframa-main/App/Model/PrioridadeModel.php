<?php

class PrioridadeModel {
   
   //CAMPOS DA TABELA FUNCIONARIO
   public $id, $nome;

   public function save(){
	   include 'DAO/FuncionarioDao.php';

	   $dao = new PrioridadeDao();

	   $dao->insert($this);
   }
}