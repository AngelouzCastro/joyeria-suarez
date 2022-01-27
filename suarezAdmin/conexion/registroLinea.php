<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>registo de linea</title>
    <META charset="utf-8" />
    <script type="text/javascript" src="js/validacion.js"></script>
    
    <link rel="stylesheet" type="text/css" href="forms.css">
	
</head>
    <BODY>
	<?php
		if(!isset($_GET['linea'])){
	?>
	<div class="registro">
		<FORM method="GET" action="registroLinea.php" name="registroLinea" onsubmit="return ValidarLinea();">
			<h4> Formulario De Registro De Linea De Productos</h4>
			
		    Nombre de linea: <INPUT class="controls" type="text" name="linea" id="linea" placeholder="ingrese nombre de linea">

		    <INPUT class="botons" type="submit" value="Enviar">
		    
		    <p><a href="../home.php">cancelar</a></p>
		  
		</form>
	</div>
	<?php
	} else {
		include_once "DAOlinea.php";
	    include_once "linea.php";
	    
	    $lineaa = trim($_GET['linea']);
		    

	    $linea = new Linea();
	    $linea->ponerDescripcion($lineaa);


	    $daoLinea = new DAOlinea();
	    $daoLinea->agregarLinea($linea);

	?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php'>regresar a menu principal</a>";
	}
	?>
	</div>
	
    </body>
</html>