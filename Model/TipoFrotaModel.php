<?php
class TipoFrotaModel
{
    public $id;
    public $nome;
    public $rows;

    public function save()
    {
        include 'DAO/TipoFrotaDAO.php';
        $dao = new TipoFrotaDAO();

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
        include 'DAO/TipoFrotaDAO.php ';
        $dao = new TipoFrotaDAO();

        if ($dao->delete($id) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function getAllRowsSearch(string $search)
    {
        include 'DAO/TipoFrotaDAO.php';
        $dao = new TipoFrotaDao();
        $obj = $this->rows = $dao->selectSearch($search);
        if ($obj) {
            return $obj;
        } else {
            return false;
        }
    }

    public function getAllRows()
    {
        include 'DAO/TipoFrotaDAO.php';

        $dao = new TipoFrotaDao();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/TipoFrotaDAO.php ';
        $dao = new TipoFrotaDAO();

        $obj = $dao->selectById($id);
        if ($obj) {
            return $obj;
        } else {
            return new TipoFrotaModel();
        }
    }
}
