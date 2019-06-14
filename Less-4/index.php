<?php
function gallery($dir){
	$images = scandir($dir);
	echo '<div class="slide">';
	foreach ($images as $image){
		if($image != '.' && $image != '..'){
			echo '<a href="'. $dir . '/' . $image . '" class="fancy" rel="gallery">
					<img src="'. $dir . '/' . $image . '" alt="img">
					<div class="hovered"></div>
				 </a>';
		}
	}
	echo '</div>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Галерея</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
.container {
    width: 960px;
    margin: 0 auto;
    position: relative;
}
.catalog 
{
	padding-bottom: 50px;
	overflow: hidden;
}
.catalog h1 
{
	font-size: 30px;
	line-height: 30px;
	margin-top: 40px;
	margin-bottom: 0px;
	color: #333;
}
.catalog h2
{
	font-size: 24px;
	margin-top: 40px;
	margin-bottom: 20px;
	color: #cc0000;
	font-weight: 400;
	border-top: 1px solid #eee;
	border-bottom: 1px solid #eee;
	background: #fcfcfc;
	text-align: center;
}

.catalog .sliders
{
	padding-bottom: 10px;
	overflow: hidden;
}

.catalog .slide 
{
	margin: 0 auto;
}
.catalog .slide:after 
{
	content: '';
	clear: both;
	display: table;
	width: 100%;
}
.catalog .slide a 
{
	width: 220px;
	height: 150px;
	margin: 8px;
	position: relative;
	display: inline-block;
	overflow: hidden;
	border-radius: 5px;
}
.catalog .slide a img {
    max-width: 100%;
    min-height: 164px;
}
.catalog .slide a .hovered {
	position: absolute;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity= 0 )";
	filter: alpha(opacity = 0 );
	opacity: 0;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	text-align: center;
	display: block;
	color: #fff;
	z-index: 1;
	background: #111 url('images/zoom.png') no-repeat center 55px;
}
.catalog .slide a .hovered:after {
	content: '';
	position: absolute;
}
.catalog .slide a:hover .hovered {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity= 30 )";
	filter: alpha(opacity = .3 );
	opacity: .3;
}
</style>    
</head>
<body>
<div class="wrapper">

	<section id="section3" name="section3" class="catalog" >
		<div class="container">

			<h2>Природа России</h2>

			<div class="sliders">
				
					<?= gallery('images/gallery') ?>
				
			</div>

		</div>
	</section>
	
</div>
<!-- scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
$('.fancy').fancybox({
	padding: 15,
	helpers: {
		overlay: {
			locked: false
		}
	}
});
</script>
</body>
</html>