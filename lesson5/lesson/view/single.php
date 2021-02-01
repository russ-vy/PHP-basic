<?php

dbquery("update `images` set `views`=(`views`+1) where `id` = {$_GET['id']}");

$images = dbquery("select * from `images` where `id` = {$_GET['id']}");

foreach ($images as $img) {
    echo "
			<div class='container'>
                <img class='single' id='{$img['id']}' src='{$img['full_name']}' alt=''>
                <h1>Просмотров: {$img['views']}</h1>
			</div>
		";
}
