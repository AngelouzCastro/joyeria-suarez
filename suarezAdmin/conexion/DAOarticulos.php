<?php
	 include_once "conexion.php";
    include_once "articulo.php";

    class DAOarticulos
    {
	
		private $mysql;
		private $articulos;

		function __construct(){}

		public function listarArticulos()
		{
			$mysql = new MysqlConector();
			$consulta = "SELECT * FROM articulos";
			$mysql->conectar();
			$registros = $mysql->ejecutarConsulta($consulta);
	    	$cont = 0;
	    	while ($registro = mysqli_fetch_array($registros)) {
	    		$mArticulo = new Articulo();
	    		$mArticulo->ponerId($registro['idarticulos']);
	    		$mArticulo->ponerDescripcion($registro['descripcion']);
	    		$mArticulo->ponerCar($registro['caracteristicas']);
	    		$mArticulo->ponerImagen($registro['imagen']);
	    		$mArticulo->ponerPrecio($registro['precio']);
	    		$mArticulo->ponerLineaId($registro['linea_idlinea']);
	    		

	    		$this->articulos[$cont] = $mArticulo;
	    		$cont++;
	    	}
	    	$mysql->desconectar();
	   		 return $this->articulos;
		}

	


    }
?>