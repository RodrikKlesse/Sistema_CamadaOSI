<?php

class Aplicacao extends Camada
{
    private $camada;

    function __construct()
    {
        parent::__construct();
    }

    public function encapsular($camada)
    {
        $this->camada = $camada;
        $this->isInstancia($this->camada, new Apresentacao());
    	$this->setDados('aplicacao',$this->get_protocolo_app());
        return $this;
    }

    private function get_protocolo_app()
    {
    	return $_SERVER['SERVER_PROTOCOL'];
    }
}
