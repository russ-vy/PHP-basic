<?php

if (empty($_GET['id'])){
    header("Location: catalog");
    return;
}


$IDuser = getUserID();
$IDproduct = $_GET['id'];

$q = "
    select id
    from cart
    where
        id_user = '$IDuser'
        and id_product = $IDproduct
";
$id = dbquery($q)[0]['id'];

if($id)
    $q = "
        update cart
        set quantity = (quantity + 1)
        where id = $id
    ";
else
    $q = "
        insert into cart (id_user, id_product, quantity)
        values ('$IDuser', $IDproduct, 1)
    ";

dbquery($q);


header("Location: catalog");
return;