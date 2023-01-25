<?php
class usuarios
{
    public function registroUsuario($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $fecha = date('Y-m-d');

        $sql = "INSERT INTO usuarios (nombre,
                                apellido,
                                email,
                                password,
                                fechaCaptura)
                        VALUES('$datos[0]',
                                '$datos[1]',
                                '$datos[2]',
                                '$datos[3]',
                                '$fecha')";


        return mysqli_query($conexion, $sql);
    }


    public function loginUser($datos)
    {
        $c = new conectar();

        $conexion = $c->conexion();
        $password = sha1($datos[1]);
        //se crea la sesion
        $_SESSION['usuario'] = $datos[0];

        //self hace una referencia a un metodo de la misma clase, en este caso a un funcion que se encuentra mas abajo
        //self es igual a this
        $_SESSION['iduser'] = self::traeID($datos);


        $sql = "SELECT * 
            FROM usuarios
            WHERE email='$datos[0]'
            AND password='$password'";

        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function traeID($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $password = sha1($datos[1]);
        $sql = "SELECT id_usuario
            FROM usuarios
            WHERE email='$datos[0]'
            AND password='$password'";

        $result = mysqli_query($conexion, $sql);

        return mysqli_fetch_row($result)[0];

    }



}



?>