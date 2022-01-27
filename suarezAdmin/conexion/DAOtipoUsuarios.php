<?php

    include_once "conexion.php";
    include_once "tipoUsuario.php";

    class DAOtipoUsuarios
    {
	
		private $mysql;
		private $contactos;

		function __construct(){}

		public function agregarTipoUsuario($nuevoTipoUsuario)
		{
		    $mysql = new MysqlConector();
		    $consulta = "INSERT INTO tipousuario (tipo) VALUES ('" . 
		    $nuevoTipoUsuario->obtenerTipo() ."'".")";
		    $mysql->conectar();
		    $mysql->ejecutarConsulta($consulta);
		    $mysql->desconectar();
		}


    }

?>