<?php


class Produto
{
    private $codProduto;
    private $codUnidade;
    private $nome;
    private $preco;

    public function __construct($codProduto, $codUnidade, $nome, $preco)
    {
        $this->codProduto = $codProduto;
        $this->codUnidade = $codUnidade;
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function getCodProduto()
    {
        return $this->codProduto;
    }

    public function setCodProduto($codProduto)
    {
        $this->codProduto = $codProduto;
    }

    public function getCodUnidade()
    {
        return $this->codUnidade;
    }

    public function setCodUnidade($codUnidade)
    {
        $this->codUnidade = $codUnidade;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
}