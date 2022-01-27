<?php
	 include_once "conexion.php";
    include_once "linea.php";

    class DAOlinea
    {
	
		private $mysql;

		function __construct(){}

		public function agregarLinea($linea)
		{
		    $mysql = new MysqlConector();
		    $consulta = "INSERT INTO linea (descripcion) VALUES ('" . 
		    $linea->obtenerDescripcion() . "')";
		    $mysql->conectar();
		    $mysql->ejecutarConsulta($consulta);
		    $mysql->desconectar();
		}

		public function listarLineas()
		{
			$mysql = new MysqlConector();
			$consulta = "SELECT * FROM linea";
			$mysql->conectar();
			$registros = $mysql->ejecutarConsulta($consulta);
	    	$cont = 0;
	    	while ($registro = mysqli_fetch_array($registros)) {
	    		$mLinea = new Linea();
	    		$mLinea->ponerId($registro['idlinea']);
	    		$mLinea->ponerDescripcion($registro['descripcion']);

	    		$this->lineas[$cont] = $mLinea;
	    		$cont++;
	    	}
	    	$mysql->desconectar();
	   		 return $this->lineas;
		}

		public function actualizarLinea($nuevaLinea,$id){
			$mysql = new MysqlConector();
	    $consulta = "UPDATE linea SET descripcion='" .$nuevaLinea->obtenerDescripcion()."' WHERE idlinea =" .$id;
	    $mysql->conectar();
	    $mysql->ejecutarConsulta($consulta);
	    $mysql->desconectar();
		}

    }
?>