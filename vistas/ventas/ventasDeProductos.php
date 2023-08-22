<?php
require_once "../../clases/conexion.php";
$c = new conectar();
$conexion = $c->conexion();
?>
<div class="span-2">
    <form action="" id="frmArticulos" name="frmArticulos" enctype="multipart/form-data">
        <fieldset>
            <legend class="tituloForm">Vender un producto</legend>
            <label for="clienteVenta">Selecciona Cliente</label>
            <select name="clienteVenta" id="clienteVenta" class="icon-select">
                <option value="A">Selecciona Categoria</option>
                <option value="0">Sin cliente</option>
                <?php
                $sql = "SELECT id_cliente, nombre, apellido
                        FROM clientes";
                $result = mysqli_query($conexion, $sql);
                while ($cliente = mysqli_fetch_row($result)):
                    ?>
                    <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[2] . " " . $cliente[1] ?></option>
                <?php endwhile; ?>
            </select>
            <label for="">Selecciona Producto</label>
            <select name="productoVenta" id="productoVenta" class="icon-select">
                <option value="A">Selecciona</option>
                <?php
                $sql = "SELECT id_producto,
                                nombre
                        FROM articulos";
                $result = mysqli_query($conexion, $sql);
                while ($producto = mysqli_fetch_row($result)):
                    ?>
                    <option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
                <?php endwhile; ?>
            </select>
            <label for="descripcionV">Descripción</label>
            <input type="text" name="descripcionV" id="descripcionV" class="icon-user">

            <label for="cantidadV">Cantidad:</label>
            <input type="text" name="cantidadV" id="cantidadV" class="icon-amount" readonly>

            <label for="precioV">Precio:</label>
            <input type="text" name="precioV" id="precioV" class="icon-description" readonly>

            </br>
            <div class="botones">
                <span class="boton verde btn_center" id="botonAgrega">Agregar</span>
                <span class="boton verde btn_center" id="btnVaciarVentas">Vaciar venta</span>
            </div>
        </fieldset>
    </form>
    <img src="" alt="" id="imgProducto">
</div>

<div id="tablaVentasTempLoad" class="span-4">


</div>



<script type="text/javascript">
    async function quitarP(index) {

        const objeto = {
            method: 'POST',
            url: '../procesos/ventas/quitarProducto.php',
            info: 'ind=' + index
        }

        const respuesta = await ajax(objeto)
        console.log(respuesta.response);

        if (respuesta.status == 200) {
            load(tablaVentasTempLoad, "ventas/tablaVentasTemp.php");
            alertify.success("Se quito el producto")
        } else {
            alertify.alert("no se pudo eliminar el producto")
        }
    }

    async function crearVenta() {
        const objeto = {
            method: 'POST',
            url: '../procesos/ventas/crearVenta.php'
        }


        const respuesta = await ajax(objeto)

        console.log(respuesta.response);

        if (respuesta.response > 0) {
            load(tablaVentasTempLoad, "ventas/tablaVentasTemp.php");
            frmArticulos.reset()
            alertify.alert("venta creada con exito, consulte la información de esta en ventas hechas :D")
        } else if (respuesta.response == 0) {
            alertify.alert("No hay lista de venta!!");
        } else {
            alertify.error("No se pudo crear la venta");
        }

       
    }


</script>

<!-- ==============================
   *	CARGA CONTENIDO DE BOTONES	*
   ===============================-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#clienteVenta').select2();
        $('#productoVenta').select2();
    });
</script>

<!-- ======================
   *	VENTA PRODUCTO	*
   ====================== -->


<script type="text/javascript">

    /*===	trae datos de producto	===*/

    const productoVenta = document.getElementById('productoVenta');
    productoVenta.onchange = async function () {
        const objeto = {
            method: 'POST',
            url: '../procesos/ventas/llenarFormProducto.php',
            info: "idproducto=" + productoVenta.value
        }

        const respuesta = await ajax(objeto);
        valor = JSON.parse(respuesta.response);
        console.log(valor['nombre']);
        document.getElementById('descripcionV').value = valor['descripcion'];
        document.getElementById('cantidadV').value = valor['nombre'];
        document.getElementById('precioV').value = valor['precio'];
        document.getElementById('imgProducto').src = valor['ruta'];

    }

    /*===	valida y envia datos del formulario	===*/

    const botonAgregaVenta = document.getElementById('botonAgrega')


    botonAgregaVenta.addEventListener('click', async () => {



        const datos = serialize(frmArticulos);
        const vacios = validarFormVacio(datos);
        if (vacios > 0) {
            alertify.alert("Debes llenar todos los campos");
            return false;
        } else {
            const objeto = {
                method: 'POST',
                url: '../procesos/ventas/agregaProductoTemp.php',
                info: datos
            }
            const respuesta = await ajax(objeto)
            console.log(respuesta.status);

            if (respuesta.status == 200) {
                load(tablaVentasTempLoad, "ventas/tablaVentasTemp.php");
                alertify.alert("Articulo Agregado con exito");
            }
            else {
                alertify.error("No se pudo actualizar Articulo")
            }
        }
    })

    // /*=== Vacia tabla 		===*/
    // btnVaciarVentas.onclick = function () {
    //     const objeto = {
    //         method: 'POST',
    //         url: '../procesos/ventas/vaciarTemp.php'
    //     }
    //     const respuesta = ajax(objeto);
    //     console.log(respuesta);

    //     if (respuesta.status===200) {

    //         alertify.alert("Vaciado Correcto");
    //     } else {
    //         alertify.alert("Error al vaciar")
    //     }

    // }


    btnVaciarVentas.onclick = function () {
        const objeto = {
            method: 'POST',
            url: '../procesos/ventas/vaciarTemp.php'
        };

        ajax(objeto)
            .then(function (respuesta) {
                console.log(respuesta);

                if (respuesta.status === 200) {
                    load(tablaVentasTempLoad, "ventas/tablaVentasTemp.php");
                    alertify.alert("Vaciado Correcto");
                } else {
                    alertify.alert("Error al vaciar");
                }
            })
            .catch(function (error) {
                console.error('Error durante la solicitud AJAX:', error);
                alertify.alert("Error al vaciar");
            });
    };

</script>