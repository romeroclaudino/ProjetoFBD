<?php

require_once "../../DAO/ClienteDAO.php";
require_once "../../DAO/EstadoDAO.php";
$estados = EstadoDAO::getEstados();

$codCliente = $_REQUEST['codCliente'];
$nome = $_REQUEST['nome'];
$endereco = $_REQUEST['endereco'];
$cidade = $_REQUEST['cidade'];
$codEstado = $_REQUEST['codEstado'];
$CEP = $_REQUEST['CEP'];
$telefone = $_REQUEST['telefone'];
$percentualDesconto = $_REQUEST['percentualDesconto'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
      <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

$cliente = new Cliente($codCliente, $nome, $endereco, $cidade, $codEstado, $CEP, $telefone, $percentualDesconto);

if(ClienteDAO::atualizar($cliente)) {
    echo "<script>
            window.onload =  function (){
                            swal({
                                    title: \"Editado!\",
                                    text: \"Registro editado com sucesso!\",
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

}
else
{
    echo "<script>
        window.onload =  function (){
                        swal({
                                title: \"Ops!\",
                                text: \"Não foi possível editar o registro, verifique a sua conexão com o banco!\",
                                type: \"error\",
                                showCancelButton: false,
                                confirmButtonText: \"Ok\",
                                closeOnConfirm: true
                            },
                            function(){
                                window.location.replace('listar.php');
                            });
                        };
     </script>";
}
