<?php

class MotoristaModel
{

    public $id, $nome, $cpf, $habilitacao;

    public function save()
    {
        include 'DAO/MotoristaDAO.php';
        $dao = new MotoristaDAO();

        if (empty($this->id)) {
            if ($dao->insert($this) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            if ($dao->update($this) === false) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function delete(int $id)
    {
        include 'DAO/MotoristaDAO.php ';
        $dao = new MotoristaDAO();

        if ($dao->delete($id) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function getAllRowsSearch(string $search)
    {
        include 'DAO/MotoristaDAO.php';
        $dao = new MotoristaDao();
        $obj = $this->rows = $dao->selectSearch($search);
        if ($obj) {
            return $obj;
        } else {
            return false;
        }
    }

    public function getAllRows()
    {
        include 'DAO/MotoristaDAO.php';

        $dao = new MotoristaDao();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/MotoristaDAO.php ';
        $dao = new MotoristaDAO();

        $obj = $dao->selectById($id);
        if ($obj) {
            return $obj;
        } else {
            return new MotoristaModel();
        }
    }
}
