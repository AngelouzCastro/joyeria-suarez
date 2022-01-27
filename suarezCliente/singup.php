<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>nuevo usuario</title>
    <META charset="utf-8" />
</head>
    <BODY>
	<?php
	if(!isset($_GET['nombre'])){
	?>
	<div>
		<FORM method="GET" action="singup.php">
		    Nombre: <INPUT type="text" name="nombre">
		    <BR>
		    Apellido: <INPUT type="text" name="apellido">
		    <BR>
		    Correo: <INPUT type="text" name="correo">
		    <BR>

		    Direci&oacute;n: <INPUT type="text" name="direcion">
		    <BR>
		    Colonia: <INPUT type="text" name="colonia">
		    <BR>
		    ciudad: <INPUT type="text" name="ciudad">
		    <BR>
		    Estado: <INPUT type="text" name="estado">
		    
		    Pais: <select name = "pais">
                            <option value = "MX">M&Eacute;XICO </option>
                            <option value = "SP">ESPAÑA </option>
                            <option value = "USA">USA </option>
                    </select>
            <br>
            Codigo Postal: <input type="text" name="codigoPostal">
            <br>
            <br>      


		    <INPUT type="submit" value="Enviar">
		    
		</form>
	</div>
	<?php
	} else {
		include_once "DAOusuarios.php";
	    include_once "usuarios.php";

	    $nombre = $_GET['nombre'];
	    $apellido = $_GET['apellido'];
	    $correo = $_GET['correo'];
	    $direcion = $_GET['direcion'];
	    $colonia = $_GET['colonia'];
	    $ciudad = $_GET['ciudad'];
	    $estado = $_GET['estado'];
	    $pais = $_GET['pais'];
	    $codigoPostal = $_GET['codigoPostal'];
	
	    

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


	    $daoUsuarios = new DAOusuarios();
	    $daoUsuarios->agregarUsuario($usuarios);
	}
	?>
    </body>
</html>