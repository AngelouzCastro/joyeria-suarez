<?php

    class Usuarios
    {

		private $id;
		private $nombre;
		private $apellido;
		private $correo;
		private $direcion;
		private $colonia;
		private $ciudad;
		private $estado;
		private $pais;
		private $codigoPostal;
		private $tipoUsuarioId;
		private $contrasena;
		

		function __construct()
		{
		    $this->id = 0;
		    $this->nombre = null;
		    $this->apellido = null;
		    $this->correo = null;
		    $this->direcion = null;
		    $this->colonia = null;
		    $this->ciudad = null;
		    $this->estado = null;
		    $this->pais = null;
		    $this->codigoPostal = null;
		    $this->tipoUsuarioId = 0;
		    $this->contrasena = null;
		    
		}
		# get y set de id
		public function obtenerId()
		{
		    return $this->id;
		}

		public function ponerId($nuevoId)
		{
		    $this->id = $nuevoId;
		}
		
		# get y set de nombre
		public function obtenerNombre()
		{
		    return $this->nombre;
		}

		public function ponerNombre($nuevoNombre)
		{
		    $this->nombre = $nuevoNombre;
		}

		# get y set de apellido
		public function obtenerApellido()
		{
			return $this->apellido;
		}

		public function ponerApellido($nuevoApellido)
		{
			$this->apellido = $nuevoApellido;
		}

		# get y set de correo
		public function obtenerCorreo()
		{
		    return $this->correo;
		}

		public function ponerCorreo($nuevoCorreo)
		{
		    $this->correo = $nuevoCorreo;
		}

		# get y set de direcion
		public function obtenerDirecion()
		{
			return $this->direcion;
		}

		public function ponerDirecion($nuevaDirecion)
		{
			$this->direcion = $nuevaDirecion;
		}

		# get y set de colonia
		public function obtenerColonia()
		{
			return $this->colonia;
		}
		public function ponerColonia($nuevaColonia)
		{
			$this->colonia = $nuevaColonia;
		}

		# get y set de ciudad
		public function obtenerCiudad()
		{
			return $this->ciudad;
		}
		public function ponerCiudad($nuevaCiudad)
		{
			$this->ciudad = $nuevaCiudad;
		}

		# get y set de estado
		public function obtenerEstado()
		{
			return $this->estado;
		}
		public function ponerEstado($nuevoEstado)
		{
			$this->estado = $nuevoEstado;
		}

		# get y set de pais
		public function obtenerPais()
		{
			return $this->pais;
		}
		public function ponerPais($nuevoPais)
		{
			$this->pais = $nuevoPais;
		}

		# get y set de codigo postal
		public function obtenerCodigoPostal()
		{
			return $this->codigoPostal;
		}
		public function ponerCodigoPostal($nuevoCodigoPostal)
		{
			$this->codigoPostal = $nuevoCodigoPostal;
		}

		# get y set de tipo de usuario
		public function obtenerTipoUsuarioId()
		{
			return $this->tipoUsuarioId;
		}
		public function ponerTipoUsuarioId($nuevoTipoUsuarioId)
		{
			$this->tipoUsuarioId = $nuevoTipoUsuarioId;
		}

		#get y set de contraseña
		public function obtenerContrasena()
		{
			return $this->contrasena;
		}
		public function ponerContrasena($nuevaContrasena)
		{
			$this->contrasena = $nuevaContrasena;
		}

		

    }

?>