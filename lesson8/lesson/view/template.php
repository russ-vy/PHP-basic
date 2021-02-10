<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 8</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php $host ?>/css/style.css">
</head>
<body>

<?php
    if (isset($_SESSION['userID'])){
?>

    <div class="menu">
        <ul class="dropdown-menu">

<?php
    foreach (MENU as $item){
        if (!isset($item['is_admin']) || ($item['is_admin'] && $_SESSION['isAdmin']))
            echo "<li><a class='dropdown-item' href='{$item['link']}'>{$item['title']}</a></li>";
    }
?>

        </ul>
    </div>

<?php
    }
?>

<?php
    include $fileName;
?>

</body>
</html>