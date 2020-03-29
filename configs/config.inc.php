<?php

require_once "environment.php";

// CONFIGURAÇÃO DO AMBIENTE #####################
if (ENVIRONMENT == "development") {
    define("BASE_URL", "http://localhost/projeto_ecommerce/");
} else {
    define("BASE_URL", "http://meusite.com.br/");
}

// CONFIGURAÇÃO DO BANDO DE DADOS #####################
define('HOST', 'localhost');
define('DBNAME', 'mydb');
define('USER', 'root');
define('PASS', '');
define('DRIVER', 'mysql');
define('CHARSET', 'utf8');
