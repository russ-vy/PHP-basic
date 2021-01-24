<?php
// 1. Создать галерею фотографий. Она должна состоять из одной страницы, на которой пользователь видит все картинки в уменьшенном виде. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width.
// 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
// 3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать полноразмерное изображение в модальном окне (материал в помощь: https://www.internet-technologies.ru/articles/sozdaem-prostoe-modalnoe-okno-s-pomoschyu-jquery.html)

const IMAGES_DIR = "./img/";

function getImages(){
	$images = scandir(IMAGES_DIR);

	for ($i = 2; $i < count($images); $i++){
			$img = IMAGES_DIR . $images[$i];
			echo "
							<div class=\"col\">
									<img src=\"$img\" alt=\"\">
							</div>
					";
	}  
}
?>

<!doctype html>
<html lang="ru">
<head>
		<meta charset="UTF-8">
		<meta name="viewport"
					content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Lesson 4 - files</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
		<style>
				.row{
						padding: 20px 0;
				}
				.col{
						display: flex;
				}
				img{
						object-fit: cover;
						height: 100%;
				}
				.row img{
						width: 240px;
						cursor: pointer;
				}
				.modal-body{
						display: flex;
						justify-content: center;
				}
		</style>
</head>
<body>

		<div class="container">
				<div class="row">
<?php
						getImages();
?>
				</div>
		</div>

		<div class="modal" tabindex="-1">
				<div class="modal-dialog modal-fullscreen">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title"></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">

								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
						</div>
				</div>
		</div>

		<script>
				document.addEventListener('DOMContentLoaded',()=>{
						let row = document.querySelector(".row")
						row.addEventListener("click", (event)=>{
								console.log(event.target.tagName)
								if(event.target.tagName != 'IMG') return;
								document.querySelector('.modal-body').innerHTML = '<img src="'+ event.target.getAttribute('src') +'" alt="">'
								let modal = new bootstrap.Modal(document.querySelector('.modal'), {keyboard: true})
								modal.show()
						})
				})
		</script>
</body>
</html>
