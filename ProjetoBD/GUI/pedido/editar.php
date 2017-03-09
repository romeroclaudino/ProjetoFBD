<?php

require_once "../../DAO/PedidoDAO.php";

$codPedido = $_REQUEST['codPedido'];
$codCliente = $_REQUEST['codCliente'];
$tipo = $_REQUEST['tipo'];
$dtEntrada = $_REQUEST['dtEntrada'];
$dtEmbarque = $_REQUEST['dtEmbarque'];
$desconto = $_REQUEST['desconto'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
      <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

$pedido = new Pedido($codPedido, $codCliente, $tipo, $dtEntrada, $dtEmbarque, null,$desconto);

if(PedidoDAO::atualizar($pedido)) {
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
