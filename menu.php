
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
        <!-- <meta name="theme-color" content="#FF6138"> -->
        <meta name="keywords" content="web, webdesign, développeur, informatique, graphisme, Nevers, acces code school, Projet, Alexa, Vermenot" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style1.css" />
<title>Alexa Vermenot - Menu</title>
	</head>
	<body>
    <div class="loader"></div>
		<div class="container">
			<div id="bl-main" class="bl-main">
				<!-- page a propos -->
				<section class="propos">
					<div class="bl-box">
						<a class="link" href="apropos.php"><h2>A propos</h2></a>
            <img src="img/ete.jpg">
					</div>
				</section>
				<!-- projet -->
				<section class="projet" id="bl-work-section">
				<!-- <section class="projet"> -->
					<div class="bl-box">
						<a class="link" href="projets.php"><h2>Projets</h2></a>
            <img src="img/printemp.jpg">
					</div>
				</section>
				<!-- page article -->
				<section class="article">
					<div class="bl-box">
						<a class="link" href="articles.php"><h2>Articles</h2></a>
            <img src="img/automne.jpg">
					</div>
				</section>
				<!-- page contact -->
				<section class="contact">
					<div class="bl-box">
						<a class="link" href="contact.php"><h2>Contact</h2></a>
            <img src="img/hiver.jpg">
					</div>
				</section>
			</div>
		</div>
		<?php
		include "footeradmin.php";
		?>
