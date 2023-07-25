<!DOCTYPE html>

<head>
  <title>ventas y almacen</title>
  <?php require_once "dependencias.php"; ?>
</head>

<body>
  <nav>
    <ul>
      <li><a href="#0">Inicio</a></li>
      <li><a href="#0">Administrar artículos</a>
        <ul>
          <li><a href="categorias.php">Categorias</a></li>
          <li><a href="articulos.php">Artículos</a></li>
        </ul>
      </li>

<?php
  if ($_SESSION['usuario']=="admin"):
 ?>
      <li>
        <a href="#0">Administrar usuarios</a>
        <ul>
          <li><a href="usuarios.php">Usuarios</a></li>
          <li><a href="#0">Southwest Airlines</a></li>
          <li><a href="#0">Levi Strauss</a></li>
        </ul>
      </li>
<?php endif ?>



      <li>
        <a href="#0">Clientes</a>
        <ul>
          <li><a href="clientes.php">Clientes</a></li>
          <li><a href="#0">Web Design</a></li>
          <li><a href="#0">Mobile App Development</a></li>
        </ul>
      </li>
      <li><a href="#0">Vender artículo</a>
        <ul>
          <li><a href="ventas.php">ventas</a></li>

        </ul>
      </li>


      <li><a href="#0">Usuario <?php echo $_SESSION['usuario'] ?> </a>
        <ul>
          <li><a href="../procesos/salir.php">Salir</a></li>

        </ul>
      </li>
    </ul>
  </nav>
</body>

</html>