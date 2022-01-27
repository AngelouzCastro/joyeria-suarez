<?php
	 include_once "conexion.php";
    include_once "tienda.php";

    class DAOtiendas
    {
	
		private $mysql;
		private $tiendas;

		function __construct(){}

		public function agregarTienda($nuevaTienda)
		{
		    $mysql = new MysqlConector();
		    $consulta = "INSERT INTO tiendas (descripcion, ciudad, direcion, cpostal, horario) VALUES ('" . 
		    $nuevaTienda->obtenerDescripcion() . "','" 
		    . $nuevaTienda->obtenerCiudad() . "','" 
		    . $nuevaTienda->obtenerDirecion() . "','"
		    . $nuevaTienda->obtenerCodigoPostal() . "','"
		    . $nuevaTienda->obtenerHorario() . "'".")";
		    $mysql->conectar();
		    $mysql->ejecutarConsulta($consulta);
		    $mysql->desconectar();
		}

		public function listarTiendas()
		{
			$mysql = new MysqlConector();
			$consulta = "SELECT * FROM tiendas";
			$mysql->conectar();
			$registros = $mysql->ejecutarConsulta($consulta);
	    	$cont = 0;
	    	while ($registro = mysqli_fetch_array($registros)) {
	    		$miTienda = new Tienda();
	    		$miTienda->ponerIdTienda($registro['idtiendas']);
	    		$miTienda->ponerDescripcion($registro['descripcion']);
	    		$miTienda->ponerCiudad($registro['ciudad']);
	    		$miTienda->ponerDirecion($registro['direcion']);
	    		$miTienda->ponerCodigoPostal($registro['cpostal']);
	    		$miTienda->PonerHorario($registro['horario']);

	    		$this->tiendas[$cont] = $miTienda;
	    		$cont++;
	    	}
	    	$mysql->desconectar();
	   		 return $this->tiendas;
		}

		public function actualizarTienda($nuevaTienda,$id){
		$mysql = new MysqlConector();
	    $consulta = "UPDATE tiendas SET descripcion='" .$nuevaTienda->obtenerDescripcion().
	    "' ,ciudad='".$nuevaTienda->obtenerCiudad().
	    "' ,direcion='".$nuevaTienda->obtenerDirecion().
	    "' ,cpostal='".$nuevaTienda->obtenerCodigoPostal().
	    "' ,horario='".$nuevaTienda->obtenerHorario().
		"' WHERE idtiendas=" .$id;
	    $mysql->conectar();
	    $mysql->ejecutarConsulta($consulta);
	    $mysql->desconectar();
	}


    }
?>