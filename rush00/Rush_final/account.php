<?php
	session_start();
if ($_SESSION["loggued_on_user"] === "" || !($_SESSION["loggued_on_user"]))
{
	header("Location: ./login.html");
}
else
{
	?>
	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="menu.css">
		<title>Connexion</title>
	</head>
	<body style="text-align: center">
		<div class='account')>
		<div class='account-accueil'>
		<form method="post" action="create.php">
			<?php
			if (!(file_exists("./private"))) {
				mkdir("./private");
			}
			if (!(file_exists("./private/passwd"))) {
				$fd = fopen("./private/passwd", 'w+');
			}
			$pass = unserialize(file_get_contents("./private/passwd"));
			if ($pass) {
				foreach ($pass as $key => $elem)
				{
					if ($elem["login"] === $_SESSION["loggued_on_user"])
						$i = $key;
				}
			}
			echo "BONJOUR : ".$_SESSION["loggued_on_user"]."<BR /><h3>Voici vos informations : </h3>";
			echo "Nom : ".$pass[$i]["nom"]."<BR/>";
			echo "Prenom : ".$pass[$i]["prenom"]."<BR/>";
			echo "Adresse : ".$pass[$i]["address"]."<BR/>";
			?>
		<center>
		</form>
		<form method="post" action="./deleteok.php">
			<input class="button" type="submit" name="submit_delete" value="Supprimer le compte">
		</form>
		<form method="post" action="./index.php">
			<input class="button" type="submit" name="submit" value="Page d'accueil">
		</form>
		<form method="post" action="./modifinfo.html">
			<input class="button" type="submit" name="submit" value="Modifier vos informations">
		</form>
	</center>
	</div>
	</div>
	</body>
	</html>
<?php
}
?>