<?php
    require_once "../../clases/conexion.php";

    $c=new conectar();
    $conexion=$c->conexion();

    $sql="SELECT id_usuario, 
                nombre,
                apellido,
                email
            FROM  usuarios";

$result =mysqli_query($conexion, $sql);

?>
<table>
    <caption class="title-table">Usuarios</caption>
    <thead class="head-table">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <?php
    while ($ver=mysqli_fetch_row($result)):
    ?>
    <tbody>
        <tr>
            <td><?php echo $ver[1];?></td>
            <td><?php echo $ver[2];?></td>
            <td><?php echo $ver[3];?></td>
            <td class="cell-center">
                <span class="btn-warnig" onclick="agregaDatosUsuario('<?php echo $ver[0]; ?>') "><span class="icon-pencil"></span>
                </span>
            </td>
            <td class="cell-center">
                <span class="icon-remove" onclick="eliminaUsuario('<?php echo $ver[0];?>')"></span>
            </td>
        </tr>
    </tbody>
    <?php endwhile;?>
</table>