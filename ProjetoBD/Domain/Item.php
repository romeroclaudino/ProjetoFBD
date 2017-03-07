<?php


class Item
{
    private $codPedido;
    private $codProduto;
    private $quantidade;
    private $valorUnit;
    private $valorTotal;

    public function __construct($codPedido, $codProduto, $quantidade, $valorUnit, $valorTotal)
    {
        $this->codPedido = $codPedido;
        $this->codProduto = $codProduto;
        $this->quantidade = $quantidade;
        $this->valorUnit = $valorUnit;
        $this->valorTotal = $valorTotal;
    }

    public function getCodPedido()
    {
        return $this->codPedido;
    }

    public function setCodPedido($codPedido)
    {
        $this->codPedido = $codPedido;
    }

    public function getCodProduto()
    {
        return $this->codProduto;
    }

    public function setCodProduto($codProduto)
    {
        $this->codProduto = $codProduto;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getValorUnit()
    {
        return $this->valorUnit;
    }

    public function setValorUnit($valorUnit)
    {
        $this->valorUnit = $valorUnit;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }


    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }
}