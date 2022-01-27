<!DOCTYPE html>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossoring = "anonymous"></script>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
	<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Tienda Suarez</title>
    </head>
    <?php 
    
     ?>
    <body>
        <header class="cabezera2">
            <div class="cabeza">
                <img class="logotec" src="extra/tec2.png">
                <nav>
                    <?php 
                    session_start();
                    if(isset($_SESSION['usuario'])){
                        $us=$_SESSION['usuario'];
                        ?>
                        <a href="#"><?php echo "". $us .""?> </a>
                        <a href="CerrarSesion.php">Cerrar sesi&oacute;n </a>
                    <?php
                    } else { ?>
                    <a href="conexiones/singup.php"> registrar </a>
                    <?php } ?>
                     
                </nav>
            </div>
        </header>
        <header class="cabezera">
            
            <div class="encabezado">
                <img class="logo" src="extra/logo.png">
                <nav>
                    <a class="activo" href="#">Inicio</a>
                    <a href="joyeria.html">Tiendas</a>
                    <a href="about.html">Aserca de nosotros</a> 
                </nav>
                <nav>
                	
                    <button role="button" class="boton"><i class="fas fa-shopping-bag"></i></button>
                    <?php if(isset($_SESSION['usuario'])){
                        $us=$_SESSION['usuario'];
                      
                    } else { ?>
                            <a href="indexx.php">
                    <button role="button" class="botonl"><i class="fas fa-sign-in-alt"></i>Iniciar sesi&oacute;n</button>
                     </a>
                    <?php } ?>
                
                    
                </nav>
            </div>
        </header>
        <main>
            <div class="cuerpo">
                <div class="elementos">
                    <p class="texto1">Lo Más Nuevo</p>
                    <h3 class="cartel">Joyeria / 2021</h3>
                    <a href="#cole">
                    <button role="button" class="botoncompra">Comprar Ahora</button>
                    </a>
                </div>
            </div>
            <?php if(isset($_SESSION['usuario'])){ ?>
                       
            <div class="left">
                <h2>Tiendas</h2>
                <ul>
                <?php
                            
                            $db_host="localhost";
                            $db_user="root";
                            $db_pass="";
                            $db_db="suarezbd";
                            $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                            $query="SELECT idtiendas,descripcion,ciudad,direcion,cpostal,horario FROM tiendas;";
                            $res=mysqli_query($con, $query);
                            while ($row=mysqli_fetch_assoc($res)) {
                            
                            
                        ?>
                    <!--
                    <li><a href="tienda.php?id=<?php echo $row['idtiendas'] ?>"><input type="submit" class="botonl" value="<?php echo $row['descripcion'] ?>"></a></li>
                            -->
                            <li><a type="submit" href="tienda.php?id=<?php echo $row['idtiendas'] ?>"><?php echo $row['descripcion'] ?></a></li>
                <?php
                            }
                ?>
                <!--
                <li><a type="submit" href="tienda.php?id=101">si</a></li>
                        -->
                        <br>
                </ul>

            </div>
            <div class="peliculas-recomendadas contenedor">

                
                
                <div class="contenedor-titulo-controles">
                    <h3 id="cole">Colecciones</h3>
                    <div class="indicadores"></div>
                </div>
    
                <div class="contenedor-principal">
                    <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fas fa-angle-left"></i></button>
                    <div class="contenedor-carousel">
                        <div class="carousel">
                        <?php
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT idarticulos,descripcion,caracteristicas,precio,imagen FROM articulos WHERE linea_idlinea = 1;";
                        $res=mysqli_query($con, $query);
                        while ($row=mysqli_fetch_assoc($res)) {
                        ?>
                            <div class="pelicula">

                                    

                                <a class="aaa" href="#"><img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="Interestellar">
                                <p><?php echo $row['descripcion'] ?></p>
                                <p><?php echo $row['caracteristicas'] ?></p>
                                <p>€<?php echo $row['precio'] ?></p></a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    
    
                    <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fas fa-angle-right"></i></button>
                </div>
              
                <div class="contenedor-titulo-controles">
                    <h3 id="cole">Joyas</h3>
                    <div class="indicadores"></div>
                </div>
    
                <div class="contenedor-principal">
                    <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fas fa-angle-left"></i></button>
                    <div class="contenedor-carousel">
                        <div class="carousel">
                        <?php
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT idarticulos,descripcion,caracteristicas,precio,imagen FROM articulos WHERE linea_idlinea = 2;";
                        $res=mysqli_query($con, $query);
                        while ($row=mysqli_fetch_assoc($res)) {
                        ?>
                            <div class="pelicula">

                                    

                                <a class="aaa" type="submit" href="#"><img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="Interestellar">
                                <p><?php echo $row['descripcion'] ?></p>
                                <p><?php echo $row['caracteristicas'] ?></p>
                                <p>€<?php echo $row['precio'] ?></p></a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    
    
                    <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fas fa-angle-right"></i></button>
                </div>
                <div class="contenedor-titulo-controles">
                    <h3 id="cole">Relojer&iacute;a</h3>
                    <div class="indicadores"></div>
                </div>
    
                <div class="contenedor-principal">
                    <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fas fa-angle-left"></i></button>
                    <div class="contenedor-carousel">
                        <div class="carousel">
                        <?php
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT idarticulos,descripcion,caracteristicas,precio,imagen FROM articulos WHERE linea_idlinea = 3;";
                        $res=mysqli_query($con, $query);
                        while ($row=mysqli_fetch_assoc($res)) {
                        ?>
                            <div class="pelicula">

                                    

                                <a class="aaa" href="#"><img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="Interestellar">
                                <p><?php echo $row['descripcion'] ?></p>
                                <p><?php echo $row['caracteristicas'] ?></p>
                                <p>€<?php echo $row['precio'] ?></p></a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    
    
                    <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fas fa-angle-right"></i></button>
                </div>
                <div class="contenedor-titulo-controles">
                    <h3 id="cole">Solitarios Y Alianzas</h3>
                    <div class="indicadores"></div>
                </div>
    
                <div class="contenedor-principal">
                    <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fas fa-angle-left"></i></button>
                    <div class="contenedor-carousel">
                        <div class="carousel">
                        <?php
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT idarticulos,descripcion,caracteristicas,precio,imagen FROM articulos WHERE linea_idlinea = 11;";
                        $res=mysqli_query($con, $query);
                        while ($row=mysqli_fetch_assoc($res)) {
                        ?>
                            <div class="pelicula">

                                    

                                <a class="aaa" href="#"><img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="Interestellar">
                                <p><?php echo $row['descripcion'] ?></p>
                                <p><?php echo $row['caracteristicas'] ?></p>
                                <p>€<?php echo $row['precio'] ?></p></a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    
    
                    <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fas fa-angle-right"></i></button>
                </div>
                

            </div>
            <?php } else { ?>
                <div class="peliculas-recomendadas contenedor">

                
                
<div class="contenedor-titulo-controles">
    <h3 id="cole">Colecciones</h3>
    <div class="indicadores"></div>
</div>

<div class="contenedor-principal">
    <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fas fa-angle-left"></i></button>
    <div class="contenedor-carousel">
        <div class="carousel">
        <?php
        $db_host="localhost";
        $db_user="root";
        $db_pass="";
        $db_db="suarezbd";
        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
        $query="SELECT idarticulos,descripcion,caracteristicas,precio,imagen FROM articulos WHERE linea_idlinea = 1;";
        $res=mysqli_query($con, $query);
        while ($row=mysqli_fetch_assoc($res)) {
        ?>
            <div class="pelicula">

                    

                <a class="aaa" href="indexx.php"><img  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="Interestellar">
                <p><?php echo $row['descripcion'] ?></p>
                <p><?php echo $row['caracteristicas'] ?></p>
                <p>€<?php echo $row['precio'] ?></p></a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    

    <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fas fa-angle-right"></i></button>
</div>

<div class="contenedor-titulo-controles">
    <h3 id="cole">Inicia sesion para ver mas</h3>
    <div class="indicadores"></div>
</div>


        </div>
                <?php } ?>
            <div class="imagen">
                <img src="" alt="">
            </div>
            <div class="arriba">
                <a href="#cole">
                    <button role="button" class="boton"><i class="fas fa-arrow-circle-up"></i> Ir a arriba</button>

                </a>
            </div>


        </main>
        
        <script src="js/main.js"></script>
    </body>
</html>