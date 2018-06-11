<?php
	session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<title>Panier</title>
</head>
<body  style="text-align: center">
	<div class="panier-page">
	<div class="paniercontent">
	<div class="all-items-panier">
	<?php
	if (count($_SESSION['panier']))
	{
		foreach ($_SESSION['panier'] as $elem)
		{
			echo "$elem<br />";
		}
	}
	else
	{
		echo "Votre panier est vide<br /><br />";
	}
	?>
	</div>
	<form method="post" action="./clear.php">
		<input class="button" type="submit" name="submit" value="Vider Panier">
	</form>
 	<form method="post" action="./index.php">
		<input class="button" type="submit" name="submit" value="Page d'accueil">
	</form>
	<?php
	if ($_SESSION["loggued_on_user"] === "" || !($_SESSION["loggued_on_user"]))
	{
		echo "<form method=\"post\" action=\"./login.html\"><input type=\"submit\" name=\"submit\" value=\"Connexion\"></form>";
	}
	else if ((count($_SESSION['panier'])))
	{
		echo "<form method=\"post\" action=\"./buy.php\"><input type=\"submit\" name=\"submit\" value=\"Valider\"></form>";
	}
	?>
</div>
</div>
</body>
</html>
