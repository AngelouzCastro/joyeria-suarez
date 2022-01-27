<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>Registro de tendas</title>
    <META charset="utf-8" />
    <script type="text/javascript" src="js/validacion.js"></script>
    <link rel="stylesheet" type="text/css" href="forms.css">
</head>
    <BODY>
	<?php
	if(!isset($_GET['descripcion'])){
	?>
	<div class="registro">
		<FORM method="GET" action="altaTienda.php" name="altaTienda" onsubmit="return ValidarTienda();">
			<h4> Formulario De Registro De Tienda</h4>
		    Descripci&oacute;n: <INPUT class="controls" type="text" name="descripcion" id="descripcion" placeholder="ingrese descripción de la tienda">
		    <BR>
		    Ciudad: <INPUT class="controls" type="text" name="ciudad" id="ciudad" placeholder="ingrese ciudad de la tienda">
		    <BR>
		    Direci&oacute;n: <INPUT  class="controls" type="text" name="direcion" id="direcion" placeholder="ingrese direcion de la tienda">
		    <BR>
		    Codigo Postal: <INPUT class="controls" type="text" name="cp" id="cp" placeholder="ingrese cp de la tienda">
		    <BR>
		    Horario: <INPUT class="controls" type="text" name="horario" id="horario" placeholder="ingrese horario de tienda">
		    <BR>
		    <INPUT class="botons" type="submit" value="Enviar">
		    <p><a href="../home.php">cancelar</a></p>
		</form>
	</div>
	<?php
	} else {
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
	    
	    $daoUsuarios = new DAOtiendas();
	    $daoUsuarios->agregarTienda($tienda);


	?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php'>regresar a menu principal</a>";
	}
	?>
    </body>
</html>