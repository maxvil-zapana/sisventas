<?php 
require_once "../../clases/conexion.php";

$obj=new conectar();
$conexion =$obj->conexion();

$sql="SELECT id_cliente,
            nombre,
            apellido,
            direccion,
            email,
            telefono,
            rfc
    FROM clientes";

$result = mysqli_query($conexion,$sql);
?>


<table>
    <caption class="title-table">Clientes</caption>
    <thead class="head-table">
        <tr>
            <th>nombres</th>
            <th>apellido</th>
            <th>direccion</th>
            <th>email</th>
            <th>telefono</th>
            <th>RFC</th>
            <th>editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <?php while($ver=mysqli_fetch_row($result)):   ?>

    <tbody>
        <tr>
            <td><?php echo $ver[1]; ?></td>
            <td><?php echo $ver[2]; ?></td>
            <td><?php echo $ver[3]; ?></td>
            <td><?php echo $ver[4]; ?></td>
            <td><?php echo $ver[5]; ?></td>
            <td><?php echo $ver[6]; ?></td>
            <td class="cell-center">
                <span class="btn-warnig" onclick="agregaDatosCliente('<?php echo $ver[0];?>')"><span class="icon-pencil"></span>
                </span>
            </td>
            <td class="cell-center">
                <span class="icon-remove" onclick="eliminarCliente('<?php echo $ver[0];?>')"></span>
            </td>
        </tr>
    </tbody>

    <?php endwhile;?>
</table>