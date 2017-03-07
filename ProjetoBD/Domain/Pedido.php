<?php

class Pedido
{
    private $codPedido;
    private $codCliente;
    private $tipo;
    private $dtEntrada;
    private $dtEmbarque;
    private $valorTotal;
    private $desconto;

    public function __construct($codPedido, $codCliente, $tipo, $dtEntrada, $dtEmbarque, $valorTotal, $desconto)
    {
        $this->codPedido = $codPedido;
        $this->codCliente = $codCliente;
        $this->tipo = $tipo;
        $this->dtEntrada = $dtEntrada;
        $this->dtEmbarque = $dtEmbarque;
        $this->valorTotal = $valorTotal;
        $this->desconto = $desconto;
    }

    public function getCodPedido()
    {
        return $this->codPedido;
    }

    public function setCodPedido($codPedido)
    {
        $this->codPedido = $codPedido;
    }

    public function getCodCliente()
    {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getDtEntrada()
    {
        return $this->dtEntrada;
    }

    public function setDtEntrada($dtEntrada)
    {
        $this->dtEntrada = $dtEntrada;
    }

    public function getDtEmbarque()
    {
        return $this->dtEmbarque;
    }

    public function setDtEmbarque($dtEmbarque)
    {
        $this->dtEmbarque = $dtEmbarque;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
    }
}