<?php

abstract class Camada
{
	private $dados;

    function __construct()
    {

    }

    public function getDados($key)
    {
        if(!empty($key) && isset($this->dados[$key]))
        	return $this->dados[$key];
    }

    public function setDados($key, $value = null)
    {
        if(!empty($key))
    	   $this->dados[$key] = $value;
    }

    protected function isInstancia($camada, $instancia)
    {
        if (!($camada instanceof $instancia))
            die("Erro de instancia inesperado: '".get_class($camada)."' ");

        $this->show_inConsole($camada);
    }

    private function show_inConsole($camada)
    {
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            echo "<script>console.log('Comunicação das camadas: " . get_class($camada) . " -> ". get_called_class() ."');</script>";
        }
    }
}