<form action="" id="frmArticulos" name="frmArticulos" enctype="multipart/form-data">
    <fieldset>
        <legend class="tituloForm">Nuevo Artículo</legend>
        <label for="categoria">Categoria:</label></br>
        <select name="categoriaSelect" id="categoriaSelect" class="icon-select">
            <option value="A">Selecciona Categoria</option>
        </select>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="icon-user">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="categoria2" id="categoria2" class="icon-amount">
        <label for="cantidad">Cantidad:</label>
        <input type="text" name="" id="cantidad" class="icon-description">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" class="icon-price">
        <label for="imagen">Imagen:</label>
        <input type="file" name="archivo" id="imagen" class="icon-picture">
        </br>
        <div class="botones">
            <span class="boton verde btn_center" id="btnAgregarArticulo">Agregar</span>
        </div>
    </fieldset>
</form>