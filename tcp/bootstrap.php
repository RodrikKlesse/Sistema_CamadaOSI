<?php

// Inicia Sessão
session_start();

// Seta a configuração de data e hora
ini_set('date.timezone',  'America/Sao_Paulo');

// Level de erros
ini_set('display_errors', 'On');

define('RAIZ_APP', dirname(__FILE__));
define('LIB', RAIZ_APP . '/classes');

// Fun��o para carregar classe
function carregaClasse($classe)
{
    $d = LIB;
    include_once "$d/$classe.class.php";
}
spl_autoload_register('carregaClasse');
