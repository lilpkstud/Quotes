<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quotes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
	<div class = "container-fluid">
		<?php //var_dump($this->session->userdata); ?>
		<ul class = "nav nav-pills nav-justified">
			<li role = "presentation" class = "active"> <a href="/dashboard"> Dashboard </a> </li>
			<li role = "presentation"> <a href="/logout"> Logout </a> </li>
		</ul>

		<h1> Welcome, <?= $this->session->userdata['name']?> </h1>
		
		<div class = "row">
			<div class = "col-md-5">
				<h3> Quotable Quotes </h3>
				<?php foreach($get_quote as $quote_info) { ?>
					<blockquote>
						<p> <strong> <?= $quote_info['quoter']?> </strong>: " <?= $quote_info['message']?>" </p> 
						<div class = "row">
							<div class = "col-md-4">
								<footer>
									Created By: <strong> <?= $quote_info['name']?> </strong>
								</footer>
							</div>
							<div class = "col-md-3">
								<a href="/add/<?=$quote_info['id']?>"> <button type = "button" class = "btn btn-primary btn-sm"> Add To Favorites </button></a>
							</div>
						</div>
					</blockquote>
				<?php } ?>
			</div>
			<div class = "col-md-4">
				<h3> Your Favorites </h3>
				<?php foreach($get_favorites as $quote_info) { ?>
					<blockquote>
						<p> <strong> <?= $quote_info['quoter']?> </strong>: " <?= $quote_info['message']?>" </p> 
						<div class = "row">
							<div class = "col-md-5">
								<footer>
									Created By: <strong> <?= $quote_info['name']?> </strong> 
								</footer>
							</div>
							<div class = "col-md-3">
								<a href="/remove/<?=$quote_info['id']?>"> <button type = "button" class = "btn btn-danger btn-sm"> Remove From Favorites </button> </a>
							</div>
					</blockquote>
				<?php } ?>
			</div>
		

		
			<div class = "col-md-3">
				<form action = "quotes/create_quote" method = "post">
					<h3> Contribute A Quote </h3>
					<p> Quoted By:
						<input type = "text" name = "quoter">
					</p>
					<p>
						Message:
						<input type = "text" name = "message">
					</p>
					<input type = "submit" value = "Submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>