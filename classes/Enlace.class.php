<?php
class Enlace 
{

	private $mac_address_origem;
	private $mac_adress_destino;
	
	public function __construct()
	{
		$this->set_mac_origem();
		$this->set_mac_destino();
	}

	public function get_mac_origem()
	{
		return $this->mac_address_origem;
	}

	public function get_mac_destino()
	{
		return $this->mac_address_destino;
	}

	private function set_mac_origem()
	{
		return $this->mac_address_origem = $this->user();
	}

	private function set_mac_destino()
	{
		$this->mac_address_destino = $this->server();
	}

	private function server()
	{
		$output_server = exec('getmac');
		$mac_server = preg_split("/\s+/",$output_server);
		return ($mac_server[0] ? $mac_server[0] : false);
	}

	private function user()
	{
		$rede = new Rede();
		$ip_address = $rede->get_ip_origem();

		$output_user = shell_exec("arp -a ".$ip_address);
		$output_user = trim($output_user);
		$mac_user = preg_split("/\s+/",$output_user);

		return (isset($mac_user[10]) && $mac_user[10] != 'Nenhuma' ? $mac_user[10] : $this->server());
	}
}

