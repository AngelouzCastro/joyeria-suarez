<!DOCTYPE html>
<HTML lang="en">
<HEAD>
    <TITLE>Actualizar Existencia</title>
    <META charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/validacion.js"></script>
    <link rel="stylesheet" type="text/css" href="forms.css">

</head>
    <BODY>
       
	<?php
	
	if(!isset($_POST['existencia'])){
		
	?>
	<div class="registro">
    <div class="tabla">
        <table border=1 class="controls">
                    <tr>
                        <th>id tienda</th>
                        <th colspan=2>En tienda</th>
                        <th>existen</th>
                    </tr>
                    <?php
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT tiendas.descripcion,
                                        tiendas.idtiendas,
                                    articulos.descripcion,
                                    articulos.imagen,
                                    existencia.existencias     
                                FROM existencia INNER JOIN articulos
                                on existencia.articulos_idarticulos = articulos.idarticulos
                                INNER JOIN tiendas on existencia.tiendas_idtiendas = tiendas.idtiendas;";
                        $res=mysqli_query($con, $query);
                        while ($row=mysqli_fetch_assoc($res)): ?> 
                        <tr>
                            <td> <?php echo $row['idtiendas'] ?></td>
                            <td> <?php echo $row['descripcion'] ?></td>
                            <td> <img   width="50" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="Interestellar"></td>
                            <td> <?php echo $row['existencias'] ?></td>
                        </tr>
                    <?php endwhile; ?>   
                </table>
        </div>
        <div>
		<FORM method="post" action="actulaexistencia.php" name="existencias" onsubmit="return ValidarProducto();" enctype="multipart/form-data">
			<h4> Actualizar Existencias </h4>
               
			<br>
			En tienda: <select name="entienda" class="controls" id="entienda">
		    	<?php
		    	include_once 'conexion.php';

		    	$mysql = new MysqlConector();
		    	$mysql->conectar();
		    	$consulta = "SELECT tiendas.idtiendas, tiendas.descripcion
                FROM existencia INNER JOIN tiendas on existencia.tiendas_idtiendas=tiendas.idtiendas;";
		    	$mysql->ejecutarConsulta($consulta);
		    	$i=$mysql->ejecutarConsulta($consulta);
                
		    	
		    	

		    	foreach ($i as $opciones): 
		    		?>
		    		<option value="<?php echo $opciones['idtiendas']?>"><?php echo $opciones['idtiendas']?>, <?php echo $opciones['descripcion']?></option>";
		    		<?php
                    
		    	endforeach;
		    	$mysql->desconectar();
		    	?>
		    	
		    </select>
		  
		    <BR>
            <div id="select2lista"></div>
           
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#entienda').val(2);
                    recargarLista();
                    $('#entienda').change(function(){
                        recargarLista();
                    });
                })
            </script>
            <script type="text/javascript">
                function recargarLista(){
                    $.ajax({
                        type:"POST",
                        url:"datos.php",
                        data:"continente="+$('#entienda').val(),
                        success:function(r){
                            $('#select2lista').html(r);
                        }
                    });
                }
            </script>
		    <BR>
		    
		    <BR>
		    en existencia: <INPUT  class="controls" type="text" name="existencia" id="existencia" onkeypress="return solonumeros(event);" onpaste="return false" placeholder="ingrese precio de articulo">


		    <INPUT class="botons" type="submit" name="submit" value="Enviar">
		    <p><a href="../home.php">cancelar</a></p>
		</form>
            </div>
	</div>
	<?php
	
	} else {

	
		
		if(isset($_POST['submit']))
		{
		
		$existencia = $_POST['existencia'];
		$articulo = $_POST['lista2'];
		$tienda = $_POST['entienda'];

		echo $existencia." ".$articulo." ".$tienda;
			
			$dbHost = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbName = "suarezbd";
			//conexion
			$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
			if($db->connect_error)
			{
				die("Conection failed: ". $db->connect_error);
			}
			
			
			$insert = $db->query("UPDATE existencia SET existencias =".$existencia." WHERE articulos_idarticulos = ".$articulo." and tiendas_idtiendas =".$tienda.";");
			
		
}
		#

	?>
	<div class="registro" align="center">
	<?php
	    echo "<a href='../home.php'>regresar a menu principal</a>";
	}
	?>
    </body>
</html>