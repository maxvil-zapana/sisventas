<?php
session_start();
if (isset($_SESSION['usuario'])) {
    // echo $_SESSION['usuario'];
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Ventas</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="contenedor">
            <div class="grid col-6">
                <div class="span-2">
                    <h1 class="texto-centrado">Venta de Productos</h1>
                    <div class="botones">
                        <span class="boton verde" id="ventaProductosBtn">Vender Producto</span>
                        <span class="boton" id="ventasHechasBtn">Ventas hechas</span>
                    </div>
                </div>
                <div class="span-4"></div>
                <div class="span-6 grid col-6">
                    <div id="ventaProductos" class="span-2">

                    </div>
                    <div id="ventasHechas" class="span-6">

                    </div>
                </div>
            </div>
        </div>

        <section style="text-align: center;">
            <select id="controlBuscador" style="width: 50%">
                <option value="A">Selecciona Categoria</option>
            </select>
        </section>


        <script type="text/javascript">
            $(document).ready(function () {
                $('#controlBuscador').select2();
            });
        </script>

    </body>

    </html>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#ventaProductosBtn').click(function () {
                esconderSeccionVenta();
                $('#ventaProductos').load('ventas/ventasDeProductos.php');
                $('#ventaProductos').show();
            })

            $('#ventasHechasBtn').click(function () {
                esconderSeccionVenta();
                $('#ventasHechas').load('ventas/ventasyReportes.php');
                $('#ventasHechas').show();
            })

        });

        function esconderSeccionVenta() {
            $('#ventaProductos').hide();
            $('#ventasHechas').hide();
        }
    </script>



    <!-- <script type="text/javascript">

    window.onload=function(){



            const ventaProductosBtn = document.getElementById("ventaProductosBtn");
            const ventasHechasBtn = document.getElementById("ventasHechasBtn");

                const ventaproductos=document.getElementById("ventaProductos");

            ventaProductosBtn.addEventListener('click', () => {
                esconderSeccionVenta();

                load(ventaProductos, 'ventas/ventasDeProductos.php')
                ventaProductos.style.display = "block"
                // ventaProductos.style.visibility = 'visible'
            })
            ventasHechasBtn.addEventListener('click', () => {


                esconderSeccionVenta();
                load(ventasHechas, 'ventas/ventasyReportes.php')
                ventasHechas.style.display = "block"
            })
            function esconderSeccionVenta() {
                ventaProductos.style.display = "none"
                ventasHechas.style.display = "none"

                /* ¡	la diferencia es que lo s primeros desaparecen el div y los segundos solo ocultan el contenido  	! */
                // ventasHechas.style.display="none"
                // ventasHechas.style.display="block"

                // ventasHechas.style.visibility = 'hidden'
                // ventasHechas.style.visibility = 'visible'
            }


    }

        </script> -->
    <?php
} else {
    header("location:../index.php");
}
?>