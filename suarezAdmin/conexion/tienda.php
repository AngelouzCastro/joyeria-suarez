<?php
	/**
	 * 
	 */
	class Tienda
	{
		private $idTienda;
		private $descripcipon;
		private $ciudad;
		private $direcion;
		private $codigoPostal;
		private $horario;
		
		function __construct()
		{
			$this->idTienda = 0;
			$this->descripcipon = null;
			$this->ciudad = null;
			$this->direcion = null;
			$this->codigoPostal = null;
			$this->horario = null;
		}

		# get y set de id
		public function obtenerIdTienda()
		{
			return $this->idTienda;
		}
		public function ponerIdTienda($nuevoIdTienda)
		{
			$this->idTienda = $nuevoIdTienda;
		}

		#get y set de descripcion
		public function obtenerDescripcion()
		{
			return $this->descripcion;
		}
		public function ponerDescripcion($nuevaDescripcion)
		{
			$this->descripcion = $nuevaDescripcion;
		}

		#get y set ciudad
		public function obtenerCiudad()
		{
			return $this->ciudad;
		}
		public function ponerCiudad($nuevaCiudad)
		{
			$this->ciudad = $nuevaCiudad;
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

		# get y set de codigo postal
		public function obtenerCodigoPostal()
		{
			return $this->codigoPostal;
		}
		public function ponerCodigoPostal($nuevoCodigoPostal)
		{
			$this->codigoPostal = $nuevoCodigoPostal;
		}

		# get y set de horario
		public function obtenerHorario()
		{
			return $this->horario;
		}
		public function PonerHorario($nuevoHorario)
		{
			$this->horario = $nuevoHorario;
		}
	}
?>