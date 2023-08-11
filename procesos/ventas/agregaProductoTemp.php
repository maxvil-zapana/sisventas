<?php
session_start();
require_once "../../clases/conexion.php";
$c=new conectar();
$conexion=$c->conexion();


$idcliente=$_POST['clienteVenta'];
$idproducto=$_POST['productoVenta'];
$descripcion=$_POST['descripcionV'];
$cantidad=$_POST['cantidadV'];
$precio=$_POST['precioV'];

$sql ="SELECT nombre, apellido
        FROM clientes
        WHERE id_cliente='$idcliente'";
$result=mysqli_query($conexion,$sql);

$cli=mysqli_fetch_row($result);

$nomcliente=$cli[1]." ".$cli[0];

$sql="SELECT nombre 
        FROM articulos 
        WHERE id_producto='$idproducto'";

$result=mysqli_query($conexion, $sql);

$nombreproducto=mysqli_fetch_row($result)[0];

$articulo=$idproducto."||".
$nombreproducto."||".
$descripcion."||".
$precio."||".
$nomcliente."||".
$idcliente;

$_SESSION['tablaComprasTemp'][]=$articulo;


?>