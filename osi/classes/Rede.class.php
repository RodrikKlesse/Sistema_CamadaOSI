<?php

class Rede extends Camada
{
    private $camada;
    
    function __construct()
    {
        parent::__construct();
    }

    public function encapsular($camada)
    {
        $this->camada = $camada;
        $this->isInstancia($this->camada, new Enlace());
        $this->setDados('ip_origem',$this->get_ip_origem());
        $this->setDados('ip_destino',$this->get_ip_destino());
        return $this;
    }

    private function get_ip_origem()
    {
        return (getenv('HTTP_X_FORWARDED_FOR') != '') ? getenv('HTTP_X_FORWARDED_FOR') : $_SERVER['REMOTE_ADDR']; 
    }

    private function get_ip_destino()
    {
        return $_SERVER['SERVER_ADDR'];
    }
}