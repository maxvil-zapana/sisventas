<form action="" id="frmArticulos" name="frmArticulos" enctype="multipart/form-data">
    <fieldset>
        <legend class="tituloForm">Vender un producto</legend>
        <label for="clienteVenta">Selecciona Cliente</label>
        <select name="categoriaSelect" id="clienteVenta" class="icon-select">
            <option value="A">Selecciona Categoria</option>
        </select>
        <label for="">Selecciona Producto</label>
        <select name="categoriaSelect" id="productoVenta" class="icon-select">
            <option value="A">Selecciona</option>
        </select>
        <label for="nombre">Descripción</label>
        <input type="text" name="nombre" id="nombre" class="icon-user">
        <label for="descripcion">Cantidad:</label>
        <input type="text" name="categoria2" id="categoria2" class="icon-amount">
        <label for="cantidad">Precio:</label>
        <input type="text" name="" id="cantidad" class="icon-description">
        </br>
        <div class="botones">
            <span class="boton verde btn_center" id="botonprueba">Agregar</span>
        </div>
    </fieldset>
</form>


<script type="text/javascript">
    $(document).ready(function(){
        $('#clienteVenta').select2();
        $('#productoVenta').select2();
    });


    botonprueba.addEventListener('click',()=>{
        alert("hiokla")
    })
</script>