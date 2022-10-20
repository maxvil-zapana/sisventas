    <?php

    class Conectar
    {
        private $servidor = "";
        private $usuario = "root";
        private $password = "";
        private $bd = "ventas";

        public function conexion()
        {
            $conexion = mysqli_connect(
                $this->servidor,
                $this->usuario,
                $this->password,
                $this->bd);
            return $conexion;
        }
    }
    $obj = new Conectar();
    if ($obj->conexion()) {
        echo "la conexion fue un exito";
    }

    ?>