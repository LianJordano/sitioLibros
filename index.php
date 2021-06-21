
<?php include_once("./template/cabecera.php") ?>


            <div class="jumbotron">
                <h1 class="display-3">Bienvenido <?php if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!=null ){ $_SESSION["usuario"]->nombre;  }?></h1>
                <p class="lead">Consulta nuestros <span style="color: #e95420; font-weight:bold; font-size:24px; font-family: cursive;">variopintos</span> libros</p>
                <hr class="my-2">
                
            </div>


            <div class="row">
            <div class="col-md-4">
            <img src=https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdoJySwtI9YlVTtSxTcqmkSBzlECE2D-osSg&usqp=CAU" alt="" width="300" style="object-fit: cover;">
                
            </div>

            <div class="col-md-8">
    
                <h2 style="color:#e95420">Lorem ipsum</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore sit saepe qui illo quod, velit recusandae earum aliquid commodi voluptas pariatur modi dolore. Iure incidunt laborum aut tempore nobis excepturi.
                Blanditiis in laudantium laboriosam, voluptatibus quod facilis vel suscipit dicta. Totam, fugiat dolor, in beatae, quo pariatur molestiae dolorum ab iusto consequuntur laudantium. Id quas obcaecati ducimus voluptate magni laborum?

                <h2 style="color:#e95420">Lorem ipsum</h2>
                Laborum iusto in quia ad architecto distinctio voluptatibus deserunt assumenda nisi fuga, reprehenderit modi quod inventore? Dolores explicabo tempora officiis possimus, magni illo minima, perferendis delectus ex autem  </p>
            </div>
                </div>
           
    

<?php include_once("./template/pie.php") ?>
