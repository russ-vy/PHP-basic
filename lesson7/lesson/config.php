<?php

$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER["REQUEST_URI"];


const IMAGES_DIR = "./img/";
const ROOT = __DIR__;

const DB = [
	"host" => "127.0.0.1"
	,"user" => "root"
	,"passwd" => ""
	,"name" => "test"
];

const MENU = [
    [
        "title" => "Главная"
        ,"link" => "/"
    ]
    ,[
        "title" => "Администратор"
        ,"link" => "/admin"
    ]
    ,[
        "title" => "Корзина"
        ,"link" => "/cart"
    ]
];