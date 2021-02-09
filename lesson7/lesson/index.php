<?php

require_once "./config.php";
require_once "./mysql.php";
require_once "./init.php";

session_start();

require_once "./route.php";

if (false){
    echo "<pre>";
    var_dump([
        "INDEX"
        ,"AUTH" => isset($_SESSION['userID'])
        ,"_SESSION" => $_SESSION
        ,session_id()
        ,"_POST" => $_POST
        ,$uri
    ]);
    echo "</pre>";
}