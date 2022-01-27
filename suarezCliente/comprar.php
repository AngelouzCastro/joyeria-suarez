<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>Pago</title>
    <META charset="utf-8" />
    
    <link rel="stylesheet" type="text/css" href="conexiones/forms.css">

</head>
    <BODY>
	<?php
	
	
    
	if(!isset($_POST['submit'])){
		session_start();
		
		/*
		$cantidad = isset($_POST['cantidades']);
		$envios = isset($_POST['idenvio']);
		$total = isset($_POST['totalt']);
		*/
		
		$cantidad = $_POST['cantidades'];
		$envios = $_POST['idenvio'];
		$total = $_POST['totalt'];
		
		

		$_SESSION['cantidaddd']=$_POST['cantidades'];
		#$_SESSION['enviooo']=$_POST['idenvio'];
		$_SESSION['totalll']=$_POST['totalt'];

		#echo "<h2>" .$total . "</h2>";

		$producto = $_SESSION['idt'];
		$tienda = $_SESSION['tienda'];
		$usuario = $_SESSION['usuario'];
		$idenvio = explode(',', $envios);
		$iddenvio = intval($idenvio[1]);
		#$iddenvio = $_SESSION['envio'];
		$_SESSION['enviooo']=$iddenvio;
		

	?>
	<div class="registro">
		<FORM method="POST" action="comprar.php" name="altaTienda">
			<h4> Datos de compra</h4>
			
			<?php
			
			$db_host="localhost";
			$db_user="root";
            $db_pass="";
            $db_db="suarezbd";
            $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
            $query="SELECT descripcion, caracteristicas, precio, imagen FROM articulos WHERE idarticulos =" .$producto.";";
            $res=mysqli_query($con, $query);
            while ($row=mysqli_fetch_assoc($res)):
			?>
				<p><b>Producto:</b> <?php echo $row['descripcion']?>,  <b>clave de producto</b> <?php echo $producto ?></p>
				<p><b>Caracteristicas:</b> <?php echo $row['caracteristicas']?></p>
				<p><b>Precio:</b> $<?php echo $row['precio']?></p>
				<p><b>Cantidad:</b> <?php echo $cantidad ?></p>
			<?php
            endwhile;

			?>

			<h4> Datos de Tienda</h4>
			<?php
			$con=mysqli_connect('localhost','root','','suarezbd');
            $query2="SELECT descripcion, ciudad, direcion, cpostal FROM tiendas WHERE idtiendas =" .$tienda.";";
            $res2=mysqli_query($con, $query2);
            while ($row2=mysqli_fetch_assoc($res2)):
			?>
			<p><b>clave de Tienda:</b> <?php echo $tienda ?></p>
		    <p><b>Tienda:</b> <?php echo $row2['descripcion']?></p>
			<p><b>Ciudad:</b> <?php echo $row2['ciudad']?></p>
			<p><b>Direci&oacute;n:</b> <?php echo $row2['direcion']?></p>
			<p><b>C. Postal:</b> <?php echo $row2['cpostal'] ?></p>

			<?php
            endwhile;
			?>


			<h4> Datos de Envio</h4>
			<?php
			$con=mysqli_connect('localhost','root','','suarezbd');
            $query3="SELECT compania, precio FROM envio WHERE idenvio =" .$iddenvio.";";
            $res3=mysqli_query($con, $query3);
            while ($row3=mysqli_fetch_assoc($res3)):
			?>
		    <p><b>Medio de envio:</b> <?php echo $row3['compania']?></p>
			<p><b>Precio:</b> $<?php echo $row3['precio']?></p>

			<?php
            endwhile;
			?>


			<h4> Datos de Usuario</h4>
			<?php
			$con=mysqli_connect('localhost','root','','suarezbd');
            $query4="SELECT idusuario, apellido, direcion, colonia, ciudad, estado, pais, cp FROM usuario WHERE nombre ='" .$usuario."';";
            $res4=mysqli_query($con, $query4);
            while ($row4=mysqli_fetch_assoc($res4)):
            	$_SESSION['idusuarioo'] = $row4['idusuario'];
			?>
		    <p><b>Nombre:</b> <?php echo $usuario ?></p>
			<p><b>Apellido:</b> <?php echo $row4['apellido']?></p>
			<p><b>Direci&oacute;n:</b> <?php echo $row4['direcion']?></p>
			<p><b>Colonia:</b> <?php echo $row4['colonia']?></p>
			<p><b>Ciudad:</b> <?php echo $row4['ciudad']?></p>
			<p><b>Estado:</b> <?php echo $row4['estado']?></p>
			<p><b>Pais:</b> <?php echo $row4['pais']?></p>
			<p><b>C. Postal:</b> <?php echo $row4['cp']?></p>

			<?php
            endwhile;
			?>
			tarjeta:<INPUT class="botons" type="text" name="tarjeta" id="tarjeta">
		    <INPUT class="botons" type="submit" name="submit" value="Comprar">
		    <p><a href="../home.php">cancelar</a></p>
		</form>
	</div>
	<?php
	} else {
		
		session_start();
		#echo "usuario: " .$_SESSION['idusuarioo'];
	    #echo "<h1>totalitoooo " . $_SESSION['totalll'] ."</h1>";
	    $fecha = date("Y-m-d H:i:s");

	    $db = new mysqli('localhost','root','','suarezbd');
			if($db->connect_error)
			{
				die("Conection failed: ". $db->connect_error);
			}
			
			$insert = $db->query("INSERT INTO ventas (fecha, cantidad, total, articulos_idarticulos, tiendas_idtiendas, usuario_idusuario,envio_idenvio) VALUES ('$fecha','".$_SESSION['cantidaddd']."','".$_SESSION['totalll']."',".$_SESSION['idt'].",".$_SESSION['tienda'].",".$_SESSION['idusuarioo'].",".$_SESSION['enviooo'].");");
			
			$con=mysqli_connect('localhost','root','','suarezbd');
            $query5="SELECT existencias FROM existencia WHERE articulos_idarticulos =" .$_SESSION['idt']." AND tiendas_idtiendas = ".$_SESSION['tienda'].";";
            $res5=mysqli_query($con, $query5);
            while ($row5=mysqli_fetch_assoc($res5)):
            	$exi = $row5['existencias'];
            endwhile;

            $nuevaEx = $exi - $_SESSION['cantidaddd'];
			
			$insert = $db->query("UPDATE existencia SET existencias =".$nuevaEx." WHERE articulos_idarticulos = ".$_SESSION['idt']." and tiendas_idtiendas =".$_SESSION['tienda'].";");
			
	   


	?>
	<div class="registro" align="center">
		<p>gracias por su compra </p>
	<?php
	    echo "<a href='index.php'>regresar a menu principal</a>";
	}
	?>
    </body>
</html>