<!DOCTYPE html>
<html>
<head>
	<title>reporte hoy</title>
	<link rel="stylesheet" type="text/css" href="conexion/forms.css">
</head>
<body>
	<div >
        
		<?php
        $db_host="localhost";
        $db_user="root";
        $db_pass="";
        $db_db="suarezbd";
        $fecha = date("Y-m-d");
        $fecha2 = date("Y-m-d");
        $fecha2 = date('Y-m-d', strtotime("+1 day"));

        
        ?>
        <form method="post" action="rpersonal.php" name="reporte">
        <table class="registro" >
            <tr>
                <td colspan="4">
                    <input type="date" name="inicio" id="inicio" class="controls" placeholder="yyyy-mm-dd" value="<?php echo $fecha ?>">
                </td>
                <td colspan="4">
                    <input type="date" name="fin" id="fin" class="controls" placeholder="yyyy-mm-dd" value="<?php echo $fecha2 ?>">
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    En tienda: <select name="entienda" class="controls" id="entienda">
                <?php
                include_once 'conexion/conexion.php';

                $mysql = new MysqlConector();
                $mysql->conectar();
                $consulta = "SELECT idtiendas,descripcion FROM tiendas";
                $mysql->ejecutarConsulta($consulta);
                $i=$mysql->ejecutarConsulta($consulta);
                
                

                foreach ($i as $opciones): 
                    ?>
                    <option value="<?php echo $opciones['idtiendas']?>"><?php echo $opciones['descripcion']?></option>";
                    <?php
                endforeach;
                $mysql->desconectar();
                ?>
                
            </select>
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    <INPUT class="botons" type="submit" name="submit" value="Enviar">
                    <p><a href="home.php">cancelar</a></p>
                </td>
            <tr>    
                	
        </table>

    </form>
   </div>
</body>
</html>