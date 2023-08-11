<?php
class ventas
{
    public function obtenDatosProducto($idproducto)
    {

        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT  art.nombre,
                        art.descripcion,
                        art.cantidad,
                        img.ruta,
                        art.precio
                FROM articulos as art
                INNER JOIN imagenes as img
                ON art.id_imagen=img.id_imagen
                AND art.id_producto='$idproducto'";

        $result = mysqli_query($conexion, $sql);
        $ver = mysqli_fetch_row($result);

        $d=explode('/',$ver[3]);

        $img=$d[1].'/'.$d[2].'/'.$d[3];

        $data = array(
            'nombre' => $ver[0],
            'descripcion' => $ver[1],
            'cantidad' => $ver[2],
            'ruta'=> $img,
            'precio' => $ver[4]
        );
        return $data;

    }
}
?>