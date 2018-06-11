<?php
	session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<title>Attention</title>
	<link rel="stylesheet" type="text/css" href="./connexion.css">
</head>
<body  style= "background-image:url(https://memegenerator.net/img/instances/72637737.jpg)">
	<div class="buy-page">
		<div class="buy">
			<form methode="post" action="" class="box">
				<h1>
				Merci de votre achat !<br />
				Rappel :
				</h1>
				<?php
				echo "<br />";
				echo $_SESSION["loggued_on_user"];
				echo "<br />";
				foreach ($_SESSION['panier'] as $elem)
				{
					echo $elem . "<br \>";
				}
				unset($_SESSION['panier']);
				$_SESSION['panier']= array();
				?>
			</form>
			<form method="post" action="./index.php">
				<input class="button" type="submit" name="submit" value="Page d'accueil" style="color:white">
			</form>
		</div>
	</div>
</body>
</html>