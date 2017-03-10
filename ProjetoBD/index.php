<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projeto FBD</title>

    <link href="GUI/css/bootstrap.min.css" rel="stylesheet">
    <link href="GUI/css/projetofbd.css" rel="stylesheet">

      <!--    Line written with the purpose of hiding the navbar-->
      <style>
          @media (min-width: 768px) {.navbar-nav {  display: none !important;  }}

          #logo
          {
              max-width: 120px;
              max-height: 120px;
              margin: auto;
          }

          #bemvindo
          {
              margin-top: 1%;
              font-size: 5em;
              font-family: "Estrangelo Talada";
          }

          #descricao
          {
              float: left;
              text-align: justify;
          }
          .
      </style>

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
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="GUI/cliente/listar.php">Listar clientes</a></li>
            <li><a href="GUI/estado/listar.php">Listar estados</a></li>
            <li><a href="GUI/item/listar.php">Listar itens</a></li>
            <li><a href="GUI/pedido/listar.php">Listar pedidos</a></li>
            <li><a href="GUI/produto/listar.php">Listar produtos</a></li>
            <li><a href="GUI/unidadeEstoque/listar.php">Listar unidades de estoque</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
              <li><a href="GUI/cliente/listar.php">Listar clientes</a></li>
              <li><a href="GUI/estado/listar.php">Listar estados</a></li>
              <li><a href="GUI/item/listar.php">Listar itens</a></li>
              <li><a href="GUI/pedido/listar.php">Listar pedidos</a></li>
              <li><a href="GUI/produto/listar.php">Listar produtos</a></li>
              <li><a href="GUI/unidadeEstoque/listar.php">Listar unidades de estoque</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <img id="logo" class="img-responsive" src="GUI/img/logo.png"/>

        <h2 id="bemvindo" class="cabecalho"><strong>Bem-vindo!</strong></h2>
            <div class="cabecalho">
                <h3 class="col-md-8 col-md-offset-2">
                    Esse é o CRUD do banco de dados usado por uma
                    empresa para controle de vendas e entregas em domicilio.
                </h3>
                <br/><br/><br/><br/><br/><br/><br/><br/>

                <div id="descricao">
                    <h4>Curso: Bacharelado em Sistemas de Informação</h4>
                    <h4>Disciplina: Fundamentos de Banco de Dados</h4>
                    <h4>Docente: Roberta Macêdo</h4>
                    <h4>Grupo: Jonathan Henrique e Romero Claudino</h4>
                </div>

            </div>
            </div>
          </div>
        </div>
      </div>

    <form name="hiddenForm" method="post">
        <input type="hidden" name="codCliente"/>
    </form>
    
    <script src="GUI/js/jquery.min.js"></script>
    <script src="GUI/js/bootstrap.min.js"></script>
    <script src="GUI/js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>

  </body>
</html>