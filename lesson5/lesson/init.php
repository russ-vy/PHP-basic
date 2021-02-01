<?php

function uploadfile(){
	extract($_FILES['photo']);

	if ($error != UPLOAD_ERR_OK)
		return;
//	    die("Ошибка: $error");

	$full_name = IMAGES_DIR . basename($name);
	move_uploaded_file($tmp_name, $full_name);

	$sql = "insert into images (full_name, views) values ('$full_name', 0)";
	dbquery($sql);
}


function getImages(){
	$images = dbquery("select * from `images` order by `views`");

	foreach ($images as $img) {
		echo "
			<a class='image col-3 gy-4' href='?id={$img['id']}'>
                <img id='{$img['id']}' src='{$img['full_name']}' alt=''>
			</a>
		";
	}
}
