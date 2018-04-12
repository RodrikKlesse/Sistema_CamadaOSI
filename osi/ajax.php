<?php
require_once "bootstrap.php";

if(isset($_GET['campo_sessao']) && !empty($_GET['campo_sessao']))
{

	$transporte = new Transporte();
	$camada_transporte = $transporte->encapsular(new Rede(), $_GET['campo_sessao']);

	$sessao = new Sessao();
	$camada_sessao = $sessao->encapsular($camada_transporte);

	$apresentacao = new Apresentacao();
	$camada_apresentacao = $apresentacao->encapsular($camada_sessao);

	$array = array("mensagem_original" => $_GET['campo_sessao'],
				   "criptografado" => $camada_apresentacao->getDados('msg_crypt'), 
		           "descriptografado" => $camada_apresentacao->getDados('msg_decrypt'));

}
else
{
	$array = false;
}

echo json_encode($array);