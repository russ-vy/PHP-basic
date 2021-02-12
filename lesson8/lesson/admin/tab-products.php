
<div id="products" style="display: none">

    <h5 class="center">Add new product</h5>
    <form class='form-file' action="/create" enctype='multipart/form-data' method='POST'>
        <input type='file' name='photo' accept='image/*,image/jpeg' class='form-file-input' id='customFile'>
        <label class='form-file-label' for='customFile'>
            <span class='form-file-text'>Choose file image...</span>
            <span class='form-file-button'>Browse</span>
        </label>
        <input type="text" class="form-control" placeholder="Title" name="productName" aria-label="Product name">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Price" name="price" aria-label_="Product price">
            <span class="input-group-text">$</span>
        </div>
        <button class='form-file-button send' type='submit' data-onclick='fileUpload()'>Send</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $products = getProducts();

        $count = count($products);
        if ($count)
            for ($i = 0; $i < $count; $i++){
                $product = $products[$i];
                $row = $i + 1;
                $path = str_replace('./', '../', $product['full_name']);
                echo "
                <tr>
                    <th scope='row'>{$product['id']}</th>
                    <td><img class='img' src='$path' alt=''></img></td>
                    <td>{$product['product_name']}</td>
                    <td>{$product['price']}</td>
                    <td><a href='/delete?id={$product['id']}'>Delete</a></td>
                    <td><a href='/edit?id={$product['id']}'>Edit</a></td>
                </tr>
            ";
            }

        ?>
        </tbody>
    </table>

</div>