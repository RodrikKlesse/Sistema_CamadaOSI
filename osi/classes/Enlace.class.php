<?php

class Enlace extends Camada
{
    private $camada;
    
    function __construct()
    {
        parent::__construct();
    }

    public function encapsular($camada)
    {
        $this->camada = $camada;
        $this->isInstancia($this->camada, new Fisica());
        $this->setDados('mac_origem',$this->get_mac_origem());
        $this->setDados('mac_destino',$this->get_mac_destino());
        return $this;
    }

    private function get_mac_origem()
    {
        $ip_address= (getenv('HTTP_X_FORWARDED_FOR') != '') ? getenv('HTTP_X_FORWARDED_FOR') : $_SERVER['REMOTE_ADDR'];
		$output_user = shell_exec("arp -a ".$ip_address);
		$output_user = trim($output_user);
		$mac_user = preg_split("/\s+/",$output_user);

		return (isset($mac_user[10]) && $mac_user[10] != 'Nenhuma' ? $mac_user[10] : $this->get_mac_destino());
    }

    private function get_mac_destino()
    {
		$output_server = exec('getmac');
		$mac_server = preg_split("/\s+/",$output_server);
		return ($mac_server[0] ? $mac_server[0] : false);
    }
}
