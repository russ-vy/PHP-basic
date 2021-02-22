<?php

if (empty($_GET['id'])){
    header("Location: admin");
    return;
}


$id = (int)$_GET['id'];

$images = dbquery("select full_name from images where id_product = $id");
foreach ($images as $img){
    $file = str_replace('./', ROOT.'/', $img['full_name']);
    unlink($file);
}


dbquery("delete from images where id_product = $id");

dbquery("delete from products where id = $id");


header("Location: admin");
return;
