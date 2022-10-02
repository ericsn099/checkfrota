<?php
class Frota
{
    private $id;
    private $placa;
    private $id_tipocaminhao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
        return $this;
    }

    public function getId_tipocaminhao()
    {
        return $this->id_tipocaminhao;
    }

    public function setId_tipocaminhao($id_tipocaminhao)
    {
        $this->id_tipocaminhao = $id_tipocaminhao;
        return $this;
    }
}
