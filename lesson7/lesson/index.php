<?php

require_once "./config.php";
require_once "./mysql.php";
require_once "./init.php";

session_start();

require_once "./route.php";



echo "<pre>";
var_dump([
    $uri
    ,session_id()
    ,session_id() === 'vf1524k3p6ausagem521qks6da'
    ,"_SESSION" => $_SESSION
    ,empty($_SESSION['userID'])
]);
echo "</pre>";
