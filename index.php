<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projeto Ecommerce</title>
    </head>
    <body>
        <?php
        echo "<h1>Hello World!<h1>";
        ?>
    </body>
</html>
>>>>>>> 9e190b5c25fb7917524d4675305ef98ca649cb05
