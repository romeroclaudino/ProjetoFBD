<?php

require_once "../../DAO/ClienteDAO.php";
$nome = $_REQUEST['nome'];
$endereco = $_REQUEST['endereco'];
$cidade = $_REQUEST['cidade'];
$codEstado = $_REQUEST['codEstado'];
$CEP = $_REQUEST['CEP'];
$telefone = $_REQUEST['telefone'];
$percentualDesconto = $_REQUEST['percentualDesconto'];



echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
    <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

ClienteDAO::inserir($nome, $endereco, $cidade, $codEstado, $CEP, $telefone, $percentualDesconto);

echo "<script>
            window.onload =  function (){
                            swal({
                                    title: \"Cadastrado!\",
                                    text: \"Registro cadastrado com sucesso!\",
                                    type: \"success\",
                                    showCancelButton: false,
                                    confirmButtonText: \"Ok\",
                                    closeOnConfirm: true
                                },
                                function(){
                                    window.location.replace('listar.php');
                                });
                            };
          </script>";