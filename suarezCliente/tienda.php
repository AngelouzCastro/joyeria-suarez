<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossoring = "anonymous"></script>
        <link rel="stylesheet" type="text/css" href="estilo2.css" media="screen" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>tinda</title>
    </head>
    <body>
        
        <?php
        $id = $_GET['id'];
        session_start();
        $us = $_SESSION['usuario'];
        
       
        ?>
    
    <header class="cabezera2">
            <div class="cabeza">
                <img class="logotec" src="extra/tec2.png">
                
            </div>
        </header>
        <header class="cabezera">
            
            <div class="encabezado">
                <img class="logo" src="extra/logo.png">
                <nav>
                    <?php
                        
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT * FROM tiendas WHERE idtiendas = ".$id.";";
                        $res=mysqli_query($con, $query);
                        while ($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <p>
                    <a class="activo" href=""><?php echo $row['descripcion'] ?></a>
                    <a class="activo" href=""><?php echo $row['ciudad'] ?></a>
                    <a class="activo" href=""><?php echo $row['direcion'] ?></a>
                    <a class="activo" href=""><?php echo $row['cpostal'] ?></a>
                    <a class="activo" href=""><?php echo $row['horario'] ?></a></p>
                    <?php
                        }
                        ?>
                </nav>
                <nav>
                	
                    <button role="button" class="boton"><i class="fas fa-shopping-bag"></i></button>
                    
                    
                </a>
                
                    
                </nav>
            </div>
        </header>

    <main>
    <div class="peliculas-recomendadas contenedor">

                
                
<div class="contenedor-titulo-controles">
    <h3 id="cole">Articulos existentes en tienda </h3>
    <div class="indicadores"></div>
</div>

<div class="contenedor-principal">
    
    <div class="contenedor-carousel">
        <div class="carousel">
        <?php
        $db_host="localhost";
        $db_user="root";
        $db_pass="";
        $db_db="suarezbd";
        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
        $query="SELECT articulos.idarticulos,
		            articulos.descripcion,
                    articulos.caracteristicas,
                    articulos.precio,
                    articulos.imagen,
                    tiendas.idtiendas     
                FROM existencia INNER JOIN articulos
                on existencia.articulos_idarticulos = articulos.idarticulos
                INNER JOIN tiendas on existencia.tiendas_idtiendas = tiendas.idtiendas 
                WHERE existencia.tiendas_idtiendas = ".$id." and existencia.existencias > 0;";
        $res=mysqli_query($con, $query);
        while ($row=mysqli_fetch_assoc($res)) {
        ?>
            <div class="pelicula">

                    

                <a class="aaa" type="submit" href="producto.php?id=<?php echo $row['idarticulos'] ?>&tien=<?php echo $row['idtiendas'] ?>">
                    <img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="Interestellar">
                <p><?php echo $row['descripcion'] ?></p>
                <p><?php echo $row['caracteristicas'] ?></p>
                <p>$<?php echo $row['precio'] ?></p></a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    

    
</div>




</div>
<div class="arriba">
                <a href="#cole">
                    <button role="button" class="boton"><i class="fas fa-arrow-circle-up"></i> Ir a arriba</button>

                </a>
            </div>
    <main>
                            
</body>
</html>