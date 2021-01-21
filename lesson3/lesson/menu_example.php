<?php
	function menu_wraper(){

		$menu = [
			"Home" => []
			,"Man" => [
				"Women1" => ["Dresses","Tops","Sweaters","Jackets/Coats","Blazers","Denim","Leggings/Pants","Skirts/Shorts","Accessories"]
				,"Women2" => ["Dresses","Tops","Sweaters","Jackets/Coats"]
				,"Women3" => ["Dresses","Tops","Sweaters"]
				,"Women4" => ["Dresses","Tops","Sweaters","Jackets/Coats"]
			]
			,"Women" => []
			,"Kids" => []
			,"Accoseriese" => []
			,"Featured" => []
			,"Hot Deals" => []
		];

		function wrap_main($menu){
			$list = '';

			foreach ($menu as $caption => $drop){
				$list .=
				'<li class="menu__list">
				<a href="#" class="menu__link">' . $caption . '</a>
				' . ( count($drop) > 0 ? '<div class="drop">' . wrap_popup($drop) . '</div>' : '' ) . '
				</li>';
			}

				return $list;
		}

		function wrap_popup($popup){
			$list = '';

			foreach ($popup as $caption => $items){
				$list .=
				'<div class="drop__col">
						<h3 class="drop__h3">' . $caption . '</h3>
						<ul class="drop__ul">
						'	.	implode('', array_map('wrap_popup_item',$items)) . '
						</ul>
				</div>';
			}

			return $list;
		}

		function wrap_popup_item($caption){
			return '<li><a href="#" class="drop__link">' . $caption . '</a></li>';
		}

		return wrap_main($menu);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Example menu</title>
	<link rel="stylesheet" href="./style.css">
</head>
<body>

	<nav class="nav center">
			<div class="nav__height">
					<ul class="menu">

<?php			echo menu_wraper();		?>

					</ul>
			</div>
	</nav>

</body>
</html>
