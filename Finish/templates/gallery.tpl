<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{TITLE}}</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
			</div>

		</div>
		<footer><p>{{YEAR}} &copy; Все права защищены</p></footer>
	</div>
<!-- scripts-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
$('.fancy').fancybox({
	padding: 15,
	helpers: {
		overlay: {
			locked: false
		}
	}
});
</script> -->
</body>
</html>