<?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $database = "PROJETO_FBD";
    $link = mysqli_connect($host, $user, $pass, $database);
    mysqli_set_charset($link,'utf8');

    function executarQuery($query){
        global $link;
        return mysqli_query($link, $query);
    }

   function recuperarArray($res) {
       return mysqli_fetch_assoc($res);
   }

function recuperarValor($res) {
    $result = mysqli_fetch_array($res);

    if($result) {
        return $result[0];
    }

    return NULL;
}