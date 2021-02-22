<?php

if (empty($_GET['id'])){
    header("Location: cart");
    return;
}


$IDuser = getUserID();
$IDproduct = $_GET['id'];

$q = "
    delete from cart
    where
        id_user = '$IDuser'
        and id_product = $IDproduct
";
dbquery($q);


header("Location: cart");
return;