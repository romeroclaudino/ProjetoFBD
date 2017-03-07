<?php

class Estado
{
    private $codEstado;
    private $nome;

    public function __construct($codEstado, $nome)
    {
        $this->codEstado = $codEstado;
        $this->nome = $nome;
    }

    public function getCodEstado()
    {
        return $this->codEstado;
    }

    public function setCodEstado($codEstado)
    {
        $this->codEstado = $codEstado;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}