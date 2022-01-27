<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>Existencia</title>
    <META charset="utf-8" />
    
    <script type="text/javascript" src="js/validacion.js"></script>
    <link rel="stylesheet" type="text/css" href="forms.css">

</head>
    <BODY>
	<?php
	
	if(!isset($_POST['existencia'])){
		
	?>
	<div class="registro">
		<FORM method="post" action="existencia.php" name="existencias" onsubmit="return ValidarProducto();" enctype="multipart/form-data">
			<h4> Existencias </h4>
			<br>
			En tienda: <select name="entienda" class="controls" id="entienda">
		    	<?php
		    	include_once 'conexion.php';

		    	$mysql = new MysqlConector();
		    	$mysql->conectar();
		    	$consulta = "SELECT idtiendas,descripcion FROM tiendas";
		    	$mysql->ejecutarConsulta($consulta);
		    	$i=$mysql->ejecutarConsulta($consulta);
		    	
		    	

		    	foreach ($i as $opciones): 
		    		?>
		    		<option value="<?php echo $opciones['idtiendas']?>"><?php echo $opciones['descripcion']?></option>";
		    		<?php
		    	endforeach;
		    	$mysql->desconectar();
		    	?>
		    	
		    </select>
		  
		    <BR>
		    articulo: <select name="articulo" class="controls" id="articulo">
		    	<?php
		    	include_once 'conexion.php';

		    	$mysql = new MysqlConector();
		    	$mysql->conectar();
		    	$consulta = "SELECT idarticulos, descripcion FROM articulos";
		    	$mysql->ejecutarConsulta($consulta);
		    	$i=$mysql->ejecutarConsulta($consulta);
		    	
		    	

		    	foreach ($i as $opciones): 
		    		?>
		    		<option value="<?php echo $opciones['idarticulos']?>"><?php echo $opciones['descripcion']?></option>";
		    		<?php
		    	endforeach;
		    	$mysql->desconectar();
		    	?>
		    	
		    </select>
		    <BR>
		    
		    <BR>
		    en existencia: <INPUT  class="controls" type="text" name="existencia" id="existencia" onkeypress="return solonumeros(event);" onpaste="return false" placeholder="ingrese precio de articulo">


		    <INPUT class="botons" type="submit" name="submit" value="Enviar">
		    <p><a href="../home.php">cancelar</a></p>
		</form>
	</div>
	<?php
	
	} else {

	
		
		if(isset($_POST['submit']))
		{
		
		$existencia = $_POST['existencia'];
		$articulo = $_POST['articulo'];
		$tienda = $_POST['entienda'];

		
			
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
			
			
			$insert = $db->query("INSERT INTO existencia (tiendas_idtiendas, articulos_idarticulos, existencias) VALUES ('$tienda','$articulo','$existencia');");
			
		
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