<?php

require_once "../DAO/ClienteDAO.php";
require_once "../DAO/EstadoDAO.php";
$codCliente = $_REQUEST['codCliente'];
$cliente = ClienteDAO::getCliente($codCliente);
$estados = EstadoDAO::getEstados();



?>