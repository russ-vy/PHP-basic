
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
<?php

    $products = getCart();

    $count = count($products);
    if ($count)
        for ($i = 0; $i < $count; $i++){
            $product = $products[$i];
            $row = $i + 1;
            $path = str_replace('./', '../', $product['full_name']);
            echo "
                <tr>
                    <th scope='row'>$row</th>
                    <td><img class='img' src='$path' alt=''></img></td>
                    <td>{$product['product_name']}</td>
                    <td>{$product['price']}</td>
                    <td>{$product['quantity']}</td>
                    <td><a href='/del-with-cart?id={$product['id']}'>Delete</a></td>
                </tr>
            ";
        }

?>
            </tbody>
        </table>