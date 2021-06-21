<?php 
    session_start();
    session_unset("usuario");
    $_SESSION["usuario"]=null;
    session_unset("admin");
    $_SESSION["admin"]=null;
    session_unset("user");
    $_SESSION["user"]=null;
    if(isset($_GET) && $_GET["r"]=="i"){

        header("Location:../../index.php");

    }else{
        
        header("Location:../index.php");
    }
