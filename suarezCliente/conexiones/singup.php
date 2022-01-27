<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>nuevo usuario</title>
    <META charset="utf-8" />
    <script type="text/javascript" src="js/validacion.js"></script>
    <link rel="stylesheet" type="text/css" href="forms.css">
</head>
    <BODY>
	<?php
	if(!isset($_GET['nombre'])){
	?>
	<div class="registro">
		<FORM method="GET" action="singup.php" name="singup" onsubmit="return ValidarUsuario();">
			
			<h4> Formulario De Registro De Usuario Admin </h4>
		    Nombre: <INPUT class="controls" type="text" name="nombre" id="nombre" placeholder="ingrese su nombre">
		    <BR>
		    Apellido: <INPUT class="controls" type="text" name="apellido" id="apellido" placeholder="ingrese su apellido">
		    <BR>
		    Correo: <INPUT class="controls" type="email" name="correo" id="correo" placeholder="ingrese su correo">
		    <BR>
		    Contraseña: <INPUT class="controls" type="text" name="contrasena" id="contrasena" placeholder="ingrese su contraseña">
		    <br>
		    Direci&oacute;n: <INPUT class="controls" type="text" name="direcion" id="direcion" placeholder="ingrese su direcion">
		    <BR>
		    Colonia: <INPUT class="controls" type="text" name="colonia" id="colonia" placeholder="ingrese su colonia">
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


		    <INPUT class="botons" type="submit" value="Enviar">
		    <br>
		    <p><a href="../indexx.php">cancelar</a></p>
		    
		</form>
	</div>
	<?php
	} else {
		include_once "DAOusuarios.php";
	    include_once "usuarios.php";
	    
	    $nombre = trim($_GET['nombre']);
	    $apellido = trim($_GET['apellido']);
	    $correo = trim($_GET['correo']);
	    $direcion = trim($_GET['direcion']);
	    $colonia = trim($_GET['colonia']);
	    $ciudad = trim($_GET['ciudad']);
	    $estado = trim($_GET['estado']);
	    $pais = $_GET['pais'];
	    $codigoPostal = trim($_GET['codigoPostal']);
	    $contrasena = trim($_GET['contrasena']);
	
	    

	    $usuarios = new Usuarios();
	    $usuarios->ponerNombre($nombre);
	    $usuarios->ponerApellido($apellido);
	    $usuarios->ponerCorreo($correo);
	    $usuarios->ponerDirecion($direcion);
	    $usuarios->ponerColonia($colonia);
	    $usuarios->ponerCiudad($ciudad);
	    $usuarios->ponerEstado($estado);
	    $usuarios->ponerPais($pais);
	    $usuarios->ponerCodigoPostal($codigoPostal);
	    $usuarios->ponerTipoUsuarioId(2);
	    $usuarios->ponerContrasena($contrasena);


	    $daoUsuarios = new DAOusuarios();
	    $daoUsuarios->agregarUsuario($usuarios);
	    
	    ?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../indexx.php'>Iniciar Sesi&oacute;n</a>";
	}
	?>
    </body>
</html>