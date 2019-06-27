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
			<div style="color:red; font-size: 25px; text-align: center;">{{RES}}</div>
			<div class="reviews">
				<h1>{{H1}}</h1>
				{{CONTENT}}

			</div>
			<br><hr>
			<div class="catalog" >

				<h2>{{H2}}</h2>
				<form method="POST" class="submit_form" action="">
					<label>Ваше имя:</label><br>
					<input type="text" name="author" placeholder="Напишите имя" value="{{INP_VAL}}" required><br>
					<label>Ваш отзыв:</label><br>
					<textarea rows="5" name="text" required>{{TEXTAREA}}</textarea><br>
					<input type="submit" value="Отправить">
				</form>

			</div>

		</div>
		<footer><p>{{YEAR}} &copy; Все права защищены</p></footer>
	</div>
</body>
</html>