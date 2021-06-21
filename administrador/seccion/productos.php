<?php include_once("../template/cabecera.php"); ?>
<?php include_once("../config/bd.php") ?>


<?php

if (isset($_POST)) {

    $txtID = (isset($_POST["txtID"])) ? $_POST["txtID"] : "";
    $txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "";
    $txtImagen = (isset($_FILES["txtImagen"]["name"])) ? $_FILES["txtImagen"]["name"] : "";
    $accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";




    switch ($accion) {
        case 'agregar':

            $sql = $conexion->prepare(" INSERT INTO libros (nombre, imagen) VALUES (:nombre,:imagen)");
            $sql->bindParam(":nombre", $txtNombre);

            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen!="") ? $fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
            
            if($tmpImagen!=""){
                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
            }

            $sql->bindParam(":imagen", $nombreArchivo);
            $sql->execute();

            header("Location:productos.php");
            break;

        case 'modificar':

            $sql = $conexion->prepare(" UPDATE libros SET nombre=:nombre WHERE id=:id ");
            $sql->bindParam(":nombre", $txtNombre);
            $sql->bindParam(":id", $txtID);
            $sql->execute();

            

            if($txtImagen!=""){

                $fecha = new DateTime();
                $nombreArchivo = ($txtImagen!="") ? $fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

                $sql = $conexion->prepare(" SELECT imagen FROM libros WHERE id=:id ");
                $sql->bindParam(":id", $txtID);
                $sql->execute();
                $libro = $sql->fetch(PDO::FETCH_OBJ);
    
                if(isset($libro->imagen) && ($libro->imagen !="imagen.jpg")){
    
                    if(file_exists("../../img/".$libro->imagen)){
                        unlink("../../img/".$libro->imagen);
                    }   
    
                }

            $sql = $conexion->prepare(" UPDATE libros SET imagen=:imagen WHERE id=:id ");
            $sql->bindParam(":imagen", $nombreArchivo);
            $sql->bindParam(":id", $txtID);
            $sql->execute();

        }
        header("Location:productos.php");

            break;

        case 'cancelar':
                header("Location:productos.php");
            break;

        case 'seleccionar':

            $sql = $conexion->prepare(" SELECT * FROM libros WHERE id=:id ");
            $sql->bindParam(":id", $txtID);
            $sql->execute();
            $libro = $sql->fetch(PDO::FETCH_OBJ);
            
            $txtNombre=$libro->nombre;
            $txtImagen=$libro->imagen;

            break;

        case 'borrar':

            $sql = $conexion->prepare(" SELECT imagen FROM libros WHERE id=:id ");
            $sql->bindParam(":id", $txtID);
            $sql->execute();
            $libro = $sql->fetch(PDO::FETCH_OBJ);

            if(isset($libro->imagen) && ($libro->imagen !="imagen.jpg")){

                if(file_exists("../../img/".$libro->imagen)){
                    unlink("../../img/".$libro->imagen);
                }   

            }
            $sql = $conexion->prepare(" DELETE FROM libros WHERE id=:id ");
            $sql->bindParam(":id", $txtID);
            $sql->execute();

            header("Location:productos.php");
            break;
    }
}

$sql = $conexion->prepare(" SELECT * FROM libros ");
$sql->execute();


?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de Libro
        </div>

        <div class="card-body">

            <form method="POST" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtID">ID: </label>
                    <input type="text" value="<?=$txtID;?>" class="form-control" name="txtID" id="txtID" readonly> 
                </div>

                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" value="<?=$txtNombre;?>" required class="form-control" name="txtNombre" id="txtNombre">
                </div>

                <div class="form-group">
                    <label for="txtImagen">Imagen</label>
                    <br>
                    <?php if($txtImagen!=""): ?>
                     <img class="img-thumbnail rounded" required src="../../img/<?=$txtImagen;?>"  width="90" alt="">
                    <?php endif; ?>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="buttom" name="accion" <?=($accion=="seleccionar") ? 'disabled' : '' ?> value="agregar" class="btn btn-success">Agregar</button>
                    <button type="buttom" name="accion" <?=($accion!="seleccionar") ? 'disabled' : '' ?> value="modificar" class="btn btn-warning">Modificar</button>
                    <button type="buttom" name="accion" <?=($accion!="seleccionar") ? 'disabled' : '' ?> value="cancelar" class="btn btn-info">Cancelar</button>
                </div>

            </form>

        </div>

    </div>

</div>

<div class="col-md-7">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $listaLibros = $sql->fetchAll(PDO::FETCH_OBJ);

            foreach ($listaLibros as $libro) : ?>
                <tr>
                    <td><?= $libro->id; ?></td>
                    <td><?= $libro->nombre; ?></td>
                    <td><img class="img-thumbnail rounded" src="../../img/<?= $libro->imagen; ?>" width="100" alt=""> </td>

                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="txtID" id="txtID" value="<?= $libro->id; ?>">
                            <input type="submit" name="accion" value="seleccionar" class="btn btn-primary">
                            <input type="submit" name="accion" value="borrar" class="btn btn-danger">
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>



<?php include_once ("../template/pie.php"); ?>
