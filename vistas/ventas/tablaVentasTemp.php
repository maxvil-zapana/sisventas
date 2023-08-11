<?php
session_start();

print_r($_SESSION['tablaComprasTemp']);




?>
<h4>Hacer Venta</h4>
<div class="botones">
    <span class="boton verde" id="botonAgrega">Generar Venta</span>
</div>
<table>
    <caption class="title-table" id="nombreClienteVenta"></caption>
    <thead class="head-table">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Quitar</th>
        </tr>
    </thead>

    <?php
    $total = 0; //esta variable tendra el total de la compra en dinero
    $cliente="";//en esta se guarda el nombre del cliente
    if (isset($_SESSION['tablaComprasTemp'])):
        foreach(@$_SESSION['tablaComprasTemp'] as $key){
            $d=explode("||", @$key );
    ?>
    <tbody>
        <tr>
            <td><?php echo $d[1]?></td>
            <td><?php echo $d[2]?></td>
            <td><?php echo $d[3]?></td>
            <td><?php echo 1?></td>
            
            <td class="cell-center">
                <span class="icon-remove"></span>
            </td>
        </tr>
    </tbody>
<?php }endif;?>
</table>