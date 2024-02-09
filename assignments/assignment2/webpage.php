
<?php
$cheese = "this is a php block without the ending.";
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>&lt;inject title here&gt;</title>
	<style>
		* {margin: 0; padding: 0;}
		body {font: 120%/1.5 sans-serif;}
		#wrapper {width: 1000px; margin: 0 auto; border: 1px solid black;}
		header {background: green; height: 150px; padding: 20px;}
		header h1 {color: white;}
		main {padding: 10px;}
		main h2 {margin: 15px 0;}
		main p {margin-bottom: 15px;}
		footer {background: #eee; padding: 10px 0; text-align: center}
		footer p {font-size: .8em;}
	</style>
</head>
<body>
	<div id="wrapper">
		<header>
			<h1>My Webpage</h1>
		</header>
		<main>
			<h2>My name is Benjamin Jones</h2>
			<p><?php echo $cheese; ?></p>
			
		</main>
		<footer>
			<p>&lt;inject footer here&gt;</p>
		</footer>
	</div>
	
</body>
</html>