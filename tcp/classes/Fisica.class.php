<?php

class Fisica extends Camada
{

    function __construct()
    {
        parent::__construct();
    }

    public function encapsular()
    {
        $this->setDados('componentes',$this->get_componentes());
        return $this;
    }


    private function get_componentes()
    {
        $result = null;

        $exec = shell_exec("ipconfig");
        $adapters = explode("Ethernet", $exec);

        foreach ($adapters as $adapter) 
        {
            $search = substr($adapter, 0, strpos($adapter,":"));
            if($search)
                $result .= $search . '<br />';
        }

        $conv = array(chr(195).chr(134) => 'ã');
        return str_replace(array_keys($conv), array_values($conv), utf8_encode($result));
    }
}