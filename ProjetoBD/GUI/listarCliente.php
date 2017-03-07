<?php

require_once "../DAO/ClienteDAO.php";
require_once "../DAO/EstadoDAO.php";
$clientes = ClienteDAO::getClientes();

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

      <!--    Line written with the purpose of hiding the navbar-->
      <style> @media (min-width: 768px) {.navbar-nav {  display: none !important;  }} </style>

      <script>
          function editar(codCliente){
              document.hiddenForm.codCliente.value = codCliente;
              document.hiddenForm.action = "editarClienteForm.php";
              document.hiddenForm.submit();
          }
          function remover(codCliente){
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
                      document.hiddenForm.codCliente.value = codCliente;
                      document.hiddenForm.action = "removerCliente.php";
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
          <a class="navbar-brand" href="#">Projeto FBD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Listar clientes</a></li>
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
            <li class="active"><a href="#">Listar clientes</a></li>
            <li><a href="listarEstado.php">Listar estados</a></li>
            <li><a href="#">Listar produtos</a></li>
            <li><a href="#">Listar pedidos</a></li>
            <li><a href="#">Listar unidades de estoques</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Clientes</h1>

        <a href="cadastrarClienteForm.php" >
            <button type="button" class="btn btn-default">Cadastrar novo cliente</button>
        </a>

            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                      <th class="cabecalho">Nome</th>
                      <th class="cabecalho">Endereço</th>
                      <th class="cabecalho">Cidade</th>
                      <th class="cabecalho">Estado</th>
                      <th class="cabecalho">CEP</th>
                      <th class="cabecalho">Telefone</th>
                      <th class="cabecalho">PercentualDesconto</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                while($clienteTemp = array_shift($clientes)){
                    ?>
                    <tr align="center">
                        <td ><?=$clienteTemp->getNome();?></td>
                        <td><?=$clienteTemp->getEndereco();?></td>
                        <td><?=$clienteTemp->getCidade();?></td>

                        <td><?=EstadoDAO::getNome($clienteTemp->getCodEstado());?></td>

                        <td><?=$clienteTemp->getCep();?></td>
                        <td><?=$clienteTemp->getTelefone();?></td>
                        <td><?=$clienteTemp->getPercentualDesconto();?></td>
                        <td><button class="btn btn-primary" onclick="editar(<?=$clienteTemp->getCodCliente();?>);">Editar</button>
                        <td><button class="btn btn-danger" onclick="remover(<?=$clienteTemp->getCodCliente();?>);">Remover</button>
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
        <input type="hidden" name="codCliente"/>
    </form>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>

  </body>
</html>