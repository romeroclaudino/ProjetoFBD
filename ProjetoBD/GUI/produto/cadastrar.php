<?php

require_once "../../DAO/ProdutoDAO.php";
$nome = $_REQUEST['nome'];
$preco = $_REQUEST['preco'];
$codUnidade = $_REQUEST['codUnidade'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
    <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

$produto = new Produto(null, $codUnidade, $nome, $preco);
if(ProdutoDAO::inserir($produto)) {

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