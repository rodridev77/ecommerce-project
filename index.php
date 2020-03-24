<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} elseif (session_status() === PHP_SESSION_DISABLED) {
    echo "Error: Verifique as configurações de sessão";
}

require_once "configs/config.inc.php";
require_once "vendor/autoload.php";

$core = new \app\Core\Core();
$core->run();
