<?php
// require_once "conexion.php";
// require_once "categorias.php";







class categorias
 {
    public function agregarCategoria($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "INSERT into categorias(id_usuario,
                                        nombreCategoria,
                                        fechaCaptura)
                        values('$datos[0]','$datos[1]','$datos[2]')";
        return mysqli_query($conexion, $sql);
    }
    public function actualizaCategoria($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE categorias set nombreCategoria='$datos[1]'
                                where id_categoria='$datos[0]'";

        return mysqli_query($conexion, $sql);

    }
    public function elimminaCategoria($idcategoria)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "DELETE from categorias where id_categoria='$idcategoria'";

        $resultado=mysqli_query($conexion, $sql);
        return $resultado;
        
        

    }
}



?>