<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>modificacion de producto</title>
    <META charset="utf-8" />
    
    <script type="text/javascript" src="js/ValidarProducto.js"></script>
    <link rel="stylesheet" type="text/css" href="forms.css">

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
	

</head>
    <BODY>
    	

	<?php
	?>
	
		<FORM method="POST" action="ModificarArti.php" name="altaProducto" onsubmit="return ValidarProducto();" enctype="multipart/form-data">

			<div>
				<?php
	include_once "DAOarticulos.php";
	include_once "articulo.php";
	
	   

	if(!isset($_POST['descripcion'])){
	    
		 $daoArticulos = new DAOarticulos();
	    $articulos = $daoArticulos->listarArticulos();
	    
	
	
	
	

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
			</div>
			<div class="registro" id="mod">
			<h4> Formulario De Registro De Producto</h4>
			<!--
			<BR>
		    Selecione articulo: <select name="articuloo" class="controls" id="articuloo">
		    	<?php
		    	/*
		    	include_once 'conexion.php';

		    	$mysql = new MysqlConector();
		    	$mysql->conectar();
		    	$consulta = "SELECT * FROM articulos";
		    	$mysql->ejecutarConsulta($consulta);
		    	$i=$mysql->ejecutarConsulta($consulta);
		    	
		    	

		    	foreach ($i as $opciones): 
		    		?>
		    		<option value="<?php echo $opciones['idarticulos']?>"><?php echo $opciones['idarticulos']?></option>";
		    		<?php
		    	endforeach;
		    	$mysql->desconectar();
		    	*/?>
		    	
		    </select>
		    <BR>
			-->
		    Descripci&oacute;n: <INPUT class="controls" type="text" name="descripcion" id="descripcion" placeholder="ingrese descripción del producto">
		    <BR>
		    seleciona la imagen a subir:
			<input  class="botons" type="file" name="image" id="image">
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
		    	$mysql->desconectar();
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
		$idArticulo = $_POST['id'];

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
			
			
			$insert = $db->query("UPDATE articulos SET descripcion='$descripcion', caracteristicas='$caracteristicas', precio=$precio, imagen='$imgContent', linea_idlinea=$linea WHERE idarticulos=$idArticulo;");
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