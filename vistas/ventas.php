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
    <?php require_once "menu.php";?>
</head>
<body>
    <h1>prueba</h1>
</body>
</html>

<?php
}else{
    header("location:../index.php");
}
?>