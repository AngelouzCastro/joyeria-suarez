<?php
class Envios
{
	private $id;
	private $compania;
	private $caracteristica;
	private $precio;

	function __construct()
	{
		$this->id = 0;
		$this->compania = null;
		$this->caracteristica = null;
		$this->precio = 0;
	}

	#GET Y SET ID
	public function obtenerID()
	{
		return $this->id;
	}
	public function ponerID($nuevoId)
	{
		$this->id = $nuevoId;
	}

	#Get y set de compania nombre
	public function obtenerCompania()
	{
		return $this->compania;
	}
	public function ponerCompania($nuevaCompania)
	{
		$this->compania = $nuevaCompania;
	}

	#get y set de caracteristica
	public function obtenerCaracteristica()
	{
		return $this->caracteristica;
	}

	public function ponerCaracteristica($nuevaCaracteristica)
	{
		$this->caracteristica = $nuevaCaracteristica;
	}

	#get y set de precio
	public function obtenerPrecio()
	{
		return $this->precio;
	}
	public function ponerPrecio($nuevoPrecio)
	{
		$this->precio = $nuevoPrecio;
	}
}
?>