
    <div class='container'>
        <div class='gallery row'>
    
<?php

    $products = getProducts();

    foreach ($products as $product)
        echo "
            <div class='col-3'>
                <div class='card'>
                  <a href='/product?id={$product['id']}' class='card__link'>
                    <img src='{$product['full_name']}' class='card-img-top center' alt=''>                  
                  </a>
                  <div class='card-body'>
                    <h5 class='card-title'>{$product['product_name']}</h5>
                    <p class='card-text'>{$product['price']}</p>
                    <a href='/add-to-cart?id={$product['id']}' class='btn btn-primary'>В корзину</a>
                  </div>
                </div>
            </div>
    ";

?>
    
        </div>
    </div>
