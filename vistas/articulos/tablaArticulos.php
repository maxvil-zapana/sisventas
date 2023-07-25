<?php
require_once "../../clases/conexion.php";
$c = new conectar();
$conexion = $c->conexion();
$sql = "SELECT  art.id_producto,
                art.nombre,
                art.descripcion,
                art.cantidad,
                art.precio,
                img.ruta,
                cat.nombreCategoria      
from articulos as art
inner join imagenes as img 
on art.id_imagen=img.id_imagen
inner join categorias as cat
on art.id_categoria=cat.id_categoria";

$result = mysqli_query($conexion, $sql);

?>


<table>
    <caption class="title-table">Articulos</caption>
    <thead class="head-table">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($ver = mysqli_fetch_row($result)): ?>
            <tr>
                <td><?php echo $ver[1]; ?></td>
                <td><?php echo $ver[2]; ?></td>
                <td><?php echo $ver[3]; ?></td>
                <td><?php echo $ver[4]; ?></td>

                <td>
                    <?php
                    $imgVer = explode("/", $ver[5]);
                    $imgRuta = $imgVer[1] . "/" . $imgVer[2] . "/" . $imgVer[3];
                    ?>

                    <img width="80" height="80" src="<?php echo $imgRuta ?>" alt="">
                </td>
                <td>
                    <?php echo $ver[6]; ?>
                </td>
                <td class="cell-center">
                    <span class="icon-pencil"onclick="agregaDatosArticulo('<?php echo $ver[0]?>')"></span>
                    
                </td>
                <td class="cell-center">
                    <span class="icon-remove" onclick="eliminarArticulo('<?php echo $ver[0]?>')"></span>
                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>
</table>