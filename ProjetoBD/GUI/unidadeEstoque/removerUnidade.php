<?php

require_once "../../DAO/UnidadeEstoqueDAO.php";
$codUnidade = $_REQUEST['codUnidade'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
      <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

if(UnidadeEstoqueDAO::remover($codUnidade))
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
                                    window.location.replace('listarUnidade.php');
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
                                text: \"Não foi possível remover registro, verifique sua conexão com o banco!\",
                                type: \"error\",
                                showCancelButton: false,
                                confirmButtonText: \"Ok\",
                                closeOnConfirm: true
                            },
                            function(){
                                window.location.replace('listarUnidade.php');
                            });
                        };
     </script>";
}

