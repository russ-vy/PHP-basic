<?php

if (empty($_POST)){
    var_dump([
        "_POST is empty"
        ,$_POST
    ]);
    return;
}


$post = //checkform(
//    json_decode($_POST)
    json_decode(
        file_get_contents("php://input")
        , true
//    )
);
extract($post);

$q = "
    update ordered
    set
        phone = '$phone'
        ,address = '$address'
        ,id_status = $id_status
    where id = $id
";
dbquery($q);

echo json_encode(["message" => "Изменения сохранены !"]);
return;
