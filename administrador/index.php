<?php 
/*     if(isset($_POST)){
        header("Location:inicio.php");
    } */
    session_start();
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


    <div class="container">
        <div class="row">

            <div class="col-md-4">

            </div>

            <div class="col-md-4 my-5">

                <div class="card">
                    <div class="card-header">
                        login
                    </div>
                    <div class="card-body">
                        
                        <?php if(isset($_SESSION["error_login"])): ?>
                        <div class="alert alert-warning" role="alert">
                            <?=$_SESSION["error_login"]["error"]?>
                        </div>
                        <?php endif; ?>

                        <form  action="seccion/usuarios.php" method="POST">
                            <div class="form-group">
                                <label for="usuario">Usuario </label>
                                <input type="text" class="form-control" id="usuario" name="usuario">
                            </div>
                            <div class="form-group">
                                <label for="contrasenia">Contraseña</label>
                                <input type="password" class="form-control" id="contrasenia" name="contrasenia">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar al administrador</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>


<?php 


if(isset($_SESSION["error_login"]) && $_SESSION["error_login"]["error"]!=null){
    @session_destroy($_SESSION["error_login"]);
    $_SESSION["error_login"]=null;
}


?>



</body>

</html>