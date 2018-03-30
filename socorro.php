<?php
require_once "bootstrap.php";

$_SESSION['campo_sessao'] = $_GET['campo_sessao'];

if(isset($_SESSION['campo_sessao']) && !empty($_SESSION['campo_sessao']))
{
    $apresentacao = new Apresentacao();
	$apresentacao->set_dados_criptografado();
	$apresentacao->set_dados_descriptografado();

	$criptografado = $apresentacao->get_dados_criptografado();
	$descriptografado = $apresentacao->get_dados_descriptografado();


	$array = array("criptografado" => $criptografado, 
		           "descriptografado" => $descriptografado);
} else
{
    $array = false;
}

echo json_encode($array);

?>