<?php

require_once "../../DAO/ItemDAO.php";

$codPedido = $_REQUEST['codPedido'];
$codProduto = $_REQUEST['codProduto'];
$codPedidoNovo = $_REQUEST['codPedidoNovo'];
$codProdutoNovo = $_REQUEST['codProdutoNovo'];
$quantidadeNova = $_REQUEST['quantidadeNova'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
      <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

$item = new Item($codPedido, $codProduto, null, null, null);
$itemNovo = new Item($codPedidoNovo, $codProdutoNovo, $quantidadeNova, null, null);

if(ItemDAO::atualizar($item, $itemNovo)) {
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
                                text: \"Não foi possível cadastrar o registro, verifique se o item já existe ou a sua conexão com o banco!\",
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
