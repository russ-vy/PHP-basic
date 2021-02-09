<?php

//создать cookie
setcookie("username", "Kostya", time() + 3600*24*7);

//массив содержит cookie на момент загрузки страницы
echo $_COOKIE["username"];

//удалить cookie - указать любое отрицательное время
//setcookie("username", "Kostya", time() - 3600);


session_start();
echo session_id();
$_SESSION['login'] = "login";

echo md5("password");

$hash = password_hash($password, PASSWORD_BCRYPT);
echo $hash;

if(password_verify($password, $hash)){
    echo "пароль правильный";
}