<?php

require_once "UtilsDAO.php";
require_once "../../Domain/Estado.php";

class EstadoDAO{

    public static function inserir($nome){

        $insertQuery = "INSERT INTO ESTADO (nome) VALUES ('$nome')";
        return executarQuery($insertQuery);
    }

    public static function atualizar($estado){
        $codEstado = $estado->getCodEstado();
        $nome = $estado->getNome();

        $updateQuery = "UPDATE ESTADO SET nome='$nome' WHERE codEstado='$codEstado'";
        return executarQuery($updateQuery);
    }

    public static function remover($codEstado){

        $removeQuery = "DELETE FROM ESTADO WHERE codEstado='$codEstado'";

        return executarQuery($removeQuery);
    }

    public static function getEstados(){
        $selectQuery = "SELECT * FROM ESTADO";
        $arrayEstados = array();
        $result = executarQuery($selectQuery);

        while($linha = recuperarArray($result)){
            $estado = new Estado($linha['codEstado'], $linha['nome']);
            array_push($arrayEstados, $estado);
        }
        return $arrayEstados;
    }

    public static function getNome($codEstado){
        $selectQuery = "SELECT nome FROM ESTADO WHERE codEstado=$codEstado";
        $result = executarQuery($selectQuery);

        return recuperarValor($result);
    }
}