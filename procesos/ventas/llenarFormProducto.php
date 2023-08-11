<?php
    require_once"../../clases/conexion.php";
    require_once"../../clases/ventas.php";

    $obj=new ventas();

    echo json_encode($obj->obtenDatosProducto($_POST['idproducto']));

?>