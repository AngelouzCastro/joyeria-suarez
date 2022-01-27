<?php
	/**
	 * clase de articulos
	 */
	class Articulo
	{
		private $id;
		private $descripcion;
		private $car;
		private $precio;
		private $image;
		private $lineaid;

		function __construct()
		{
			$this->id = 0;
			$this->descripcion = null;
			$this->car = null;
			$this->precio = 0;
			$this->lineaid = 0;
		}

		public function obtenerID()
		{
			return $this->id;
		}
		public function ponerId($nuevoId)
		{
			$this->id = $nuevoId;
		}

		public function obtenerCar()
		{
			return $this->car;
		}
		public function ponerCar($nuevaCar)
		{
			$this->car = $nuevaCar;
		}

		public function obtenerDescripcion()
		{
			return $this->descripcion;
		}
		public function ponerDescripcion($nuevaDescripcion)
		{
			$this->descripcion = $nuevaDescripcion;
		}

		public function obtenerImagen()
		{
			return $this->$image;
		}
		public function ponerImagen($nuevaImagen)
		{
			$this->image = $nuevaImagen;
		}

		public function obtenerPrecio()
		{
			return $this->precio;
		}
		public function ponerPrecio($nuevoPrecio)
		{
			$this->precio = $nuevoPrecio;
		}

		public function obtenerLineaId()
		{
			return $this->lineaid;
		}
		public function ponerLineaId($nuevaLineId)
		{
			$this->lineaid = $nuevaLineId;
		}
	}
  ?>