<?php

require_once "environment.php";

// CONFIGURAÇÃO DO AMBIENTE #####################
if (ENVIRONMENT == "development") {
    define("BASE_URL", "http://localhost/project_commerce/");
} else {
    define("BASE_URL", "http://meusite.com.br/");
}

// CONFIGURAÇÃO DO BANDO DE DADOS #####################
define('HOST', 'localhost');
define('DBNAME', 'ecommerce');
define('USER', 'root');
define('PASS', '123');
define('DRIVER', 'mysql');
define('CHARSET', 'utf8');
