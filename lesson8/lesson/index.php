<?php

require_once "./config.php";
require_once "./mysql.php";
require_once "./init.php";

session_start();

require_once "./route.php";

if (false){
    echo "<pre>";
    var_dump([
        "_POST" => $_POST
        ,json_decode(file_get_contents("php://input"), true)
    ]);
    echo "</pre>";
}