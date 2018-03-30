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
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $this->encryption_key, utf8_encode($string), MCRYPT_MODE_ECB, $iv);
	    return base64_encode($encrypted_string);
	}

	private function decrypt($encrypted_string) 
	{
		$encrypted_string = base64_decode($encrypted_string);
	    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $this->encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
	    return $decrypted_string;
	}
}

