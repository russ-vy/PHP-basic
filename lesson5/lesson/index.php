<?php
//1+2. Создать галерею изображений, состоящую из двух страниц:
//страница просмотра всех фотографий (уменьшенных копий), иными словами каталог-галерея; сам список изображений больше не брать через scandir и брать список из базы данных.
//страница просмотра конкретной фотографии (изображение оригинального размера) по ее ID в базе данных (GET-параметр)
//В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, имя-подпись к картинке). При загрузке нового изображения через форму загрузки (из прошлого домашнего задания) - сохранять файл нового изображения в папку на сервере и сохранять данные про изображение в базу данных.
//3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
//4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность = число просмотров фотографии.

require_once "./config.php";
require_once "./mysql.php";
require_once "./init.php";

// загрузка файлов
if ($_FILES) uploadfile();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/main.js"></script>
</head>
<body>

<?php
        if (isset($_GET['id'])){
            require_once "./view/single.php";
        }
        else
            require_once "./view/gallery.php";
?>

</body>
</html>
