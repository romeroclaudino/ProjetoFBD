<?php

require_once "UtilsDAO.php";
require_once "../Domain/Cliente.php";

class ClienteDAO{

    public static function inserir($nome, $endereco, $cidade, $codEstado, $cep, $telefone, $percentualDesconto){

        $insertQuery = "INSERT INTO CLIENTE (nome, endereco, cidade, codEstado, cep, telefone, percentualDesconto) VALUES
        ('$nome', '$endereco', '$cidade', '$codEstado', '$cep', '$telefone', '$percentualDesconto')";

        return executarQuery($insertQuery);
    }

    public static function atualizar($cliente){
        $codCliente = $cliente->getCodCliente();
        $nome = $cliente->getNome();
        $endereco = $cliente->getEndereco();
        $cidade = $cliente->getCidade();
        $codEstado = $cliente->getCodEstado();
        $cep = $cliente->getCep();
        $telefone = $cliente->getTelefone();
        $percentualDesconto = $cliente->getPercentualDesconto();

        $updateQuery = "UPDATE CLIENTE SET nome='$nome', endereco='$endereco', cidade='$cidade', codEstado='$codEstado',
        cep='$cep', telefone='$telefone', percentualDesconto='$percentualDesconto' WHERE codCliente='$codCliente'";

        return executarQuery($updateQuery);
    }

    public static function remover($codCliente){
        $removeQuery = "DELETE FROM CLIENTE WHERE codCliente='$codCliente'";

        //Gambiarratz
        $qtd = mysqli_num_rows(executarQuery("SELECT * FROM CLIENTE"));
        executarQuery($removeQuery);
        if(mysqli_num_rows(executarQuery("SELECT * FROM CLIENTE")) !== $qtd)
            return true;
        else
            return false;
    }

    public static function getClientes(){
        $listQuery = "SELECT * FROM CLIENTE";
        $arrayClientes = array();
        $result = executarQuery($listQuery);

        while($linha = recuperarArray($result)) {
            $cliente = new Cliente($linha['codCliente'], $linha['nome'], $linha['endereco'], $linha['cidade'],
                $linha['codEstado'], $linha['CEP'], $linha['telefone'], $linha['percentualDesconto']);

            array_push($arrayClientes, $cliente);
        }

        return $arrayClientes;
    }

    public static function getCliente($codCliente){
        $listQuery = "SELECT * FROM CLIENTE WHERE codCliente='$codCliente'";
        $result = executarQuery($listQuery);
        $clienteArray = recuperarArray($result);

        return new Cliente($clienteArray['codCliente'], $clienteArray['nome'], $clienteArray['endereco'], $clienteArray['cidade'],
            $clienteArray['codEstado'], $clienteArray['CEP'], $clienteArray['telefone'], $clienteArray['percentualDesconto']);
    }
}