<?php

require_once "./config.php";
require_once "./mysql.php";
require_once "./init.php";

$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER["REQUEST_URI"];

require_once "./route.php";


/*
echo "<pre>";
var_dump([
    $host
    ,$_SERVER["REQUEST_URI"]
    ,$uri
    ,$fileName
    ,stripos($uri, '/delete')
]);
echo "</pre>";
*/