<?php 

$host="Localhost";
$bd="sitiolibros";
$usuario="root";
$contrasenia="";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
    if($conexion){
    }
} catch (Exception $e) {

    echo $e->getMessage();
}




?>