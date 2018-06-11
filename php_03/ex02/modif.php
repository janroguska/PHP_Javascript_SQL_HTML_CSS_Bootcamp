<?PHP

if ($_POST['submit'] != "OK" || !$_POST['newpw']
|| !file_exists("../private/") || !file_exists("../private/passwd"))
{
	echo "ERROR\n";
	return ;
}
$data = unserialize(file_get_contents('../private/passwd'));
$new_array = [];
$new_array['login'] = $_POST['login'];
$new_array['oldpw'] = hash('whirlpool', $_POST['oldpw']);
$new_array['newpw'] = hash('whirlpool', $_POST['newpw']);
if ($data)
{
	foreach ($data as $key => $elem)
	{
		if ($elem['login'] === $new_array['login']
		&& $elem['passwd'] === $new_array['oldpw'])
		{
				$data[$key]['passwd'] = $new_array['newpw'];
				file_put_contents('../private/passwd', serialize($data));
				echo "OK\n";
				return ;
		}
	}
}
echo "ERROR\n";
return ;

?>