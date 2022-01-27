<?php

    include_once "conexion.php";
    include_once "usuarios.php";

    class DAOusuarios
    {
	
		private $mysql;
		private $contactos;

		function __construct(){}

		public function agregarUsuario($nuevoUsuario)
		{
		    $mysql = new MysqlConector();
		    $consulta = "INSERT INTO usuario (nombre, apellido, correo, direcion, colonia, ciudad, estado, pais, cp, tipousuario_idtipousuario, contrasena) VALUES ('" . 
		    $nuevoUsuario->obtenerNombre() . "','" 
		    . $nuevoUsuario->obtenerApellido() . "','" 
		    . $nuevoUsuario->obtenerCorreo() . "','"
		    . $nuevoUsuario->obtenerDirecion() . "','"
		    . $nuevoUsuario->obtenerColonia() . "','"
		    . $nuevoUsuario->obtenerCiudad() . "','"
		    . $nuevoUsuario->obtenerEstado() . "','"
		    . $nuevoUsuario->obtenerPais() . "','"
		    . $nuevoUsuario->obtenerCodigoPostal() . "',"
		    . $nuevoUsuario->obtenerTipoUsuarioId() .",'"
		    . $nuevoUsuario->obtenerContrasena() . "'".")";
		    $mysql->conectar();
		    $mysql->ejecutarConsulta($consulta);
		    $mysql->desconectar();
		}

		public function listarUsuarios()
		{
			$mysql = new MysqlConector();
			$consulta = "SELECT * FROM usuario WHERE tipousuario_idtipousuario = 1";
			$mysql->conectar();
			$registros = $mysql->ejecutarConsulta($consulta);
	    	$cont = 0;
	    	while ($registro = mysqli_fetch_array($registros)) {
	    		$mUsuario = new Usuarios();
	    		$mUsuario->ponerId($registro['idusuario']);
	    		$mUsuario->ponerNombre($registro['nombre']);
	    		$mUsuario->ponerApellido($registro['apellido']);
	    		$mUsuario->ponerCorreo($registro['correo']);
	    		$mUsuario->ponerDirecion($registro['direcion']);
	    		$mUsuario->PonerColonia($registro['colonia']);
	    		$mUsuario->ponerCiudad($registro['ciudad']);
	    		$mUsuario->ponerEstado($registro['estado']);
	    		$mUsuario->ponerPais($registro['pais']);
	    		$mUsuario->ponerCodigoPostal($registro['cp']);

	    		$this->usuarios[$cont] = $mUsuario;
	    		$cont++;
	    	}
	    	$mysql->desconectar();
	   		 return $this->usuarios;
		}

		public function actualizarUsuario($nuevousuario,$id){
			$mysql = new MysqlConector();
	    $consulta = "UPDATE usuario SET nombre='" .$nuevousuario->obtenerNombre().
	    "' ,apellido='".$nuevousuario->obtenerApellido().
	    "' ,correo='".$nuevousuario->obtenerCorreo().
	    "' ,direcion='".$nuevousuario->obtenerDirecion().
	    "' ,colonia='".$nuevousuario->obtenerColonia().
	    "' ,ciudad='".$nuevousuario->obtenerCiudad().
	    "' ,estado='".$nuevousuario->obtenerEstado().
	    "' ,pais='".$nuevousuario->obtenerPais().
	    "' ,cp='".$nuevousuario->obtenerCodigoPostal().
		"' WHERE idusuario =" .$id;
	    $mysql->conectar();
	    $mysql->ejecutarConsulta($consulta);
	    $mysql->desconectar();
		}


    }

?>