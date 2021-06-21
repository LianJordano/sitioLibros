<?php
session_start();
require_once("../config/bd.php");

if (isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {

    $usuario = ($_POST["usuario"] != "") ? $_POST["usuario"] : "";
    $contrasenia = ($_POST["contrasenia"] != "") ? $_POST["contrasenia"] : "";


    if ($usuario != "" && $contrasenia != "") {

        $sql = $conexion->prepare(" SELECT * FROM usuarios WHERE correo=:usuario AND password=:contrasenia ");
        $sql->bindParam(":usuario", $usuario);
        $sql->bindParam(":contrasenia", $contrasenia);
        $sql->execute();

        $conteo = $sql->rowCount();

        if ($conteo > 0) {

            $usuario = $sql->fetchObject();

            $_SESSION["usuario"] = $usuario;
            
            if($usuario->rol=="admin"){
                $_SESSION["admin"]="administrador";
            }

            header("Location:../seccion/productos.php");
        } else {
            $_SESSION["error_login"]["error"]=" Usuario  o Contraseña incorrectos";
            header("Location:../index.php");
        }
    } else {
        $_SESSION["error_login"]["error"]=" Usuario  o Contraseña incorrectos";
        header("Location:../index.php");
    }
} else {

    header("Location:../index.php");
}
