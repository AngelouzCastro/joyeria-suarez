<!DOCTYPE html>
<HTML lang="en">
    <HEAD>
	<TITLE>Modificar articulos</title>
		<!--
		<link rel="stylesheet" type="text/css" href="forms.css">
		<script type="text/javascript" src="js/validacionModificacion.js"></script>
	-->
    </head>
    
	<style type="text/css">
		#mod{
			display: none;
		}
	</style>
	
	<script type="text/javascript">
		function mostrar(){
			document.getElementById('mod').style.display = 'block';
		}
	</script>
	
	
    <BODY>
	


	<?php
	include_once "DAOarticulos.php";
	include_once "articulo.php";
	if(!isset($_POST['id']))
	{
	    $daoArticulos = new DAOarticulos();
	    $articulos = $daoArticulos->listarArticulos();
	    ?>
	<FORM method='post' action='modificarProducto.php' name="modificarProducto" onsubmit="return ValidarProducto2();">
		<?php
	
	
	

	    echo "<TABLE class='registro' border='4'>";
	
	    	?>
	    	<tr>
	    		<th colspan = "5"><h4 class='registro'>Modificaci&oacute;n de Articulo</h4></th>
	    	</tr>
			<tr>
				<th>Id</th>
				<th>Descripci&oacute;n</th>
				<th>Caracteristicas</th>
				<th>Precio</th>
				
				<th>linea</th>
			</tr>
		<?php
	    for($i=0; $i < count($articulos); $i++)
	    {
		$c = $articulos[$i];

		echo "<TR>";
		echo "<TD><INPUT type='radio' onclick='mostrar();' name='id' value='".$c->obtenerID()."'> ".$c->obtenerID()."</td>
			<TD>".
				$c->obtenerDescripcion()."
			</td>
			<td>".
				$c->obtenerCar()."
			</td>
			<TD>
				".$c->obtenerPrecio()."
			</td>
			
			<TD>"
				.$c->obtenerLineaId()."
			</td>";

		echo "</tr>";
	    }
	   
	    echo "</table>";
		?>
		
		
		
		<div id='mod' class='registro'>
			 Descripci&oacute;n: <INPUT class="controls" type="text" name="descripcion" id="descripcion" placeholder="ingrese descripción del producto">
		    <BR>
		    seleciona la imagen a subir:
			<input  class="botons" type="file" name="image">
			<br>
		    Caracteristicas: <INPUT class="controls" type="text" name="caracteristicas" id="aracteristicas" placeholder="ingrese caracteristicas">
		    <BR>
		    precio: <INPUT  class="controls" type="text" name="precio" id="precio" onkeypress="return solonumeros(event);" onpaste="return false" placeholder="ingrese precio de articulo">
		    <BR>
		    linea: <select name="linea" class="controls" id="linea">
		    	<?php
		    	include_once 'conexion.php';

		    	$mysql = new MysqlConector();
		    	$mysql->conectar();
		    	$consulta = "SELECT * FROM linea";
		    	$mysql->ejecutarConsulta($consulta);
		    	$i=$mysql->ejecutarConsulta($consulta);
		    	
		    	

		    	foreach ($i as $opciones): 
		    		?>
		    		<option value="<?php echo $opciones['idlinea']?>"><?php echo $opciones['descripcion']?></option>";
		    		<?php
		    	endforeach;
		    	#$mysql->desconectar();
		    	?>
		    	
		    </select>
		    <BR>
		    
		
	<?php
	 echo "<TR><TD colspan='2' align='center'><INPUT class='botons' type='submit' value='Modificar'></td><td><a href='../home.php'>cancelar</a></td></tr></div>";
	echo "</form>";
	} 
	else 
	{
		$id = $_POST['id'];
		$descripcion = trim($_POST['descripcion']);
		$caracteristicas = trim($_POST['caracteristicas']);
		$precio = $_POST['precio'];
		$linea = $_POST['linea'];
		echo "id = " .$id . "\n";
	
		#
		if(isset($_POST['submit']))
		{
			$check = getimagesize($_FILES['image']['tmp_name']);
			
		

			if ($check !== false) 
			{
				$image = $_FILES['image']['tmp_name'];
				$imgContent = addslashes(file_get_contents($image));
				$dbHost = "localhost";
				$dbUsername = "root";
				$dbPassword = "";
				$dbName = "suarezbd";
				//conexion
				$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
				if($db->connect_error)
				{
					die("Conection failed: ". $db->connect_error);
				}
			
			
				$insert = $db->query("UPDATE articulos SET descripcion='$descripcion', caracteristicas='$caracteristicas', precio=$precio, imagen='$imgContent', linea_idlinea=$linea WHERE idarticulos=$id;");
				if($insert)
				{
					echo "<p class='registro'>File upload successfully.</p>";
				} 
				else 
				{
					echo "<p class='registro'>file upload failed, please try again</p>";
				}
			}
			else 
			{
				echo "<p class='registro'>please selec an image file to upload</p>";
			}
		}
		

	?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php'>regresar a menu principal</a>";
	}
	?>
    </body>
</html>