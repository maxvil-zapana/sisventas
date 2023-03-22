<?php

require_once"../../clases/conexion.php";
$c=new conectar();
$conexion=$c->conexion();
$sql="SELECT id_categoria, nombreCategoria FROM categorias";
$result=mysqli_query($conexion,$sql);
?>


<table>
    <caption class="title-table">Categorias</caption>
    <thead class="head-table">
        <tr>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($ver=mysqli_fetch_row($result)):
        ?>
        <tr>
            <td><?php echo $ver[1]?></td>
            <td class="cell-center">
                <span class="icon-pencil" data-toggle="modal" data-target="#actualizaCategoria"onclick="agregaDato('<?php echo $ver[0] ?>
                ','<?php echo $ver[1] ?>')">
                </span>
            </td>
            <td class="cell-center">
                <span class="icon-remove"onclick="eliminarCategoria('<?php echo $ver[0] ?>')"></span>
            </td>
        </tr>
        <?php
        endwhile;
        ?>
    </tbody>
</table