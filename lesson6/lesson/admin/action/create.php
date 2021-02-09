<?php

if ($_POST){
    $post = checkform($_POST);
    $price = (float) $post['price'];

    $sql = "
        insert into products (product_name, price)
        values ('{$post['productName']}', $price)
    ";
    dbquery($sql);

    $productID = mysqli_insert_id($dblink);
}


if (isset($_FILES['photo']['name']) && !empty($productID)){
    $full_name = uploadfile();

    $sql = "
        insert into images (full_name, id_product)
        values ('$full_name', $productID)
    ";
    dbquery($sql);
}


header("Location: admin");
return;