<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
   
    <title>Producto</title>
    <script>
        window.addEventListener("load",inicio);
        function inicio()
        {
            document.getElementById("cambiarTextos").addEventListener("click",cambiarTextos);
            document.getElementById("idenvio").addEventListener("click",cambiarTextos);
        }
        function cambiarTextos()
        {
            var precioo = parseFloat(document.getElementById("precio").innerHTML);
            var cantidad = document.getElementById("cambiarTextos").value;
            var penvio = parseFloat(document.getElementById("idenvio").value);
            var subtotal = precioo * cantidad;
            var total = subtotal + penvio;
            document.getElementById("elprecio").innerHTML=" subtotal $"+subtotal;
            document.getElementById("elprecio2").innerHTML="+Envio $"+penvio;
            document.getElementById("total").innerHTML="total "+total;
            document.getElementById("mod").value=total;
        }
        
    </script>
    <script type="text/javascript">
function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    
    patron = /1/; //ver nota
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
</script>

<style type="text/css">
        #mod{
            display: none;
        }
        #mod2{
            display: none;
        }
    </style>
    
    <script type="text/javascript">
        function mostrar(){
            document.getElementById('mod2').style.display = 'block';
        }
    </script>

</head>
<body>
    <?php
                        session_start();

                        #$id = $_GET['id'];
                        #$tien = $_GET['tien'];
                        $_SESSION['idt']=$_GET['id'];
                        $id = $_SESSION['idt'];

                        $_SESSION['tienda']=$_GET['tien'];
                        $tien = $_SESSION['tienda'];
                        
                        $us = $_SESSION['usuario'];

                        $des = "";
                        $car = "";
                        #echo "<h1>".$id." ".$tien."</h1>";
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT 
                        articulos.caracteristicas,
                        articulos.precio,
                        articulos.imagen,
                        linea.descripcion,
                        articulos.descripcion,
                        tiendas.ciudad,
                        existencia.existencias
                 FROM articulos INNER JOIN linea ON articulos.linea_idlinea = linea.idlinea
                 INNER JOIN existencia ON articulos.idarticulos = existencia.articulos_idarticulos
                 INNER JOIN tiendas ON tiendas.idtiendas = existencia.tiendas_idtiendas 
                 WHERE tiendas.idtiendas = ".$tien." and articulos.idarticulos = ".$id.";";
                        $res=mysqli_query($con, $query);
                       
         
        ?>
  <form action="comprar.php" method="POST">      
    <div class="container">
        <div class="card">
            <div class="shoeBackground">
                
                <h1 class="nike">nike</h1>
                <img src="IMG/logo2.gif" alt="" class="logo">
                
                <?php  while ($row=mysqli_fetch_assoc($res)): 
                    $des = $row['descripcion']; 
                    $car = $row['caracteristicas'];
                    $precio = $row['precio'];
                    $existencia = $row['existencias'];
                    ?>
                <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="" class="shoe show" color="blue">
                <?php endwhile; ?>

            </div>
            <div class="info">
                <div class="shoeName">
                    <div>
                        <h1 class="big"><?php echo $des ?></h1>
                        <span class="new">new</span>
                    </div>
                    <h3 class="small">Joyeria Suarez</h3>
                </div>
                <div class="description">
                    <h3 class="title">información de Producto</h3>
                    <p class="text" id="cara"><?php echo $car ?></p>
                    <p class="text" id="precio"><?php echo $precio ?></p>
                </div>
                
                <div class="size-container">
                    <h3 class="title">Envios</h3>
                    <div class="sizes">
                    <select name="idenvio" class="size" id="idenvio" onclick="mostrar();">
                        <?php
                    $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT idenvio, compania, caracteristica, precio FROM envio;";
                        $res=mysqli_query($con, $query);

                        while ($row=mysqli_fetch_assoc($res)):
                        ?>
                        <option value="<?php echo $row['precio']?>,<?php echo $row['idenvio']?>"> <?php echo $row['compania']?>, envio $<?php echo $row['precio']?>, <?php echo $row['caracteristica']?> </option>
                            <?php
                                endwhile;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="size-container">
                    <h3 class="title">Cantidad</h3>
                    <div class="sizes">
                        <select name="cantidades" class="size" id="cambiarTextos">
                            <?php

                            for($i = 1; $i <= $existencia; $i++):
                                ?>
                        <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                                <?php
                                
                            endfor;
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="buy-price">
                    <!--
                    <a href="comprar.php?idarticulo=<?php #echo $id ?>&
                                        us=<?php #echo $us ?>&
                                        tienda=<?php #echo $tien ?>&
                                        cantida=''" class="buy"><i class="fas fa-shopping-cart"></i>proceder</a>-->
                    <INPUT class="buy" id="mod2" type="submit" value="Proceder"></input>
                    <!--
                    <div class="price">
                        <i class="fas fa-dollar-sign"></i>-->
                        <p id ="elprecio">$ <?php echo $precio ?></p>
                        <br>
                        <p id ="elprecio2"></p>
                        <br>
                        <h1 id ="total" name="total"></h1>
                        <input type="text" name="totalt" id="mod" onKeyPress="return validar(event)" onpaste="return false">
                    </div>

                </div>
            </div>
        </div>
    </div>
  </form>
            
    <script src="app.js"></script>
</body>
</html>