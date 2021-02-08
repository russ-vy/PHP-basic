<?php

function is_route($s){
    global $uri;

    if (stripos($uri, $s) !== false)
        return true;
    else
        return false;
}


if ($uri == '/') {
    header("Location: catalog");
}
elseif (is_route('/catalog')) {
    $fileName = './view/catalog.php';
}
elseif (is_route('/product')) {
    $fileName = './view/product.php';
}
elseif (is_route('/admin')) {
    $fileName = './admin/admin.php';
}
elseif (is_route('/create')) {
    $fileName = './admin/action/create.php';
}
elseif (is_route('/edit')) {
    $fileName = './admin/action/edit.php';
}
elseif (is_route('/delete')) {
    $fileName = './admin/action/delete.php';
}
elseif (is_route('/cart')) {
    $fileName = './view/cart.php';
}
elseif (is_route('/del-with-cart')) {
    $fileName = './view/action/del-with-cart.php';
}
elseif (is_route('/add-to-cart')) {
    $fileName = './view/action/add-to-cart.php';
}
else {
    $fileName = "./view/404.php";
}


if (file_exists($fileName)){
    include "./view/template.php";
}
else
    echo "File $fileName is not exists";