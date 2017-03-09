<?php

require_once "../../DAO/PedidoDAO.php";
$codCliente = $_REQUEST['codCliente'];
$tipo = $_REQUEST['tipo'];
$dtEntrada = $_REQUEST['dtEntrada'];
$dtEmbarque = $_REQUEST['dtEmbarque'];
$desconto = $_REQUEST['desconto'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
    <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

$pedido = new Pedido(null, $codCliente, $tipo, $dtEntrada, $dtEmbarque, null,$desconto);
if(PedidoDAO::inserir($pedido)) {

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
}
else
{
    echo "<script>
        window.onload =  function (){
                        swal({
                                title: \"Ops!\",
                                text: \"Não foi possível cadastrar o registro, verifique sua conexão com o banco!\",
                                type: \"error\",
                                confirmButtonText: \"Ok\",
                                closeOnConfirm: true
                            },
                            function(){
                               window.location.replace('listar.php');                           
                            });
                        };
     </script>";
}