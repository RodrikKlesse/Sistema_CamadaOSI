<?php

class Sessao extends Camada
{
    private $camada;

    function __construct()
    {
        parent::__construct();
    }

    public function encapsular($camada)
    {
        $this->camada = $camada;
        $this->isInstancia($this->camada, new Transporte());
        $this->setDados('valor_sessao',$this->get_valorSessao());
        return $this;
    }

    private function get_valorSessao()
    {
        $_SESSION['valor_sessao'] = $this->camada->getDados('mensagem');
        return $_SESSION['valor_sessao'];
    }

}
