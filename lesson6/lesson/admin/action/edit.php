<?php

if($_POST){
    $post = checkform($_POST);
    $price = (float) $post['price'];
    $productID = (int) $post['id'];

    $sql = "
        update products
        set
            product_name = '{$post['productName']}'
            ,price = $price
        where id = $productID
    ";
    dbquery($sql);

    if (!empty($_FILES['photo']['name']) && !empty($productID)){
        $images = dbquery("select id, full_name from images where id_product = $productID");
        foreach ($images as $img){
            $file = str_replace('./', ROOT.'/', $img['full_name']);

            unlink($file);

            if (!file_exists($file))
                dbquery("delete from images where id = {$img['id']}");
        }

        $full_name = uploadfile();

        $sql = "
            insert into images (full_name, id_product)
            values ('$full_name', $productID)
        ";
        dbquery($sql);
    }

    header("Location: admin");
    return;
}


if (empty($_GET['id'])){
    header("Location: admin");
    return;
}


$id = (int)$_GET['id'];

$product = getProduct($id);
$path = str_replace('./', '../../', $product['full_name']);

echo "
    <div class='container'>

        <h5 class='center'>Edit product</h5>
        <form class='form-file' action='/edit' enctype='multipart/form-data' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='file' name='photo' accept='image/*,image/jpeg' class='form-file-input' id='customFile'>
            <label class='form-file-label' for='customFile'>
                <span class='form-file-text'>" . (empty($product['full_name']) ? "Choose file image..." : $product['full_name']) . "</span>
                <span class='form-file-button'>Browse</span>
            </label>
            <input type='text' class='form-control' placeholder='Title' name='productName' aria-label='Product name' value='{$product['product_name']}'>
            <div class='input-group'>
                <input type='text' class='form-control' placeholder='Price' name='price' aria-label_='Product price' value='{$product['price']}'>
                <span class='input-group-text'>$</span>
            </div>
            <button class='form-file-button send' type='submit' data-onclick='fileUpload()'>Update</button>
        </form>

        <img class='img-70vh center' src='$path' alt='' />

    </div>
";
