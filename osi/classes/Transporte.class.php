<?php

class Transporte extends Camada
{
    private $camada;

    function __construct()
    {
        parent::__construct();
    }

    public function encapsular($camada, $mensagem = '')
    {
        $this->camada = $camada;
        $this->isInstancia($this->camada, new Rede());
        $this->setDados('protocolos',$this->get_protocolos());
        $this->setDados('servico',$this->get_servico());
        $this->setDados('porta_destino',$this->get_porta_destino());
        $this->setDados('mensagem',$mensagem);
        return $this;
    }

    private function get_protocolos()
    {
        $protocolos_shell = utf8_encode(shell_exec('netstat -aon'));
        $conv = array(chr(194).chr(135) => 'ç', chr(195).chr(164) => 'õ');
        return str_replace(array_keys($conv), array_values($conv), $protocolos_shell);
    }

    private function get_servico()
    {
        $servico_shell = utf8_encode(shell_exec('tasklist /fi "pid eq '.getmypid().'" '));
        $conv = array(chr(195).chr(134) => 'ã', chr(194).chr(162) => 'ó');
        return str_replace(array_keys($conv), array_values($conv), $servico_shell);
    }

	private function get_porta_destino()
	{
		return $_SERVER['SERVER_PORT']; 
	}

}