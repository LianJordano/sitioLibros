<?php include_once("./template/cabecera.php") ?>
<?php include_once("./administrador/config/bd.php") ?>

<?php 
    $sql = $conexion->prepare("SELECT * FROM libros");
    $sql->execute();
    $listaLibros = $sql->fetchAll(PDO::FETCH_OBJ);

?>

<?php foreach($listaLibros as $libro): ?>
<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="img/<?=$libro->imagen?>" alt="" height="200" style='object-fit:cover' >
        <div class="card-body">
            <h4 class="card-title"><?=$libro->nombre?></h4>
            <a name="" id="" class="btn btn-primary" href="#" role="button">Ver más</a>
        </div>
    </div>
</div>
<?php endforeach; ?>








<?php include_once("./template/pie.php") ?>