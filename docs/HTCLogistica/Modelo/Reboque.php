<?php
class Reboque
{
    private $id;
    private $placar;
    private $tiporeboque_id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getPlacar()
    {
        return $this->placar;
    }

    public function setPlacar($placar)
    {
        $this->placar = $placar;
        return $this;
    }

    public function getTiporeboque_id()
    {
        return $this->tiporeboque_id;
    }

    public function setTiporeboque_id($tiporeboque_id)
    {
        $this->tiporeboque_id = $tiporeboque_id;
        return $this;
    }
}
