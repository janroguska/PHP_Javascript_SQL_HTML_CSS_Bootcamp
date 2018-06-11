<?PHP

session_start();
if ($_POST['submit_delete'] == "Supprimer le compte")
{
		if (file_exists("private/passwd"))
		{
			$data = unserialize(file_get_contents('private/passwd'));
			$login = $_SESSION["loggued_on_user"];
			if ($data)
			{
				foreach ($data as $key => $elem)
				{
					if ($elem['login'] === $login)
						array_splice($data, $key, 1);
				}
			file_put_contents('private/passwd', serialize($data));
			}
		}
	$_SESSION['loggued_on_user'] = "";
	header("Location: ./index.php");
}

?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Attention</title>
	<link rel="stylesheet" type="text/css" href="./connexion.css">
</head>
<body  style= "background-image:url(http://sm.ign.com/ign_fr/feature/p/pokemon-le/pokemon-lets-go-pikachu-and-lets-go-eevee-confirmed-for-nint_9dhr.jpg)">
	<form methode="post" action="./index.php" class="box">
	<h1>
		Account Deleted
		<input class="button" type="submit" value="Retour" style="color:red"/>
	</h1>
	</form>
</body>
</html>