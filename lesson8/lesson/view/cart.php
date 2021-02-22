
<div class="container">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col" colspan="2">Sum</th>
        </tr>
        </thead>
        <tbody>
<?php

    $products = getCart();

    $count = count($products);
    if ($count){
        $sum = 0;
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
                    <td>{$product['sum']}</td>
                    <td><a href='/del-with-cart?id={$product['id']}'>Delete</a></td>
                </tr>
            ";
            $sum += $product['sum'];
        }
        echo "
            <tr>
                <th scope='row'></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>$sum</td>
                <td></td>
            </tr>
        ";
    }

?>
        </tbody>
    </table>

    <details open>
        <summary>Make the order</summary>

        <form class="row order" action="/order-buy" method="post">
            <div class="col-md-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
            </div>
            <div class="col-md-6">
                <label for="fio" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fio" placeholder="Ivan Sovetov" name="fio">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="8 (123) 111-22-33" name="phone">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
            </div>
            <div class="col-12 order__buy">
                <button type="submit" class="btn btn-primary">Buy</button>
            </div>
        </form>

    </details>

</div>