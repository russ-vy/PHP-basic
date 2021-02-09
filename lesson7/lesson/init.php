<?php

function uploadfile(){
	extract($_FILES['photo']);

	if ($error != UPLOAD_ERR_OK)
		return die("Ошибка: $error");

	$full_name = IMAGES_DIR . basename($name);
	move_uploaded_file($tmp_name, $full_name);

    return $full_name;
}

function checkform($arr){
    foreach ($arr as $key => $val){
        if (is_array($val) || is_object($val))
            $arr[$key] = checkform($val);
        elseif (is_string($val))
            $arr[$key] = strip_tags($val);
    }

    return $arr;
}

function getProducts(){
    $q = "
    select
        p.id
        ,p.product_name
        ,p.price
        ,im.full_name
    from
        products            p
        left join images    im  on  im.id_product = p.id
    order by
        im.views desc
        ,id
";
    return dbquery($q);
}

function getProduct($id){
    $q = "
    select
        p.id
        ,p.product_name
        ,p.price
        ,im.full_name
    from
        products            p
        left join images    im  on  im.id_product = p.id
    where p.id = $id
";
    return dbquery($q)[0];
}

function getCart(){
    $IDuser = getUserID();

    $q = "
    select
        p.id
        ,p.product_name
        ,p.price
        ,c.quantity
        ,im.full_name
        ,(p.price * c.quantity)     'sum'
        ,c.add_time
    from
        cart                c
        join products       p   on  p.id = c.id_product
        left join images    im  on  im.id_product = p.id
    where c.id_user = '$IDuser'
    order by add_time
";
    return dbquery($q);
}

function getUserID(){
    if (empty($_SESSION['userID']))
        return session_id();
    else
        return $_SESSION['userID'];
}

function auth(){
    if (!isset($_SESSION['userID']) && isset($_POST['login']) && isset($_POST['passwd'])){
        extract( checkform($_POST) );

        $user = dbquery("select id, passwd, id_role from user where login = '$login'");

        // если найдена запись в базе
        if (count($user)){
            $hash = $user[0]['passwd'];

            if(password_verify($passwd, $hash)){
                $_SESSION['userID'] = $user[0]['id'];
                $_SESSION['isAdmin'] = ($user[0]['id_role'] == 1);
                return true;
            }
        }
        // если новый пользователь решил зарегистрироваться
        elseif (isset($_POST['register'])){
            $passwd = password_hash($passwd, PASSWORD_BCRYPT);
            $q = "
                insert into user
                set
                    login = '$login'
                    ,passwd = '$passwd'
                    ,id_role = 2
            ";
            dbquery($q);
            return true;
        }
    }

    return false;
}