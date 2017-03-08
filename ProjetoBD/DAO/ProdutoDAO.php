<?php

require_once "UtilsDAO.php";
require_once "ItemDAO.php";
require_once "../../Domain/Produto.php";

class ProdutoDAO{

    public static function inserir($produto){

        $nome = $produto->getNome();
        $preco = $produto->getPreco();
        $codUnidade = $produto->getCodUnidade();

        $insertQuery = "INSERT INTO PRODUTO (nome,preco,codUnidade)
                        VALUES ('$nome','$preco','$codUnidade')";

        return executarQuery($insertQuery);
    }

    public static function remover($codProduto){

        $removeQuery = "DELETE FROM PRODUTO WHERE codProduto='$codProduto'";

        return executarQuery($removeQuery);
    }

    public static function atualizar($produto){

        $codProduto = $produto->getCodProduto();
        $nome = $produto->getNome();
        $preco = $produto->getPreco();
        $codUnidade = $produto->getCodUnidade();

        $updateQuery = "UPDATE PRODUTO SET nome='$nome', preco='$preco', codUnidade='$codUnidade' 
        WHERE codProduto = '$codProduto'";

        ItemDAO::atualizarPreco($codProduto, $preco);

        return executarQuery($updateQuery);

    }

    public static function getProdutos(){

        $selectQuery = "SELECT * FROM PRODUTO";
        $result = executarQuery($selectQuery);

        $arrayProdutos = array();

        while($linha = recuperarArray($result)){

            $codProduto = $linha['codProduto'];
            $codUnidade = $linha['codUnidade'];
            $nome = $linha['nome'];
            $preco = $linha['preco'];
            $produto = new Produto($codProduto, $codUnidade, $nome, $preco);

            array_push($arrayProdutos, $produto);
        }

        return $arrayProdutos;
    }

    public static function getProduto($codProduto){

        $selectQuery = "SELECT * FROM PRODUTO WHERE codProduto='$codProduto'";
        $result = executarQuery($selectQuery);

        $linha = recuperarLinha($result);

        $nome = $linha[1];
        $preco = $linha[2];
        $codUnidade = $linha[3];

        $produto = new Produto($codProduto, $codUnidade, $nome, $preco);

        return $produto;

    }

}