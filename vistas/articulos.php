<?php
session_start();
if (isset($_SESSION['usuario'])) {
    // echo $_SESSION['usuario'];
    ?>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Artículos</title>
        <?php require_once "menu.php"; ?>
        <?php require_once "../clases/conexion.php";
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "SELECT id_categoria, nombreCategoria
                    from categorias";
        $result = mysqli_query($conexion, $sql);


        ?>
    </head>

    <body>
        <div class="contenedor">
            <div class="grid col-6">
                <div class="span-2">
                    <!-- -	DETALLE:
                                -	enctype="multipart/form-data"
                                -	sirve para que dentro del formulario se pueda subir archivos
                                -	para el input type file	-->

                    <form id="frmArticulos" name="frmArticulos" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="tituloForm">Nuevo Artículo</legend>
                            <label for="categoria">Categoria:</label></br>
                            <select name="categoriaSelect" id="categoriaSelect" class="icon-select">
                                <option value="A">Selecciona Categoria</option>
                                <?php while ($ver = mysqli_fetch_row($result)): ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                                <?php endwhile; ?>
                            </select>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="icon-user">

                            <label for="descripcion">Descripción:</label>
                            <input type="text" name="descripcion" id="descripcion" class="icon-amount">

                            <label for="cantidad">Cantidad:</label>
                            <input type="text" name="cantidad" id="cantidad" class="icon-description">
                            <label for="precio">Precio:</label>
                            <input type="number" name="precio" id="precio" class="icon-price">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="icon-picture">
                            </br>
                            <div class="botones">
                                <span class="boton verde btn_center" id="btnAgregarArticulo">Agregar</span>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="span-4" id="tablaArticuloLoad">

                </div>
            </div>
        </div>

        <!-- ======================
              *	VENTANA	MODAL   *
            ====================== -->
        <div id="abremodalUpdateArticulo" class="modal">
            <div class="modal-content">
                <div class="modal-head">
                    <span class="close" id="close">&times;</span>
                    <h4 class="title">Actualiza Articulo</h4>
                </div>
                <div class="modal-body">

                    <form id="frmArticulosU" name="frmArticulosU" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="tituloForm">Edita Articulo</legend>
                            <input type="hidden" id="idArticulo" name="idArticulo">

                            <label for="categoria">Categoria:</label></br>
                            <select name="categoriaSelectU" id="categoriaSelectU" class="icon-select">
                                <option value="A">Selecciona Categoria</option>
                                <?php
                                $sql = "SELECT id_categoria, nombreCategoria from categorias";
                                $result = mysqli_query($conexion, $sql);
                                ?>

                                <?php while ($ver = mysqli_fetch_row($result)): ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                                <?php endwhile; ?>
                            </select>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombreU" id="nombreU" class="icon-user">

                            <label for="descripcion">Descripción:</label>
                            <input type="text" name="descripcionU" id="descripcionU" class="icon-amount">

                            <label for="cantidad">Cantidad:</label>
                            <input type="text" name="cantidadU" id="cantidadU" class="icon-description">
                            <label for="precio">Precio:</label>
                            <input type="number" name="precioU" id="precioU" class="icon-price">
                            </br>
                        </fieldset>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="boton" id="btnActualizaArticulo">Actualizar</button>
                </div>
            </div>
        </div>
    </body>

    </html>
    <!-- ======================
   *	VENTANA EDITAR MODAL
   ====================== -->
    <!--===	obtiene los datos de los articulos registrados	===-->
    <script type="text/Javascript">

                                                        /*===	oculta el modal al cargar la pagina	===*/
                                                        window.onload=function(){
                                                            abremodalUpdateArticulo.style.display="none";
                                                        }

                                                        /*===	Funcion que muestra la ventana	===*/
                                                        function agregaDatosArticulo(idarticulo){
                                                            abremodalUpdateArticulo.style.display="block";

                                                            fetch('../procesos/articulos/obtenDatosArticulo.php',{
                                                                method:'POST',
                                                                headers:{'Content-Type': 'application/json'},
                                                                body: JSON.stringify({valor:idarticulo})
                                                            })
                                                            .then(response=>response.json())
                                                            .then(data=>{
                                                                document.getElementById('idArticulo').value=data['id_producto'];
                                                                document.getElementById('nombreU').value=data['nombre'];
                                                                document.getElementById('categoriaSelectU').value=data['id_categoria'];
                                                                document.getElementById('descripcionU').value=data['descripcion'];
                                                                document.getElementById('cantidadU').value=data['cantidad'];
                                                                document.getElementById('precioU').value=data['precio'];
                
                                                            })
                                                            .catch(error=>{
                                                                //manejo de errores
                                                                console.log('Ha ocurrido el siguiente error', error);
                                                            })
                                                        }

                                                        // function agregaDatosArticulo(idarticulo){
                                                        //     abremodalUpdateArticulo.style.display="block";
                                                        // 	$.ajax({
                                                        // 		type:"POST",
                                                        // 		data:"idart=" + idarticulo,
                                                        // 		url:"../procesos/articulos/obtenDatosArticulo.php",
                                                        // 		success:function(r){
                    
                                                        // 			dato=jQuery.parseJSON(r);
                                                        // 			$('#idArticulo').val(dato['id_producto']);
                                                        // 			$('#categoriaSelectU').val(dato['id_categoria']);
                                                        // 			$('#nombreU').val(dato['nombre']);
                                                        // 			$('#descripcionU').val(dato['descripcion']);
                                                        // 			$('#cantidadU').val(dato['cantidad']);
                                                        // 			$('#precioU').val(dato['precio']);

                                                        // 		}
                                                        // 	});
                                                        // }
                                                        /*===	Cierra Ventana Modal 	===*/
                                                        const close = document.getElementById('close');
                                                        close.onclick=function(){
                                                            abremodalUpdateArticulo.style.display="none";
                                                        }
                                                </script>
    <!--===	Actualiza los datos editados en la ventana modal	===-->
    <script type="text/javascript">
        const actualizaArticulo = document.getElementById('btnActualizaArticulo');
        actualizaArticulo.onclick = async function () {
            //se coloca el name del formulario
            const datos = serialize(frmArticulosU);
            const vacios = validarFormVacio(datos)
            if (vacios > 0) {
                aleritfy.alert("debes llenar los campos");
                return false
            } else {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/articulos/actualizaArticulos.php',
                    info: datos
                }
                const respuesta = await ajax(objeto)

                console.log(respuesta.response);

                if (respuesta.response == 1) {
                    load(tablaArticuloLoad, 'articulos/tablaArticulos.php');
                    abremodalUpdateArticulo.style.display = "none";

                    alertify.alert("Articulo Actualizado con éxito");
                } else {
                    alertify.error("No se pudo actualizar artículo");
                }


            }
        }

    </script>




    <script type="text/javascript">
        $(document).ready(function () {
            const tablaArticuloLoad = document.getElementById("tablaArticuloLoad");
            load(tablaArticuloLoad, 'articulos/tablaArticulos.php');



            $('#btnAgregarArticulo').click(function () {
                const formulario = document.querySelector('#frmArticulos');
                const formData = new FormData(formulario);


                const datos = serialize(frmArticulos)
                const vacios = validarFormVacio(datos);
                if (vacios > 0) {
                    alertify.alert("debes llenar todos los campos");
                    return false;
                }


                // console.log(formData);
                // fetch('../procesos/articulos/insertaArticulos.php',{

                //     method:'POST',
                //     body:formData
                // })
                // .then(response=>{
                //     if(response.ok){
                //         return response.text();
                //     }
                // })
                // .then(data=>alert(data))

                $.ajax({
                    url: "../procesos/articulos/insertaArticulos.php",
                    type: "post",
                    datatype: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (r) {
                        alert(r);

                        console.log(r);
                        if (r == 1) {
                            $('#frmArticulos')[0].reset();

                            load(tablaArticuloLoad, 'articulos/tablaArticulos.php');

                            alertify.success("Agregado con exito :D");
                        } else {
                            alertify.error("fallo al subir el archivo :(");
                        }
                    }

                })
            })
        })
    </script>
    <!-- ======================
   *	Elimina Articulo	*
   ====================== -->
    <script type="text/javascript">
        function eliminarArticulo(idArticulo) {

            const datos = "idarticulo=" + idArticulo;

            alertify.confirm('¿Desea eliminar este Articulo', async function () {
                const objeto = {
                    method: 'POST',
                    url: '../procesos/articulos/eliminarArticulo.php',
                    info: datos
                }
                const resultado = await ajax(objeto)
                console.log(resultado.response);

                if (resultado.responseText == "    1") {
                    load(tablaArticuloLoad, 'articulos/tablaArticulos.php');
                    alertify.alert("Eliminado con exito!!")
                } else {
                    alertify.error("No se pudo Eliminar categoria")
                }
            }, function () {
                alertify.error('Cancelo !')
            });

        }

    </script>

    <?php
} else {
    header("location:../index.php");
}
?>