<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>registo de envio</title>
    <META charset="utf-8" />
    <script type="text/javascript" src="js/validacion.js"></script>
   	<link rel="stylesheet" type="text/css" href="forms.css">
</head>
    <BODY>
	<?php
	if(!isset($_GET['compania'])){
	?>
	<div class="registro"> 
		<FORM method="GET" action="registroEnvios.php" name="altaEnvio" onsubmit="return ValidarEnvio();">
			<h4> Formulario De Registro De Compañia De Envio</h4>
		    Nombre de compa&ntilde;ia: <INPUT class="controls" type="text" name="compania" id="compania" placeholder="ingrese nombre de compañia">
		    <BR>
		    Caracteristicas: <INPUT class="controls" type="text" name="caracteristicas" id="caracteristicas" placeholder="ingrese caracteristicas de la tienda">
		    <BR>
		    Precio: <INPUT class="controls" type="text" name="precio" id="precio" onkeypress="return solonumeros(event);" onpaste="return false" placeholder="ingrese precio de tienda"> 
		    <br>
		    
		    <INPUT class="botons" type="submit" value="Enviar">
		    <p><a href="../home.php">cancelar</a></p>
		    
		    
		</form>
	</div>
	<?php
	} else {
		include_once "DAOevios.php";
	    include_once "envios.php";
	    
	    $compania = trim($_GET['compania']);
	    $caracteristica = trim($_GET['caracteristicas']);
	    $precio = trim($_GET['precio']);
		    

	    $envios = new Envios();
	    $envios->ponerCompania($compania);
	    $envios->ponerCaracteristica($caracteristica);
	    $envios->ponerPrecio($precio);


	    $daoEnvios = new DAOenvios();
	    $daoEnvios->agregarSerEnvio($envios);

	    ?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php'>regresar a menu principal</a>";
	}
	?>
    </body>
</html>