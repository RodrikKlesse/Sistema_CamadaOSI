<?php
class Aplicacao 
{

	public $dados;

	public function __construct()
	{
		$this->set_dados();
	}

	public function get_dados()
	{
		return $this->dados;
	}

	private function set_dados()
	{
		$rede = new Rede();
		$this->dados['ip_origem'] = $rede->get_ip_origem();
		$this->dados['ip_destino'] = $rede->get_ip_destino();

		$enlace = new Enlace();
		$this->dados['mac_origem'] = $enlace->get_mac_origem();
		$this->dados['mac_destino'] = $enlace->get_mac_destino();

		$transporte = new Transporte();
		$this->dados['porta_destino'] = $transporte->get_porta_destino();
	}
}

