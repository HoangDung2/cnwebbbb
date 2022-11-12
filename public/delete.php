<?php
require_once '../bootstrap.php';

use Project\CNWeb\Film;

$film = new Film($PDO);

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
    && ($film->find($_POST['id'])) !== null
){
    $film->delete();
}

redirect('manage.php');