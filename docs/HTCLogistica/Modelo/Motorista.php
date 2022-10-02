<?php

class Motorista
{

    private $id;
    private $nome;
    private $cpf;
    private $habilitacao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getHabilitacao()
    {
        return $this->habilitacao;
    }

    public function setHabilitacao($habilitacao)
    {
        $this->habilitacao = $habilitacao;
        return $this;
    }
}
