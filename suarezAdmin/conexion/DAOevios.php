<?php
	 include_once "conexion.php";
    include_once "envios.php";

    class DAOenvios
    {
	
		private $mysql;
		private $contactos;

		function __construct(){}

		public function agregarSerEnvio($serEnvio)
		{
		    $mysql = new MysqlConector();
		    $consulta = "INSERT INTO envio (compania, caracteristica, precio) VALUES ('" . 
		    $serEnvio->obtenerCompania() . "','" 
		    . $serEnvio->obtenerCaracteristica() . "'," 
		    . $serEnvio->obtenerPrecio() .")";
		    $mysql->conectar();
		    $mysql->ejecutarConsulta($consulta);
		    $mysql->desconectar();
		}

		public function listarServicios()
		{
			$mysql = new MysqlConector();
			$consulta = "SELECT * FROM envio";
			$mysql->conectar();
			$registros = $mysql->ejecutarConsulta($consulta);
	    	$cont = 0;
	    	while ($registro = mysqli_fetch_array($registros)) {
	    		$mServicio = new Envios();
	    		$mServicio->ponerID($registro['idenvio']);
	    		$mServicio->ponerCompania($registro['compania']);
	    		$mServicio->ponerCaracteristica($registro['caracteristica']);
	    		$mServicio->ponerPrecio($registro['precio']);

	    		$this->usuarios[$cont] = $mServicio;
	    		$cont++;
	    	}
	    	$mysql->desconectar();
	   		 return $this->usuarios;
		}

		public function actualizarServicio($nuevoservicio,$id){
			$mysql = new MysqlConector();
	    $consulta = "UPDATE envio SET compania='" .$nuevoservicio->obtenerCompania().
	    "' ,caracteristica='".$nuevoservicio->obtenerCaracteristica().
	    "' ,precio=".$nuevoservicio->obtenerPrecio().
		" WHERE idenvio =" .$id;
	    $mysql->conectar();
	    $mysql->ejecutarConsulta($consulta);
	    $mysql->desconectar();
		}
/*

	    "' ,caracteristica='".$nuevoservicio->obtenerCaracteristica().
	    "' ,precio=".$nuevoservicio->obtenerPrecio().
*/

    }
?>