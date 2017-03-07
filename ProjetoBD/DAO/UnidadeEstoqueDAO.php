<?php

require_once "UtilsDAO.php";
require_once "../../Domain/UnidadeEstoque.php";

class UnidadeEstoqueDAO{

    public static function inserir($descricao){

        $insertQuery = "INSERT INTO UNIDADE_ESTOQUE (descricao) VALUES ('$descricao')";
        return executarQuery($insertQuery);

    }

    public static function remover($codUnidade){

        $removeQuery = "DELETE FROM UNIDADE_ESTOQUE WHERE codUnidade='$codUnidade'";

        return executarQuery($removeQuery);
    }

    public static function atualizar($unidade){

        $codUnidade = $unidade->getCodUnidade();
        $descricao = $unidade->getDescricao();

        $updateQuery = "UPDATE UNIDADE_ESTOQUE SET descricao='$descricao' 
        WHERE codUnidade = '$codUnidade'";

        return executarQuery($updateQuery);

    }

    public static function getUnidades(){

        $selectQuery = "SELECT * FROM UNIDADE_ESTOQUE";
        $result = executarQuery($selectQuery);
        $arrayUnidades = array();

        while($linha = recuperarArray($result)){

            $unidade = new UnidadeEstoque($linha['codUnidade'], $linha['descricao']);
            array_push($arrayUnidades, $unidade);
        }

        return $arrayUnidades;

    }

    public static function getDescricao($codUnidade){

        $selectQuery = "SELECT descricao FROM UNIDADE_ESTOQUE WHERE codUnidade=$codUnidade";
        $result = executarQuery($selectQuery);

        return recuperarValor($result);
    }
}
