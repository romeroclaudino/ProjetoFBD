<?php

require_once "../../DAO/ProdutoDAO.php";
require_once "../../DAO/PedidoDAO.php";

$produtos = ProdutoDAO::getProdutos();
$pedidos = PedidoDAO::getPedidos();

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
        function salvar(){

            var codPedido = document.myForm.codPedido.value;
            var codProduto = document.myForm.codProduto.value;
            var quantidade = document.myForm.quantidade.value;

            if((codPedido != "") && (codProduto != "") && (quantidade != "") && (quantidade>=1))
            {
                document.myForm.action = "cadastrar.php";
                document.myForm.submit();
            }
            else
                swal({
                    title: "Valor inválido!",
                    text: "Você deve preencher os campos corretamente!",
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
                <li><a href="../cliente/listar.php">Listar clientes</a></li>
                <li><a href="../estado/listar.php">Listar estados</a></li>
                <li><a href="listar.php">Listar itens</a></li>
                <li><a href="../pedido/listar.php">Listar pedidos</a></li>
                <li><a href="../produto/listar.php">Listar produtos</a></li>
                <li><a href="../unidadeEstoque/listar.php">Listar unidades de estoque</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="../cliente/listar.php">Listar clientes</a></li>
                <li><a href="../estado/listar.php">Listar estados</a></li>
                <li><a href="listar.php">Listar itens</a></li>
                <li><a href="../pedido/listar.php">Listar pedidos</a></li>
                <li><a href="../produto/listar.php">Listar produtos</a></li>
                <li><a href="../unidadeEstoque/listar.php">Listar unidades de estoque</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Cadastro de itens</h1>

            <form name="myForm" method="post">
                <div class="form-group">
                    <label for="codPedido">Cod. do pedido:</label>
                    <select class="form-control" data-live-search="true" name="codPedido">
                        <option value="" selected>Selecione</option>

                        <?php
                        while($pedidoTemp = array_shift($pedidos))
                            echo "<option value=\"".$pedidoTemp->getCodPedido()."\">".$pedidoTemp->getCodPedido()."</option>";
                        ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="codProduto">Cod. do produto:</label>
                    <select class="form-control" data-live-search="true" name="codProduto">
                        <option value="" selected>Selecione</option>

                        <?php
                        while($produtoTemp = array_shift($produtos))
                            echo "<option value=\"".$produtoTemp->getCodProduto()."\">".$produtoTemp->getCodProduto()."</option>";
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" min="1" class="form-control" name="quantidade">
                </div>

                <button type="button" class="btn btn-default" onclick="salvar();">Salvar</button>
            </form>

        </div>
    </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>