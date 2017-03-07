<?php

require_once "../DAO/EstadoDAO.php";
$estados = EstadoDAO::getEstados();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projeto FBD</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/projetofbd.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert.css">

    <style type="text/css">  @media (min-width: 768px) {.navbar-nav {  display: none !important;  }}  </style>

    <script>

        //Script to send the form

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
                <li><a href="listarCliente.php">Listar clientes</a></li>
                <li><a href="listarEstado.php">Listar estados</a></li>
                <li><a href="#">Listar produtos</a></li>
                <li><a href="#">Listar pedidos</a></li>
                <li><a href="#">Listar unidades de estoque</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="listarCliente.php">Listar clientes</a></li>
                <li><a href="listarEstado.php">Listar estados</a></li>
                <li><a href="#">Listar produtos</a></li>
                <li><a href="#">Listar pedidos</a></li>
                <li><a href="#">Listar unidades de estoques</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Cadastro de clientes</h1>

            <form>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome">
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="endereco">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade">
                </div>

                <div class="form-group">
                <label for="codEstado">Estado:</label>
                <select class="form-control" data-live-search="true" id="codEstado">
                    <option value="" selected>Selecione</option>

                    <?php
                    while($estadoTemp = array_shift($estados))
                        echo "<option value=\"".$estadoTemp->getCodEstado()."\">".$estadoTemp->getNome()."</option>";
                    ?>

                </select>
                </div>

                <div class="form-group">
                    <label for="CEP">CEP:</label>
                    <input type="text" class="form-control" id="CEP">
                </div>
                <div class="form-group">
                    <label for="percentualDesc">Percentual de desconto:</label>
                    <input type="text" class="form-control" id="percentualDesc">
                </div>

                <button type="button" class="btn btn-default" onclick="">Salvar</button>
            </form>

            </div>
        </div>
    </div>
</div>

<form name="hiddenForm" method="post">
    <input type="hidden" name="codCliente"/>
</form>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>