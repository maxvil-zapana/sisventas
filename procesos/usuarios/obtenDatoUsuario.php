<?php
require_once"../../clases/conexion.php";
require_once"../../clases/usuarios.php";

$jsonData=file_get_contents('php://input');
$data=json_decode($jsonData,true);

$idusuario=$data['valor'];

$obj=new usuarios;

echo json_encode($obj->obtenDatosUsuario($idusuario));

?>