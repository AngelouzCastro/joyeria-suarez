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
	include_once "DAOusuarios.php";
	include_once "usuarios.php";
	if(!isset($_GET['id'])){
	    $daoUsuarios = new DAOusuarios();
	    $usuarios = $daoUsuarios->listarUsuarios();
	    ?>
	<FORM method='GET' action='modificarUsuarios.php' name="modificarUsuarios" onsubmit="return ValidarUsuarios2();">
		<?php
	if(!isset($_GET['nombre'])){
	
	}

	    echo "<TABLE class='registro' border='4'>";
	
	    	?>
	    	
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Direci&oacute;n</th>
				<th>Colonia</th>
				<th>Ciudad</th>
				<th>Estado</th>
				<th>Pa&iacute;s</th>
				<th>Codigo Postal</th>
			</tr>
		<?php
	    for($i=0; $i < count($usuarios); $i++){
		$c = $usuarios[$i];

		echo "<TR>";
		echo "<TD><INPUT type='radio' onclick='mostrar();' name='id' value='".$c->obtenerId()."'>".$c->obtenerId()."</td>
			<TD>".
				$c->obtenerNombre()."
			</td>
			<TD>
				".$c->obtenerApellido()."
			</td>
			<TD>
				".$c->obtenerCorreo()."
			</td>
			<TD>
				".$c->obtenerDirecion()."
			</td>
			<TD>
				".$c->obtenerColonia()."
			</td>
			<TD>
				".$c->obtenerCiudad()."
			</td>
			<TD>
				".$c->obtenerEstado()."
			</td>
			<TD>
				".$c->obtenerPais()."
			</td>
			<TD>
				".$c->obtenerCodigoPostal()."
			</td>";

		echo "</tr>";
	    }
	   
	    echo "</table>";
		?>
		
		<div id='mod' class='registro'>
			Nombre: <INPUT class='controls' type='text' name='nombre' id='nombre' placeholder='ingrese su nombre'>
		    <BR>
		    Apellido: <INPUT class="controls" type="text" name="apellido" id="apellido" placeholder="ingrese su apellido">
		    <BR>
		    Correo: <INPUT class="controls" type="email" name="correo" id="correo" placeholder="ingrese su correo">
		    <BR>
		    Direci&oacute;n: <INPUT class="controls" type="text" name="direcion" id="direcion" placeholder="ingrese su direcion">
		    <BR>
		    Colonia: <INPUT class="controls" type="text" name="coloniaa" id="coloniaa" placeholder="ingrese su colonia">
		    <BR>
		    ciudad: <INPUT class="controls" type="text" name="ciudad" id="ciudad" placeholder="ingrese su ciudad">
		    <BR>
		    Estado: <INPUT class="controls" type="text" name="estado" id="estado" placeholder="ingrese su estado">
		    <BR>
		    Pais: <select name = "pais" class="controls">
                            <option value = "MX">M&Eacute;XICO </option>
                            <option value = "SP">ESPAÑA </option>
                            <option value = "USA">USA </option>
                    </select>
            <br>
            Codigo Postal: <input class="controls" type="text" name="codigoPostal" id="cp" placeholder="ingrese su codigo postal">
            <br>    

		    
		
	<?php
	 echo "<TR><TD colspan='2' align='center'><INPUT class='botons' type='submit' value='Modificar'></td><td><a href='../home.php'>cancelar</a></td></tr></div>";
	echo "</form>";
	} else {
	    $id = $_GET['id'];
		include_once "DAOusuarios.php";
	    include_once "usuarios.php";
	    
	    $nombre = trim($_GET['nombre']);
	    $apellido = trim($_GET['apellido']);
	    $correo = trim($_GET['correo']);
	    $direcion = trim($_GET['direcion']);
	    $coloniaa = trim($_GET['coloniaa']);
	    $ciudadd = trim($_GET['ciudad']);
	    $estado = trim($_GET['estado']);
	    $pais = trim($_GET['pais']);
	    $cp = trim($_GET['codigoPostal']);
	
	  
	    $usuario = new Usuarios();
	    $usuario->ponerNombre($nombre);
	    $usuario->ponerApellido($apellido);
	    $usuario->ponerCorreo($correo);
	    $usuario->ponerDirecion($direcion);
	    $usuario->ponerColonia($coloniaa);
	    $usuario->ponerCiudad($ciudadd);
	    $usuario->ponerEstado($estado);
	    $usuario->ponerPais($pais);
	    $usuario->ponerCodigoPostal($cp);
	    

	    

	    $daoUsuarios = new DAOusuarios();

	    $daoUsuarios->actualizarUsuario($usuario,$id);
	   
		echo "<br>";
		?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php' align='center'>regresar a menu principal</a>";
	
	}
	?>
    </body>
</html>
