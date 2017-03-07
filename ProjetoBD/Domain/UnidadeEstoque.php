<?php


class UnidadeEstoque
{
    private $codUnidade;
    private $descricao;

    public function __construct($codUnidade, $descricao)
    {
        $this->codUnidade = $codUnidade;
        $this->descricao = $descricao;
    }

    public function getCodUnidade()
    {
        return $this->codUnidade;
    }

    public function setCodUnidade($codUnidade)
    {
        $this->codUnidade = $codUnidade;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
}