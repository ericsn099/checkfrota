<?php
class TipoSemiReboqueModel
{
    public $id, $nome;

    public function save()
    {
        include 'DAO/TipoSemiReboqueDAO.php';
        $dao = new TipoSemiReboqueDAO();

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
        include 'DAO/TipoSemiReboqueDAO.php ';
        $dao = new TipoSemiReboqueDAO();

        if ($dao->delete($id) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function getAllRowsSearch(string $search)
    {
        include 'DAO/TipoSemiReboqueDAO.php';
        $dao = new TipoSemiReboqueDao();
        $obj = $this->rows = $dao->selectSearch($search);
        if ($obj) {
            return $obj;
        } else {
            return false;
        }
    }

    public function getAllRows()
    {
        include 'DAO/TipoSemiReboqueDAO.php';

        $dao = new TipoSemiReboqueDao();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/TipoSemiReboqueDAO.php ';
        $dao = new TipoSemiReboqueDAO();

        $obj = $dao->selectById($id);
        if ($obj) {
            return $obj;
        } else {
            return new TipoSemiReboqueModel();
        }
    }
}
