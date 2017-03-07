<?php

require_once "../DAO/EstadoDAO.php";
$codEstado = $_REQUEST['codEstado'];
$nome = $_REQUEST['nome'];

echo "<link rel=\"stylesheet\" href=\"css/sweetalert.css\">
      <script src=\"js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

if(EstadoDAO::atualizar(new Estado($codEstado, $nome))) {
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
                                    window.location.replace('listarEstado.php');
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
                                text: \"Não foi possível editar o registro, verifique se o estado já existe ou a sua conexão com o banco!\",
                                type: \"error\",
                                showCancelButton: false,
                                confirmButtonText: \"Ok\",
                                closeOnConfirm: true
                            },
                            function(){
                                window.location.replace('listarEstado.php');
                            });
                        };
     </script>";
}
