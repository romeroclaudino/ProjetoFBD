<?php

require_once "../../DAO/ProdutoDAO.php";

$codProduto = $_REQUEST['codProduto'];
$codUnidade = $_REQUEST['codUnidade'];
$nome = $_REQUEST['nome'];
$preco = $_REQUEST['preco'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
      <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

$produto = new Produto($codProduto, $codUnidade, $nome, $preco);

if(ProdutoDAO::atualizar($produto)) {
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
