<?php

require_once "UtilsDAO.php";
require_once "ItemDAO.php";
require_once "ClienteDAO.php";
require_once "../../Domain/Pedido.php";

class PedidoDAO{

    public static function inserir($pedido){

        $codCliente = $pedido->getCodCliente();
        $tipo = $pedido->getTipo();
        $dtEntrada = $pedido->getDtEntrada();
        $dtEmbarque = $pedido->getDtEmbarque();
        $desconto = $pedido->getDesconto();

        $insertQuery = "INSERT INTO PEDIDO (tipo, codCliente, dtEntrada, valorTotal, desconto, dtEmbarque)
                        VALUES ('$tipo','$codCliente','$dtEntrada',0,$desconto,$dtEmbarque)";

        return executarQuery($insertQuery);
    }

    public static function remover($codPedido){

        $removeQuery = "DELETE FROM PEDIDO WHERE codPedido='$codPedido'";

        return executarQuery($removeQuery);
    }

    public static function atualizar($pedido){

        $codPedido = $pedido->getCodPedido();
        $codCliente = $pedido->getCodCliente();
        $tipo = $pedido->getTipo();
        $dtEntrada = $pedido->getDtEntrada();
        $dtEmbarque = $pedido->getDtEmbarque();
        $desconto = $pedido->getDesconto();

        $updateQuery = "UPDATE PEDIDO SET codCliente='$codCliente', tipo='$tipo', dtEntrada='$dtEntrada',
                        dtEmbarque = '$dtEmbarque', desconto = '$desconto'
                        WHERE codPedido = '$codPedido'";

        if(executarQuery($updateQuery)){
            self::calculaValorTotal($codPedido);
            return true;
        }else{return false;}
    }

    public static function getPedidos(){

        $selectQuery = "SELECT * FROM PEDIDO";
        $result = executarQuery($selectQuery);

        $arrayPedidos = array();

        while($linha = recuperarArray($result)){

            $codPedido = $linha['codPedido'];
            $codCliente = $linha['codCliente'];
            $tipo = $linha['tipo'];
            $dtEntrada = $linha['dtEntrada'];
            $dtEmbarque = $linha['dtEmbarque'];
            $desconto = $linha['desconto'];
            $valorTotal = $linha['valorTotal'];

            $pedido = new Pedido($codPedido, $codCliente, $tipo, $dtEntrada,
                                $dtEmbarque, $valorTotal, $desconto);

            array_push($arrayPedidos, $pedido);
        }

        return $arrayPedidos;

    }

    public static function getPedido($codPedido){

        $selectQuery = "SELECT * FROM PEDIDO WHERE codPedido='$codPedido'";
        $result = executarQuery($selectQuery);

        $linha = recuperarLinha($result);

        $tipo = $linha[1];
        $codCliente = $linha[2];
        $dtEntrada = $linha[3];
        $valorTotal = $linha[4];
        $desconto = $linha[5];
        $dtEmbarque = $linha[6];

        $pedido = new Pedido($codPedido, $codCliente, $tipo, $dtEntrada,
            $dtEmbarque, $valorTotal, $desconto);

        return $pedido;

    }

    public static function calculaValorTotal($codPedido){

        $pedido = self::getPedido($codPedido);

        $valorSomadoItens = self::somaValorItens($codPedido);
        $valorDescontoPedidoAplicado = self::aplicaDescontoPedido($valorSomadoItens,$pedido);
        $valorFinal = self::aplicaDescontoCliente($valorDescontoPedidoAplicado,$pedido);

        $updateQuery = "UPDATE PEDIDO
                        SET valorTotal='$valorFinal' 
                        WHERE codPedido='$codPedido'";

        executarQuery($updateQuery);
    }

    public static function somaValorItens($codPedido){

        $arrayItens = ItemDAO::getItensPedido($codPedido);

        $valor = 0.0;
        while($itemTemp = array_shift($arrayItens)){
            $valor += $itemTemp->getValorTotal();
        }

        return $valor;
    }

    public static function aplicaDescontoPedido($valor, $pedido){

        $desconto = $pedido->getDesconto();

        $valor *= (1.0 - $desconto / 100.0);

        return $valor;
    }

    public static function aplicaDescontoCliente($valor, $pedido){

        $codCliente = $pedido->getCodCliente();
        $cliente = ClienteDAO::getCliente($codCliente);

        $desconto = $cliente->getPercentualDesconto();

        $valor *= (1.0 - $desconto / 100.0);

        return $valor;
    }

    public static function calculaValorTotalCliente($codCliente){
        $selectQuery = "SELECT * FROM PEDIDO WHERE codCliente='$codCliente'";
        $result = executarQuery($selectQuery);

        while($linha = recuperarArray($result)){

            $codPedido = $linha['codPedido'];
            self::calculaValorTotal($codPedido);

        }
    }
}