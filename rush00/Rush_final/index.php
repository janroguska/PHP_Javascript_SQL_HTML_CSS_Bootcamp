<?php
session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<title>Pokeshop</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="all-page">
		<header>
			<div class="wrapper-form-header">
				<?php
				if ($_SESSION["loggued_on_user"] === "" || !($_SESSION["loggued_on_user"]))
				{
					?>
				<form class="Panier" method="post" action="./user_create.html">
					<input class="back-end-header" type="submit" name="submit" value="S'inscrire">
				</form>
					<form class="back-end" method="post" action="login.html">
						<input class="back-end-header" type="submit" name="submit" value="Se Connecter">
					</form>
					<?
				}
				else
				{
					?>
					<form class="Panier" method="post" action="./account.php">
						<input class="back-end-header" type="submit" name="submit" value="Mon compte">
					</form>
					<?php
				}
				?>
				<form class="panier" method="post" action="logout.php">
					<input class="back-end-header" type="submit" name="submit" value="Se deconnecter">
				</form>
				<form class="Panier" method="post" action="./panier.php">
					<input class="back-end-header" type="submit" name="submit" value="Panier">
				</form>
				<form class="Panier" method="post" action="./admin.html">
					<input class="back-end-header" type="submit" name="submit" value="Admin">
				</form>
			</div>
		</header>
		<div class="header-2">
<div class="wrapper-navigation-bar">
	<ul class="navigation-bar">
		<li class="category"><a href="index.php">All</a></li>
		<li class="category"><a href="index.php?name=Grass">Grass</a></li>
		<li class="category"><a href="index.php?name=Fire">Fire</a></li>
		<li class="category"><a href="index.php?name=Water">Water</a></li>
		<li class="category"><a href="index.php?name=Normal">Normal</a></li>
	</ul>
</div>
</div>
<div class="site-name">
	<center><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/International_Pok%C3%A9mon_logo.svg/1200px-International_Pok%C3%A9mon_logo.svg.png" width="50%"/></center>
</div>
<img class="img-header" src="http://sm.ign.com/ign_fr/feature/p/pokemon-le/pokemon-lets-go-pikachu-and-lets-go-eevee-confirmed-for-nint_9dhr.jpg"/>
<table>
	<tr>
		<?php include"article.php"; ?>
	</tr>
</table>
<div class="bottom-page">Copyright © jroguszk/kenguyen - All Rights Reserved.</div>
</div>
</body>
</html>