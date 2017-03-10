<?php

require_once "../../DAO/PedidoDAO.php";
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
        function editar(codPedido){
            document.hiddenForm.codPedido.value = codPedido;
            document.hiddenForm.action = "editarForm.php";
            document.hiddenForm.submit();
        }
        function remover(codPedido){
            swal({
                    title: "Tem certeza ?",
                    text: "Você não terá acesso a esse registro novamente!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, remova-o!",
                    closeOnConfirm: false
                },
                function(){
                    document.hiddenForm.codPedido.value = codPedido;
                    document.hiddenForm.action = "remover.php";
                    document.hiddenForm.submit();
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
            <a class="navbar-brand" href="../../index.php">Projeto FBD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../cliente/listar.php">Listar clientes</a></li>
                <li><a href="../estado/listar.php">Listar estados</a></li>
                <li><a href="../item/listar.php">Listar itens</a></li>
                <li><a href="#">Listar pedidos</a></li>
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
                <li><a href="../item/listar.php">Listar itens</a></li>
                <li class="active"><a href="#">Listar pedidos</a></li>
                <li><a href="../produto/listar.php">Listar produtos</a></li>
                <li><a href="../unidadeEstoque/listar.php">Listar unidades de estoque</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Pedidos</h1>

            <a href="cadastrarForm.php" >
                <button type="button" class="btn btn-default">Cadastrar novo pedido</button>
            </a>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="cabecalho">Cod.</th>
                            <th class="cabecalho">Tipo</th>
                            <th class="cabecalho">Cliente</th>
                            <th class="cabecalho">Data de entrada</th>
                            <th class="cabecalho">Data de embarque</th>
                            <th class="cabecalho">Desconto</th>
                            <th class="cabecalho">Valor total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($pedidoTemp = array_shift($pedidos)){
                        ?>
                        <tr align="center">
                            <td><?=$pedidoTemp->getCodPedido()?></td>
                            <td><?=$pedidoTemp->getTipo()?></td>
                            <td><?=$pedidoTemp->getCodCliente()?></td>
                            <td><?=$pedidoTemp->getDtEntrada()?></td>
                            <td><?=$pedidoTemp->getDtEmbarque()?></td>
                            <td><?=$pedidoTemp->getDesconto()." %"?></td>
                            <td><?="R$ ".$pedidoTemp->getValorTotal()?></td>


                            <td><button class="btn btn-primary" onclick="editar(<?=$pedidoTemp->getCodPedido();?>);">Editar</button>
                            <td><button class="btn btn-danger" onclick="remover(<?=$pedidoTemp->getCodPedido();?>);">Remover</button>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form name="hiddenForm" method="post">
    <input type="hidden" name="codPedido"/>
</form>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
