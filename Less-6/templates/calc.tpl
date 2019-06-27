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
			<h1>{{H1}}</h1>
			<div class="catalog" >
				<h2>{{H2}}</h2>
				<form method="POST" class="submit_form" action="">
					<label>Введите данные:</label><br>
					<input type="number" name="arg1" required><br>
					<label>Выберите операцию:</label><br>
					<select name="operation">
						<option value = "+">+</option>
						<option value = "-">-</option>
						<option value = "*">*</option>
						<option value = "/">/</option>
					</select><br>
					<label>Введите данные:</label><br>
					<input type="number" name="arg2" required><br>
					<input type="submit" value="Рассчитать">
				</form>
				<br><hr><br>
				<div>Результат: <span style="color:red; font-size: 25px; text-align: center;">{{CONTENT}}</span></div>
				<br><hr>
				<h2>{{H3}}</h2>
				<form method="POST" class="submit_form" action="">
					<label>Введите данные:</label><br>
					<input type="number" name="arg1" required><br>
					<label>Введите данные:</label><br>
					<input type="number" name="arg2" required><br>
					<label>Выберите операцию:</label><br>
					<input type="submit" name="operation" value="+">
					<input type="submit" name="operation" value="-">
					<input type="submit" name="operation" value="*">
					<input type="submit" name="operation" value="/">
				</form>


			</div>

		</div>
		<footer><p>{{YEAR}} &copy; Все права защищены</p></footer>
	</div>
</body>
</html>