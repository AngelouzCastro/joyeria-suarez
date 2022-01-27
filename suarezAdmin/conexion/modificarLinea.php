<!DOCTYPE html>
<HTML lang="en">
    <HEAD>
	<TITLE>Modificar Linea</title>
		
		<link rel="stylesheet" type="text/css" href="forms.css">
		
		<script type="text/javascript" src="js/validacion.js"></script>
	
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
	include_once "DAOlinea.php";
	include_once "linea.php";
	if(!isset($_GET['id'])){
	    $daoLineas = new DAOlinea();
	    $lineas = $daoLineas->listarLineas();
	    ?>
	<FORM method='GET' action='modificarLinea.php' name="registroLinea" onsubmit="return ValidarLinea();">
		<?php
	if(!isset($_GET['descripcion'])){
	
	}

	    echo "<TABLE class='registro' border='4'>";
	
	    	?>
	    	
			<tr>
				<th>Id</th>
				<th>Descripci&oacute;n</th>
				
			</tr>
		<?php
	    for($i=0; $i < count($lineas); $i++){
		$c = $lineas[$i];

		echo "<TR>";
		echo "<TD><INPUT type='radio' onclick='mostrar();' name='id' value='".$c->obtenerId()."'> ".$c->obtenerId()."</td>
			<TD>".
				$c->obtenerDescripcion()."
			</td>
			";

		echo "</tr>";
	    }
	   
	    echo "</table>";
		?>
		
		<div id='mod' class='registro'>
			
			Nombre de linea: <INPUT class="controls" type="text" name="linea" id="linea" placeholder="ingrese nombre de linea">

		    
		
	<?php
	 echo "<TR><TD colspan='2' align='center'><INPUT class='botons' type='submit' value='Modificar'></td><td><a href='../home.php'>cancelar</a></td></tr></div>";
	echo "</form>";
	} else {
	    $id = $_GET['id'];
		include_once "DAOlinea.php";
	    include_once "linea.php";
	    
	    $lin = trim($_GET['linea']);
	
	  
	    $servicio = new Linea();
	    $servicio->ponerDescripcion($lin);


	    

	    

	    $daoEnvios = new DAOlinea();

	    $daoEnvios->actualizarLinea($servicio,$id);
		?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php' align='center'>regresar a menu principal</a>";
	
	}
	?>
    </body>
</html>
