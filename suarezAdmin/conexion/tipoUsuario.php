<?php
	class TipoUsuario
	{
		private $id;
		private $tipo;

		function __construct()
		{
		    $this->id = 0;
		    $this->tipo = null;
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

		#get y set de tipo
		public function obtenerTipo()
		{
			return $this->tipo;
		}
		public function ponerTipo($nuevoTipo)
		{
			$this->tipo = $nuevoTipo;
		}
	}

	
?>