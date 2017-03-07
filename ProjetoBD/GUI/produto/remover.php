<?php

require_once "../../DAO/ProdutoDAO.php";
$codProduto = $_REQUEST['codProduto'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
      <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

if(ProdutoDAO::remover($codProduto))
{
    echo "<script>
            window.onload =  function (){
                            swal({
                                    title: \"Removido!\",
                                    text: \"Registro removido com sucesso!\",
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
                                text: \"Não foi possível remover o registro, verifique sua conexão com o banco!\",
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

