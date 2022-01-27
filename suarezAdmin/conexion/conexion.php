<?php

    class MysqlConector {
	
	private $servidor;
	private $usuario;
	private $clave;
	private $bd;
	var $conexion;

	function __construct(){
	    $this->servidor = "localhost";
	    $this->usuario = "root";
	    $this->clave = "";
	    $this->bd = "suarezbd";
	}

	public function conectar(){
	    $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->bd);
	}

	public function ejecutarConsulta($consulta){
	    $resultado = mysqli_query($this->conexion, $consulta) or die (mysqli_error($this->conexion));
	    if(!$resultado){
		echo "No se ha podido ejecutar la consulta" . mysqli_error;
		exit;
	    }
	    return $resultado;
	}

	public function desconectar(){
	    mysqli_close($this->conexion);
	    $this->conexion = null;
	}

    }

?>