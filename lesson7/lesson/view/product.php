<?php

if (empty($_GET['id'])){
    header("Location: 404");
    return;
}

$id = (int)$_GET['id'];

$product = getProduct($id);

echo "
    <div class='card'>
      <img src='{$product['full_name']}' class='card-img-top' alt=''>
      <div class='card-body'>
        <h5 class='card-title'>{$product['product_name']}</h5>
        <p class='card-text'>{$product['price']}</p>
        <a href='$host/product?id={$product['id']}' class='btn btn-primary'>В корзину</a>
      </div>
    </div>
";