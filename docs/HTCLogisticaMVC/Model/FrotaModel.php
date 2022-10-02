<?php
class FrotaModel
{
    public $id;
    public $placa;
    public $cmtipocarro;

    public function save()
    {
        include 'DAO/FrotaDAO.php';
        $dao = new FrotaDAO();

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
        include 'DAO/FrotaDAO.php ';
        $dao = new FrotaDAO();

        if ($dao->delete($id) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function getAllRows()
    {
        include 'DAO/FrotaDAO.php';

        $dao = new FrotaDao();
        $this->rows = $dao->select();
    }

    public function getAllRowsSearch(string $search)
    {
        include 'DAO/FrotaDAO.php';
        $dao = new FrotaDao();
        $obj = $this->rows = $dao->selectSearch($search);
        if ($obj) {
            return $obj;
        } else {
            return false;
        }
    }

    public function getById(int $id)
    {
        include 'DAO/FrotaDAO.php ';
        $dao = new FrotaDAO();

        $obj = $dao->selectById($id);
        if ($obj) {
            return $obj;
        } else {
            return new FrotaModel();
        }
    }

    
}
