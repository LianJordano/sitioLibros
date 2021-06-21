<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location:../index.php");
}elseif($_SESSION["admin"]!="administrador"){
    header("Location:../../index.php");

}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php
    $url = "http://" . $_SERVER["HTTP_HOST"] . "/PHP/sitioLibros";
    ?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link" href="#">Administrador</a>
            <a class="nav-item nav-link" href="<?= $url ?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?= $url ?>/administrador/seccion/productos.php">Administrador de libros</a>
            <a class="nav-item nav-link" href="<?= $url; ?>">Ver sitio web</a>
            <a class="nav-item nav-link" href="<?= $url ?>/administrador/seccion/cerrar.php">Cerrar sesion</a>
        </div>
        <span style="margin-left: 40%; font-weight:bold;"> <?= "Bienvenido " . $_SESSION["usuario"]->nombre . " " . $_SESSION["usuario"]->apellidos ?></span>
    </nav>

    <div class="container my-2">
        <div class="row">