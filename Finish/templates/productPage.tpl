<div>
	<h1>{{NAME}}</h1>
	<div><img src="{{IMAGE}}" alt="img"></div>
	<div>
		Цена: {{PRICE}}<br><br>
		Категория: {{CATEGORYID}}
	</div>
	<div>
		<h3>Описание:</h3>
		{{DESCRIPTION}}
	</div>
	<div><br><a style="cursor:pointer; color:red;" onclick="addToCart({{ID}})">Добавить в корзину</a></div>
	<div class="back"><a href="/products.php">Назад</a></div>
</div>
