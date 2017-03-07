<?php

require_once "../../DAO/UnidadeEstoqueDAO.php";
$codUnidade = $_REQUEST['codUnidade'];
$descricao = UnidadeEstoqueDAO::getDescricao($codUnidade);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projeto FBD</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/projetofbd.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <style type="text/css">  @media (min-width: 768px) {.navbar-nav {  display: none !important;  }}  </style>

    <script>
        function editar(){

            if(document.myForm.descricao.value != "")
            {
                document.myForm.action = "editarUnidade.php";
                document.myForm.submit();
            }
            else
                swal({
                    title: "Campo vazio!",
                    text: "Você deve preencher todos os campos!",
                    type: "warning",
                    confirmButtonText: "Ok",
                    closeOnConfirm: true
                });
        }
    </script>

</head>

<body cz-shortcut-listen="true">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Projeto FBD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../listarCliente.php">Listar Clientes</a></li>
                <li><a href="../listarEstado.php">Listar Estados</a></li>
                <li><a href="#">Listar Itens</a></li>
                <li><a href="#">Listar Pedidos</a></li>
                <li><a href="#">Listar Produtos</a></li>
                <li><a href="#">Listar Unidades de Estoque</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../listarCliente.php">Listar Clientes</a></li>
                <li><a href="../listarEstado.php">Listar Estados</a></li>
                <li><a href="#">Listar Itens</a></li>
                <li><a href="#">Listar Pedidos</a></li>
                <li><a href="#">Listar Produtos</a></li>
                <li><a href="#">Listar Unidades de Estoque</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Editar Unidade</h1>

            <form name="myForm" method="post">
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" name="descricao" value="<?=$descricao;?>">

                    <input type="hidden" name="codUnidade" value="<?=$codUnidade?>"/>
                </div>

                <button type="button" class="btn btn-default" onclick="editar();">Salvar</button>
            </form>

        </div>
    </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>

