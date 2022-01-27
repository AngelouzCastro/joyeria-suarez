<!DOCTYPE html>
<html lang="en">
<head>
	<title>subida articulo</title>
</head>
<body>
	<!--
	<php
	if(!isset($_POST['linea'])){
	?>
-->
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Descripci&oacute;n: <INPUT type="text" name="descripcion">
		<BR>
		Caracteristica: <INPUT type="text" name="caracteristica">
		<BR>
		Precio: <INPUT type="text" name="precio">
		<BR>
		seleciona la imagen a subir:
		<input type="file" name="image">
		<br>
		linea: <INPUT type="text" name="linea">
		<BR>
		<input type="submit" name="submit" value="upoload">
	</form>
<!--	
	<php
	}else {
		include_once "DAOarticulo.php";
	    include_once "Articulo.php";
	    
	    $descripcion = $_GET['descripcion'];
	    $caracteristica = $_GET['caracteristica'];
	    $precio = $_GET['precio'];
	    $linea = $_GET['linea'];
		    

	    $articulo = new Articulo();
	    $articulo->ponerDescripcion($descripcion);
	    $articulo->ponerCaracteristica($caracteristica);
	    $articulo->ponerPrecio($precio);
	    $articulo->ponerLineaId($linea);


	    $daoArticulo = new DAOarticulo();
	    $daoArticulo->agregarArticulo($articulo);
	}
	?>
-->
</body>
</html>