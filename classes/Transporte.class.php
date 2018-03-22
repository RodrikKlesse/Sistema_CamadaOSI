<?php
class Transporte {

	private $porta_destino;
	
	public function __construct()
	{
		$this->set_porta_destino();
	}

	public function get_porta_destino()
	{
		return $this->porta_destino;
	}

	private function set_porta_destino()
	{
		$this->porta_destino = $_SERVER['SERVER_PORT']; 
	}
}

