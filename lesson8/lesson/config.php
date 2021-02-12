<?php

$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER["REQUEST_URI"];

//const DBLOG = __DIR__ . "/logs/dbquery.log";

const IMAGES_DIR = "./img/";
const ROOT = __DIR__;

const DB = [
	"host" => "127.0.0.1"
	,"user" => "root"
	,"passwd" => "root"
	,"name" => "test"
];
