<?php

require_once "UtilsDAO.php";
require_once "ProdutoDAO.php";
require_once "PedidoDAO.php";
require_once "../../Domain/Item.php";

class ItemDAO{

    public static function inserir($codPedido, $codProduto, $quantidade){

        $produto = ProdutoDAO::getProduto($codProduto);
        $valorUnit = $produto->getPreco();
        $valorTotal = $quantidade * $valorUnit;

        $insertQuery = "INSERT INTO ITEM 
        VALUES ('$codPedido','$codProduto','$quantidade','$valorUnit','$valorTotal')";

        if(executarQuery($insertQuery)){
            PedidoDAO::calculaValorTotal($codPedido);
            return true;
        }else{return false;}
    }

    public static function remover($codPedido,$codProduto){

        $removeQuery = "DELETE FROM ITEM 
                        WHERE codPedido='$codPedido' and codProduto='$codProduto'";

        if(executarQuery($removeQuery)){
            PedidoDAO::calculaValorTotal($codPedido);
            return true;
        }else{return false;}
    }

    public static function atualizar($itemAtual, $itemNovo){

        $codPedidoAtual = $itemAtual->getCodPedido();
        $codProdutoAtual = $itemAtual->getCodProduto();

        $codPedidoNovo = $itemNovo->getCodPedido();
        $codProdutoNovo = $itemNovo->getCodProduto();
        $quantidadeNovo = $itemNovo->getQuantidade();

        $produto = ProdutoDAO::getProduto($codProdutoNovo);
        $valorUnitNovo = $produto->getPreco();
        $valorTotalNovo = $quantidadeNovo * $valorUnitNovo;

        $updateQuery = "UPDATE ITEM
                        SET codPedido='$codPedidoNovo', codProduto='$codProdutoNovo', quantidade='$quantidadeNovo',
                        valorUnit='$valorUnitNovo', valorTotal='$valorTotalNovo' 
                        WHERE codPedido='$codPedidoAtual' AND codProduto = '$codProdutoAtual'";

        if(executarQuery($updateQuery)) {
            PedidoDAO::calculaValorTotal($codPedidoAtual);
            PedidoDAO::calculaValorTotal($codPedidoNovo);
            return true;
        }else{return false;}
    }

    public static function getItens(){

        $selectQuery = "SELECT * FROM ITEM";
        $result = executarQuery($selectQuery);

        $arrayItens = array();

        while($linha = recuperarArray($result)){

            $codPedido = $linha['codPedido'];
            $codProduto = $linha['codProduto'];
            $quantidade = $linha['quantidade'];
            $valorUnit = $linha['valorUnit'];
            $valorTotal = $linha['valorTotal'];

            $item = new Item($codPedido,$codProduto, $quantidade, $valorUnit, $valorTotal);

            array_push($arrayItens, $item);
        }

        return $arrayItens;
    }

    public static function getItensPedido($codPedido){

        $selectQuery = "SELECT * FROM ITEM WHERE codPedido='$codPedido'";
        $result = executarQuery($selectQuery);

        $arrayItens = array();

        while($linha = recuperarArray($result)){

            $codProduto = $linha['codProduto'];
            $quantidade = $linha['quantidade'];
            $valorUnit = $linha['valorUnit'];
            $valorTotal = $linha['valorTotal'];

            $item = new Item($codPedido,$codProduto, $quantidade, $valorUnit, $valorTotal);

            array_push($arrayItens, $item);
        }

        return $arrayItens;

    }

    public static function getItensProduto($codProduto){

        $selectQuery = "SELECT * FROM ITEM WHERE codProduto='$codProduto'";
        $result = executarQuery($selectQuery);

        $arrayItens = array();

        while($linha = recuperarArray($result)){

            $codPedido = $linha['codPedido'];
            $quantidade = $linha['quantidade'];
            $valorUnit = $linha['valorUnit'];
            $valorTotal = $linha['valorTotal'];

            $item = new Item($codPedido,$codProduto, $quantidade, $valorUnit, $valorTotal);

            array_push($arrayItens, $item);
        }

        return $arrayItens;
    }

    public static function getItem($codPedido, $codProduto){

        $selectQuery = "SELECT * FROM ITEM WHERE codPedido ='$codPedido' AND codProduto='$codProduto' ";
        $result = executarQuery($selectQuery);

        $linha = recuperarLinha($result);

        $quantidade = $linha[2];
        $valorUnit = $linha[3];
        $valorTotal = $linha[4];

        $item = new Item($codPedido, $codProduto, $quantidade, $valorUnit, $valorTotal);

        return $item;
    }

    public static function atualizarPreco($codProduto,$novoPreco){

        $arrayItens = self::getItensProduto($codProduto);

        while($linha = array_shift($arrayItens)) {

            $valorTotal = $linha->getQuantidade() * $novoPreco;
            $codPedido = $linha->getCodPedido();

            $updateQuery = "UPDATE ITEM
                        SET valorUnit='$novoPreco', valorTotal='$valorTotal' 
                        WHERE codPedido='$codPedido' AND codProduto = '$codProduto'";

            executarQuery($updateQuery);
            PedidoDAO::calculaValorTotal($codPedido);
        }

    }
}