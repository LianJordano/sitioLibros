<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librosky web</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="nav navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="">Librosky</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./index.php">Inicio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./productos.php">Libros</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./nosotros.php">Nosotros</a>
            </li>

            <?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != null) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="./administrador/seccion/cerrar.php?r=i">Cerrar sesion</a>
                </li>

            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="./administrador/index.php">Iniciar sesion</a>
                </li>
            <?php endif; ?>

        </ul>

        <?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != null) : ?>
            <span style="margin-left: 40%; font-weight:bold;"> <?= "Bienvenido " . $_SESSION["usuario"]->nombre . " " . $_SESSION["usuario"]->apellidos ?></span>
        <?php endif; ?>



    </nav>

    <div class="container my-4">

        <div class="row">