<?php
	 include_once "conexion.php";
    include_once "articulo.php";

    class DAOarticulo
    {
	
		private $mysql;
		private $contactos;

		function __construct(){}

		public function agregarArticulo($articulo)
		{
		    $mysql = new MysqlConector();
		    $consulta = "INSERT INTO articulos (descripcion, caracteristicas, precio, linea_idlinea) VALUES ('" . 
		    $articulo->obtenerDescripcion() . "','" . 
		    $articulo->obtenerCaracteristica()."'," .
		    $articulo->obtenerPrecio()."," .
		    $articulo->obtenerLineaId().")";
		    $mysql->conectar();
		    $mysql->ejecutarConsulta($consulta);
		    $mysql->desconectar();
		}


    }
?>