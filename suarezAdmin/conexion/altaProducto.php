<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>Alta de producto</title>
    <META charset="utf-8" />
    
    <script type="text/javascript" src="js/ValidarProducto.js"></script>
    <link rel="stylesheet" type="text/css" href="forms.css">

</head>
    <BODY>
	<?php
	
	if(!isset($_POST['descripcion'])){
		
	?>
	<div class="registro">
		<FORM method="post" action="altaProducto.php" name="altaProducto" onsubmit="return ValidarProducto();" enctype="multipart/form-data">
			<h4> Formulario De Registro De Producto</h4>
		    Descripci&oacute;n: <INPUT class="controls" type="text" name="descripcion" id="descripcion" placeholder="ingrese descripción del producto">
		    <BR>
		    seleciona la imagen a subir:
			<input  class="botons" type="file" name="image" id="image" onchange="validar();">
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
		    
		    <INPUT class="botons" type="submit" name="submit" value="Enviar">
		    <p><a href="../home.php">cancelar</a></p>
		</form>
	</div>
	<?php
	
	} else {

	
		#
		if(isset($_POST['submit']))
{
		$check = getimagesize($_FILES['image']['tmp_name']);
		$descripcion = trim($_POST['descripcion']);
		$caracteristicas = trim($_POST['caracteristicas']);
		$precio = $_POST['precio'];
		$linea = $_POST['linea'];

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
			
			
			$insert = $db->query("INSERT INTO articulos (descripcion, caracteristicas, precio, imagen, linea_idlinea) VALUES ('$descripcion','$caracteristicas',$precio,'$imgContent',$linea);");
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
		#

	?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php'>regresar a menu principal</a>";
	}
	?>
    </body>
</html>