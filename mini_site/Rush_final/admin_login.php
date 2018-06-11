<?PHP

include 'auth.php';

session_start();
$login = $_GET['login'];
$passwd = $_GET['passwd'];
if (auth_admin($login, $passwd))
{
	$_SESSION['loggued_on_user'] = $login;
	header('location: ./admin.php');
}
else
{
	$_SESSION['loggued_on_user'] = "";
	header('location: ./error.html');
}

?>