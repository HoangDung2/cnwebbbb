<?php

define('ROOTDIR', __DIR__ . DIRECTORY_SEPARATOR);

session_start();

require_once ROOTDIR . 'autoload.php';
require_once ROOTDIR . 'src/helpers.php';

$PDO = (new \Project\CNWeb\PDOFactory())->create([
    'dbhost' => 'localhost',
    'dbname' => 'projectweb1',
    'dbuser' => 'root',
    'dbpass' => ''
]);