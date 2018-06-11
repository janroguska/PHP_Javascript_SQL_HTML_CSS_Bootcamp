<?PHP

include 'auth.php';

session_start();
if ((check_user($_SESSION['loggued_on_user'])) == FALSE)
	header('location: ./admin.html');

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<title>Pokeshop</title>
	<meta charset="utf-8">
</head>
<body>
	<header class="admin-header">
		<div class="site-name">
	<center><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/International_Pok%C3%A9mon_logo.svg/1200px-International_Pok%C3%A9mon_logo.svg.png" width="50%"/></center>
	</div>
	</header>
		<div class="admin-form">
		<form method="post" action="./modify_items.php">
			<input class="login-button" type="submit" name="moditem" value="MODIFY ITEMS" />
		</form>
		<br />
		<form method="post" action="./modify_users.php">
			<input class="login-button" type="submit" name="moduser" value="MODIFY USERS" />
		</form>
		<form methode="post" action="./index.php" class="box">
		<h1>
			<input class="button" type="submit" value="Retour" style="color:white"/>
		</h1>
		</form>
	</div>
</body></html>