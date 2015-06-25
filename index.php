<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	body {
		font-family: Arial, sans-serif;
		padding: 20px;
		margin: 0;
	}
		.news-item {
			border: 1px solid #ccc;
			margin: 20px 20px 20px 0;
			float: left;
			height: 250px;
			width: 250px;
			padding: 10px;
		}
		a {
			color: red;
			display: inline-block;
			margin-bottom: 10px;
		}
		a:hover {
			color: blue;
		}
		img {
			max-width: 100%;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<h3>News List</h3>
	<div class="news-item">
		<a href="">Заголовок новости</a>
		<img src="img/thumb.jpg" alt="">
		<p>Текст</p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>