<?php

class Cliente
{
    private $codCliente;
    private $nome;
    private $endereco;
    private $cidade;
    private $codEstado;
    private $cep;
    private $telefone;
    private $percentualDesconto;

    public function __construct($codCliente, $nome, $endereco, $cidade, $codEstado, $cep, $telefone, $percentualDesconto)
    {
        $this->codCliente = $codCliente;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->codEstado = $codEstado;
        $this->cep = $cep;
        $this->telefone = $telefone;
        $this->percentualDesconto = $percentualDesconto;
    }


    public function getCodCliente()
    {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getCodEstado()
    {
        return $this->codEstado;
    }

    public function setCodEstado($codEstado)
    {
        $this->codEstado = $codEstado;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getPercentualDesconto()
    {
        return $this->percentualDesconto;
    }

    public function setPercentualDesconto($percentualDesconto)
    {
        $this->percentualDesconto = $percentualDesconto;
    }
}