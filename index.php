
<?php include('ajax/ajax.php') ?>
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
<div class="news-list">
		<h3>News List</h3>
		<?php foreach ($news as $key => $value) { ?>
			
		<div class="news-item">
			<a href="/news/<?= $value['id'] ?>" data-id="<?= $value['id'] ?>">
				<span><?= $value['title'] ?></span>
				<img src="<?= $value['image'] ?>" alt="">
			</a>
			<p><?= substr($value['text'], 0, 30) ?>...</p>
		</div>


	<?php } ?>
</div>
<div class="news-full"></div>

<script id="news-view-template" type="text/x-handlebars-template">
  
			<h1>{{title}}</h1>
			<img src="{{image}}" alt="">
		<p>{{text}}</p>
</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/handlebars-v3.0.3.js"></script>
	<script src="/js/main.js"></script>
</body>
</html>