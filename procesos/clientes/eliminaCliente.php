<?php

require_once"../../clases/conexion.php";
require_once"../../clases/clientes.php";

$idcliente=$_POST['idcliente'];
$obj=new clientes;

echo $obj->eliminaCliente($idcliente);

?>