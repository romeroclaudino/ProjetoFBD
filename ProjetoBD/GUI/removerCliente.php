<?php

require_once "../DAO/ClienteDAO.php";
$codCliente = $_REQUEST['codCliente'];

echo "<link rel=\"stylesheet\" href=\"css/sweetalert.css\">
      <script src=\"js/sweetalert.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>";

//if(ClienteDAO::remover($codCliente))
if(ClienteDAO::remover('s'))
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
                                    window.location.replace('listarCliente.php');
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
                                window.location.replace('listarCliente.php');
                            });
                        };
     </script>";
}