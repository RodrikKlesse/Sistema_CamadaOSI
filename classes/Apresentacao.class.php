<?php
class Apresentacao {

	private $dados_criptografado;
	private $dados_descriptografado;

	private $encryption_key = "UNIARARAS";

	public function __construct()
	{
		
	}

	public function get_dados_criptografado()
	{
		return $this->dados_criptografado;
	}

	public function get_dados_descriptografado()
	{
		return $this->dados_descriptografado;
	}

	public function set_dados_criptografado()
	{
		$this->dados_criptografado = $this->encrypt($_SESSION['campo_sessao']);
	}

	public function set_dados_descriptografado()
	{
		$this->dados_descriptografado = $this->decrypt($this->dados_criptografado);
	}

	private function encrypt($string)
	{
	    return base64_encode($string);
	}

	private function decrypt($encrypted_string) 
	{
	    return base64_decode($decrypted_string);
	}
}

