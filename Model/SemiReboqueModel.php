<?php
class SemiReboqueModel
{
    public $id;
    public $placar;
    public $cmtipocarro;
    public $rows;

    public function save()
    {
        include 'DAO/SemiReboqueDAO.php';
        $dao = new SemiReboqueDAO();

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
        include 'DAO/SemiReboqueDAO.php ';
        $dao = new SemiReboqueDAO();

        if ($dao->delete($id) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function getAllRowsSearch(string $search)
    {
        include 'DAO/SemiReboqueDAO.php';
        $dao = new SemiReboqueDao();
        $obj = $this->rows = $dao->selectSearch($search);
        if ($obj) {
            return $obj;
        } else {
            return false;
        }
    }

    public function getAllRows()
    {
        include 'DAO/SemiReboqueDAO.php';

        $dao = new SemiReboqueDao();
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/SemiReboqueDAO.php ';
        $dao = new SemiReboqueDAO();

        $obj = $dao->selectById($id);
        if ($obj) {
            return $obj;
        } else {
            return new SemiReboqueModel();
        }
    }
}
