<!DOCTYPE html>
<HTML lang="en">
    <HEAD>
	<TITLE>Modificar tiendas</title>
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
	include_once "DAOTiendas.php";
	include_once "tienda.php";
	if(!isset($_GET['id'])){
	    $daoTiendas = new DAOtiendas();
	    $tiendas = $daoTiendas->listarTiendas();
	    ?>
	<FORM method='GET' action='modificarTienda.php' name="modificarTienda" onsubmit="return ValidarTienda2();">
		<?php
	

	    echo "<TABLE class='registro' border='4'>";
	
	    	?>
	    	<tr>
	    		<th colspan = "6"><h4 class='registro'>Modificaci&oacute;n de Tienda</h4></th>
	    	</tr>
			<tr>
				<th>Id</th>
				<th>Descripci&oacute;n</th>
				<th>Ciudad</th>
				<th>Direci&oacute;n</th>
				<th>Codigo postal</th>
				<th>Horario</th>
			</tr>
		<?php
	    for($i=0; $i < count($tiendas); $i++){
		$c = $tiendas[$i];

		echo "<TR>";
		echo "<TD><INPUT type='radio' onclick='mostrar();' name='id' value='".$c->obtenerIdTienda()."'> ".$c->obtenerIdTienda()."</td>
			<TD>".
				$c->obtenerDescripcion()."
			</td>
			<TD>
				".$c->obtenerCiudad()."
			</td>
			<TD>
				".$c->obtenerDirecion()."
			</td>
			<TD>
				".$c->obtenerCodigoPostal()."
			</td>
			<TD>
				".$c->obtenerHorario()."
			</td>";

		echo "</tr>";
	    
	   }
	    echo "</table>";
		?>
		<?php
		
		echo "
		<div id='mod' class='registro'>
			Descripci&oacute;n: <INPUT class='controls' value='' type='text' name='descripcion' id='descripcion' placeholder='ingrese descripción de la tienda'>
		    <BR>
		    Ciudad: <INPUT class='controls' type='text' name='ciudad' id='ciudad' placeholder='ingrese ciudad de la tienda'>
		    <BR>
		    Direci&oacute;n: <INPUT  class='controls' type='text' name='direcion' id='direcion' placeholder='ingrese direcion de la tienda'>
		    <BR>
		    Codigo Postal: <INPUT class='controls' type='text' name='cp' id='cp' placeholder='ingrese cp de la tienda'>
		    <BR>
		    Horario: <INPUT class='controls' type='text' name='horario' id='horario' placeholder='ingrese horario de tienda'>
		    <BR>
		    ";
		    ?>
		
	<?php
	 echo "<TR><TD colspan='2' align='center'><INPUT class='botons' type='submit' value='Modificar'></td><td><a href='../home.php'>cancelar</a></td></tr></div>";
	echo "</form>";
	} else {
	    $id = $_GET['id'];
		include_once "DAOtiendas.php";
	    include_once "tienda.php";
	    
	    $descripcion = strtolower(trim($_GET['descripcion']));
	    $ciudad = strtolower(trim($_GET['ciudad']));
	    $direcion = strtolower(trim($_GET['direcion']));
	    $codigopostal = strtolower(trim($_GET['cp']));
	    $horario = strtolower(trim($_GET['horario']));
	
	  
	    $tienda = new Tienda();
	    $tienda->ponerDescripcion($descripcion);
	    $tienda->ponerCiudad($ciudad);
	    $tienda->ponerDirecion($direcion);
	    $tienda->ponerCodigoPostal($codigopostal);
	    $tienda->ponerHorario($horario);

	    $daoTiendas = new DAOtiendas();

	    $daoTiendas->actualizarTienda($tienda,$id);
	   
		echo "<br>";
		?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php' align='center'>regresar a menu principal</a>";
	
	}
	?>
    </body>
</html>
