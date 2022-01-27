<?php
	if(isset($_POST['submit'])){
		$check = getimagesize($_FILES['image']['tmp_name']);
		if ($check !== false) {
			$image = $_FILES['image']['tmp_name'];

			$imgContent = addslashes(file_get_contents($image));
			$descripcion = $_POST['descripcion'];
	    	$caracteristica = $_POST['caracteristica'];
	    	$precio = $_POST['precio'];
	    	$linea = $_POST['linea'];

			$dbHost = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "suarezbd";

			//conexion
			$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
			if($db->connect_error){
				die("Conection failed: ". $db->connect_error);
			}
			
			$insert = $db->query("INSERT INTO articulos ('descripcion', 'caracteristicas', precio, 'imagen', linea_idlinea) VALUES ('$descripcion','$caracteristica',$precio,'$imgContent',$linea);");
			if($insert){
				echo "File upload successfully.";
			} else {
				echo "file upload failed, please try again";
			}
		}else {
			echo "please selec an image file to upload";
		}
	}
?>