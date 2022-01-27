<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>Registro de tipo de usuario</title>
    <META charset="utf-8" />
</head>
    <BODY>
	<?php
	if(!isset($_GET['tipo'])){
	?>
	<div>
		<FORM method="GET" action="registroTipoUsuario.php">
		    Tipo de usuario: <INPUT type="text" name="tipo">
		    <BR>   
		    <INPUT type="submit" value="Enviar">
		    
		</form>
	</div>
	<?php
	} else {
		include_once "DAOtipoUsuarios.php";
	    include_once "tipoUsuario.php";
	    
	    $tipo = $_GET['tipo'];
	
	  
	    $usuarios = new TipoUsuario();
	    $usuarios->ponerTipo($tipo);
	    
	    $daoUsuarios = new DAOtipoUsuarios();
	    $daoUsuarios->agregarTipoUsuario($usuarios);
	}
	?>
    </body>
</html>