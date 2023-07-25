<?php
// session_start();

require_once "../../clases/conexion.php";
require_once "../../clases/clientes.php";

// print_r($_POST['nombreU']);

$obj=new clientes();
$datos=array(
    $_POST['idClienteU'],
    $_POST['nombreU'],
    $_POST['apellidosU'],
    $_POST['direccionU'],
    $_POST['emailU'],
    $_POST['telefonoU'],
    $_POST['rfcU']
);

echo $obj->actualizaCliente($datos);

?>