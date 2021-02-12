<?php

if (!isset($_POST)){
    header("Location: cart");
    return;
}


$post = checkform($_POST);
$IDuser = getUserID();

if (!$IDuser){
    // TODO: необходима предварительная проверка на наличие пользователя с такой почтой
    // почта является логином и должна быть уникальна
    $q = "
        insert into user
        set login = '{$post['email']}'
    ";
    dbquery($q);
    // TODO: ссылка для ввода пароля пользователем должна направляется на указанную почту
    $IDuser = mysqli_insert_id($dblink);
}
$q = "
    insert into ordered (fio, phone, address, id_user)
    values ('{$post['fio']}', '{$post['phone']}', '{$post['address']}', $IDuser)
";
dbquery($q);

$IDorder = mysqli_insert_id($dblink);

$q = "
    insert into order_item (id_ordered, id_product, price, quantity)
    select
        $IDorder
        ,c.id_product
        ,p.price
        ,c.quantity
    from
        cart            c
        join products   p on p.id = c.id_product
    where c.id_user = '$IDuser'
";
dbquery($q);

// очищаем корзину
$q = "
    delete from cart
    where id_user = '$IDuser'
";
dbquery($q);

// TODO: сделать вывод сообщения
//alertMessage("Заказ принят! Номер Вашего заказа XXX-XXXX");

header("Location: catalog");
return;