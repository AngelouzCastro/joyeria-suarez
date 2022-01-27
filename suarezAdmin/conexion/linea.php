<?php 
	/**
	 * 
	 */
	class Linea
	{
		private $id;
		private $descripcion;

		function __construct()
		{
			$this->id = 0;
			$this->descripcion = null;
		}

		public function obtenerId()
		{
			return $this->id;
		}
		public function ponerId($nuevaId)
		{
			$this->id = $nuevaId;
		}

		public function obtenerDescripcion()
		{
			return $this->descripcion;
		}
		public function ponerDescripcion($nuevaDescripcion)
		{
			$this->descripcion = $nuevaDescripcion;
		}

	}

 ?>