<?PHP

session_start();
$array = $_GET;
foreach ($array as $key => $elem)
{
	if ($key == "login")
		$user = $elem;
	if ($key == "passwd")
		$passwd = $elem;
	if ($key == "submit")
		$submit = $elem;
}
if ($user && $passwd && $submit == "OK")
{
	$_SESSION["user"] = $user;
	$_SESSION["passwd"] = $passwd;
}

?>

<html><body>
	<form action = "index.php" method = "get">
		Username: <input type ="text" name="login" value="<?PHP echo $_SESSION["user"]?>" />
		<br />
		Password: <input type="text" name="passwd" value="<?PHP echo $_SESSION["passwd"]?>" />
		<input type="submit" name="submit" value= "<?PHP echo "$submit"?>" />
	</form>
</body></html>
