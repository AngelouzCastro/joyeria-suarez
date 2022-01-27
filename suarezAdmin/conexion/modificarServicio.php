<!DOCTYPE html>
<HTML lang="en">
    <HEAD>
	<TITLE>Modificar usuarios</title>
		
		<link rel="stylesheet" type="text/css" href="forms.css">
		
		<script type="text/javascript" src="js/validacionModificacion.js"></script>
	
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
	include_once "DAOevios.php";
	include_once "envios.php";
	if(!isset($_GET['id'])){
	    $daoEnvios = new DAOenvios();
	    $servicios = $daoEnvios->listarServicios();
	    ?>
	<FORM method='GET' action='modificarServicio.php' name="modificarServicio" onsubmit="return ValidarEnvio2();">
		<?php
	if(!isset($_GET['compania'])){
	
	}

	    echo "<TABLE class='registro' border='4'>";
	
	    	?>
	    	
			<tr>
				<th>Id</th>
				<th>Nombre De Compa&nacute;ia</th>
				<th>Casracterisitcas</th>
				<th>Precio de Envio</th>
			</tr>
		<?php
	    for($i=0; $i < count($servicios); $i++){
		$c = $servicios[$i];

		echo "<TR>";
		echo "<TD><INPUT type='radio' onclick='mostrar();' name='id' value='".$c->obtenerID()."'> ".$c->obtenerID()."</td>
			<TD>".
				$c->obtenerCompania()."
			</td>
			<TD>
				".$c->obtenerCaracteristica()."
			</td>
			<TD>
				".$c->obtenerPrecio()."
			</td>";

		echo "</tr>";
	    }
	   
	    echo "</table>";
		?>
		
		<div id='mod' class='registro'>
			Nombre de compa&ntilde;ia: <INPUT class="controls" type="text" name="compania" id="compania" placeholder="ingrese nombre de compañia">
		    <BR>
		    Caracteristicas: <INPUT class="controls" type="text" name="caracteristicas" id="caracteristicas" placeholder="ingrese caracteristicas de la tienda">
		    <BR>
		    Precio: <INPUT class="controls" type="text" name="precio" id="precio" onkeypress="return solonumeros(event);" onpaste="return false" placeholder="ingrese precio de tienda"> 
		    <br> 

		    
		
	<?php
	 echo "<TR><TD colspan='2' align='center'><INPUT class='botons' type='submit' value='Modificar'></td><td><a href='../home.php'>cancelar</a></td></tr></div>";
	echo "</form>";
	} else {
	    $id = $_GET['id'];
		include_once "DAOevios.php";
	    include_once "envios.php";
	    
	    $compania = trim($_GET['compania']);
	    $caracteristicas = trim($_GET['caracteristicas']);
	    $precio = trim($_GET['precio']);
	
	  
	    $servicio = new Envios();
	    $servicio->ponerCompania($compania);
	    $servicio->ponerCaracteristica($caracteristicas);
	    $servicio->ponerPrecio($precio);


	    

	    

	    $daoEnvios = new DAOenvios();

	    $daoEnvios->actualizarServicio($servicio,$id);
	   
		echo "<br>";
		?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php' align='center'>regresar a menu principal</a>";
	
	}
	?>
    </body>
</html>
