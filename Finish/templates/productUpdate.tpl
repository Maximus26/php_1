<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{TITLE}}</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<body>
	<div class="container">

		<header>
			<a class="logo" href="/"><img src="/img/logo.jpg" alt="BrandShop"></a>
			<nav>
				{{MENU}}
			</nav>
		</header>

		<div class="content">
			<div style="color:red; font-size: 25px; text-align: center;">{{RES}}</div>
			<div class="reviews">
				<h1>{{H1}}</h1>

			</div>
			<br><hr>
			<div class="catalog" >
				<form enctype="multipart/form-data" method="POST" class="submit_form" action="">
					<label>Название товара:</label><br>
					<input type="text" name="name" value="{{NAME}}"><br>
					<label>Описание:</label><br>
					<textarea rows="5" name="description">{{DESCRIPTION}}</textarea><br>
					<label>Цена товара:</label><br>
					<input type="number" name="price" value="{{PRICE}}"><br>
					<label>Загрузить картинку для товара:</label><br>
					<input name="image" type="file"><br>
					<input type="submit" value="Создать">
				</form>

			</div>
			<div class="back"><a href="/admin/products/">Назад</a></div>

		</div>
		<footer><p>{{YEAR}} &copy; Все права защищены</p></footer>
	</div>
</body>
</html>