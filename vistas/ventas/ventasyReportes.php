<?php
require_once "../../clases/conexion.php";
require_once "../../clases/ventas.php";

$c = new conectar();
$conexion = $c->conexion();

$obj = new ventas();
$sql = "SELECT id_venta, 
            fechaCompra,
            id_cliente
    FROM ventas GROUP BY id_venta";
$result = mysqli_query($conexion, $sql);
?>


<div>
    <h1>Venta de Productos</h1>
    <table>
        <caption class="title-table">Reportes y Ventas</caption>
        <thead class="head-table">
            <tr>
                <th>foto </th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total de compra</th>
                <th>Ticket</th>
                <th>Reporte</th>

            </tr>
        </thead>
        <?php while ($ver = mysqli_fetch_row($result)): ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $ver[0] ?>
                    </td>
                    <td>
                        <?php echo $ver[1] ?>
                    </td>
                    <td>
                        <?php
                        if ($obj->nombreCliente($ver[2]) == "sc") {
                            echo "S/C";
                        } else {
                            echo $obj->nombreCliente($ver[2]);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        echo "$" . $obj->obtenerTotal($ver[0])
                            ?>
                    </td>
                    <td>

                        <a href="../procesos/ventas/crearTicketPdf.php?idventa=<?php echo $ver[0] ?>">
                            <span class="icon-lista"> Lista</span>
                        </a>
                    </td>
                    <td>
                        <a href="../procesos/ventas/crearReportePdf.php?idventa=<?php echo $ver[0] ?>">
                        <span class="icon-reporte"> Reporte</span>
                        </a>

                    </td>
                </tr>
            </tbody>
        <?php endwhile; ?>
    </table>

</div>