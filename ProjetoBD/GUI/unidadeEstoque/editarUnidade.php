<?php

require_once "../../DAO/UnidadeEstoqueDAO.php";
$codUnidade = $_REQUEST['codUnidade'];
$descricao = $_REQUEST['descricao'];

echo "<link rel=\"stylesheet\" href=\"../css/sweetalert.css\">
      <script src=\"../js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

if(UnidadeEstoqueDAO::atualizar(new UnidadeEstoque($codUnidade, $descricao))) {
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
                                text: \"Não foi possível editar o registro, verifique se a unidade já existe ou a sua conexão com o banco!\",
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
