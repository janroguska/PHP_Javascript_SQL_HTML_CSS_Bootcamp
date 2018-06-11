<?PHP

include 'auth.php';
include 'user_create.php';

session_start();
if ((check_user($_SESSION['loggued_on_user'])) == FALSE)
	header('location: ./admin.html');
if ($_POST['submit'] == "OK")
	add_user($_POST['login'], $_POST['passwd'], $_POST['submit']);
if ($_POST['admin_submit'] == "OK")
	add_admin($_POST['admin_login'], $_POST['admin_passwd'], $_POST['admin_submit']);
if ($_POST['delete_button'] == "OK")
{
		if (file_exists("private/passwd"))
		{
			$data = unserialize(file_get_contents('private/passwd'));
			$login = $_POST['delete'];
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
}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<title>Pokeshop</title>
	<meta charset="utf-8">
</head>
<body>
	<header>
		<div class="site-name">
	<center><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/International_Pok%C3%A9mon_logo.svg/1200px-International_Pok%C3%A9mon_logo.svg.png" width="50%"/></center>
		</div>
	</header>
	<div class="admin-form">
		<center>
			<label><b>Add User</b></label>
		<br />
		<form action = "modify_users.php" method = "post">
			<label>User</label>
		<br />
		<input type ="text" name="login" />
		<br />
		<label>Password</label>
		<br />
		<input type="password" name="passwd" />
		<br />
		<input class="login-button" type="submit" name="submit" value="OK" />
		<br /></form>
		<form action = "modify_users.php" method = "post">
		<label><b>Add Admin</b></label>
		<br />
			<label>User</label>
		<br />
		<input type ="text" name="admin_login" />
		<br />
		<label>Password</label>
		<br />
		<input type="password" name="admin_passwd" />
		<br />
		<input class="login-button" type="submit" name="admin_submit" value="OK" />
		<br /></form>
			<label><b>Delete User</b></label>
		<br />
		<form action = "modify_users.php" method = "post">
			<label>User</label>
		<br />
		<input type ="text" name="delete" />
		<br />
		<input class="login-button" type="submit" name="delete_button" value="OK" />
	</form>
		<form methode="post" action="./admin.php" class="box">
		<h1>
			<input class="button" type="submit" value="Retour" style="color:white"/>
		</h1>
		</form>
	</center>
</div>
</body></html>