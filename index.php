<?php

use app\Core\Core;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/configs/config.inc.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
} elseif (session_status() === PHP_SESSION_DISABLED) {
    echo "Error: Verifique as configurações de sessão";
}


$core = new Core();
$core->run();
