<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{TITLE}}</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<div class="container">

		<header>
			<a class="logo" href="/"><img src="img/logo.jpg" alt="BrandShop"></a>
			<nav>
				{{MENU}}
			</nav>
		</header>

		<div class="content">

			<div class="catalog" >

					<h1>{{H1}}</h1>

					<div class="sliders">
							{{CONTENT}}
					</div>
					<div class="views">
						Количество просмотров: <span>{{VIEWS}}</span>
					</div>
			</div>
			<div class="back"><a href="gallery.php">Назад</a></div>

		</div>
		<footer><p>{{YEAR}} &copy; Все права защищены</p></footer>
	</div>
</body>
</html>