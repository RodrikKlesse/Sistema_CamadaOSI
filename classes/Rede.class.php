<?php
class Rede {

	private $ip_address_origem;
	private $ip_adress_destino;

	public function __construct()
	{
		$this->set_ip_origem();
		$this->set_ip_destino();
	}

	public function get_ip_origem()
	{
		return $this->ip_address_origem;
	}

	public function get_ip_destino()
	{
		return $this->ip_address_destino;
	}

	private function set_ip_origem()
	{
		$this->ip_address_origem = (getenv('HTTP_X_FORWARDED_FOR') != '') ? getenv('HTTP_X_FORWARDED_FOR') : $_SERVER['REMOTE_ADDR']; 
	}

	private function set_ip_destino()
	{
		$this->ip_address_destino = $_SERVER['SERVER_ADDR'];
	}
}

