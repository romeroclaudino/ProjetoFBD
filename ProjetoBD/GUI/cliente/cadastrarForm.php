<?php

require_once "../../DAO/EstadoDAO.php";
$estados = EstadoDAO::getEstados();

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

            if(document.myForm.nome.value != "" && document.myForm.endereco.value != "" && document.myForm.cidade.value != ""
                && document.myForm.codEstado.value != "" && document.myForm.CEP.value != ""
                && document.myForm.percentualDesconto.value != "")
            {
                if(document.myForm.percentualDesconto.value > 0 && document.myForm.percentualDesconto.value < 100)
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
                <li><a href="listar.php">Listar clientes</a></li>
                <li><a href="../estado/listar.php">Listar estados</a></li>
                <li><a href="../item/listar.php">Listar itens</a></li>
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
                <li><a href="listar.php">Listar clientes</a></li>
                <li><a href="../estado/listar.php">Listar estados</a></li>
                <li><a href="../item/listar.php">Listar itens</a></li>
                <li><a href="../pedido/listar.php">Listar pedidos</a></li>
                <li><a href="../produto/listar.php">Listar produtos</a></li>
                <li><a href="../unidadeEstoque/listar.php">Listar unidades de estoque</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Cadastro de clientes</h1>

            <form name="myForm" method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" name="cidade">
                </div>

                <div class="form-group">
                <label for="codEstado">Estado:</label>
                <select class="form-control" data-live-search="true" name="codEstado">
                    <option value="" selected>Selecione</option>

                    <?php
                    while($estadoTemp = array_shift($estados))
                        echo "<option value=\"".$estadoTemp->getCodEstado()."\">".$estadoTemp->getNome()."</option>";
                    ?>

                </select>
                </div>

                <div class="form-group">
                    <label for="CEP">CEP:</label>
                    <input type="text" class="form-control" name="CEP">
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="number" class="form-control" name="telefone">
                </div>

                <div class="form-group">
                    <label for="percentualDesconto">Percentual de desconto:</label>
                    <input type="number" min="0" step="0.1" class="form-control" name="percentualDesconto">
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