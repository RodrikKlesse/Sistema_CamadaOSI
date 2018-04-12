<?php

class Apresentacao extends Camada
{
    private $camada;
    private $msg_crypt;

    function __construct()
    {
        parent::__construct();
    }

    public function encapsular($camada)
    {
        $this->camada = $camada;
        $this->isInstancia($this->camada, new Sessao());
        $this->msg_crypt = $this->get_msg_criptografada();
        $this->setDados('msg_crypt',$this->msg_crypt);
        $this->setDados('msg_decrypt',$this->get_msg_descriptografada());
        return $this;
    }

	public function get_msg_criptografada()
	{
        return base64_encode($this->camada->getDados('valor_sessao'));
	}

	public function get_msg_descriptografada()
	{
        return base64_decode($this->msg_crypt);
	}
}