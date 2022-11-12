<?php
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $connect = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], "", $_ENV['DB_NAME']);
?>