<?PHP

if ($_POST['submit'] != "OK" || !$_POST['passwd'])
{
	echo "ERROR\n";
	return ;
}
if (!file_exists("../private/"))
	mkdir("../private", 0777);
if (!file_exists("../private/passwd"))
	file_put_contents('../private/passwd', "");
$data = unserialize(file_get_contents('../private/passwd'));
$new_array = [];
$new_array['login'] = $_POST['login'];
$new_array['passwd'] = hash('whirlpool', $_POST['passwd']);
if ($data)
{
	foreach ($data as $key => $elem)
	{
		if ($elem['login'] === $new_array['login'])
		{
			echo "ERROR\n";
			return ;
		}
	}
}
$data[] = $new_array;
file_put_contents('../private/passwd', serialize($data));
echo "OK\n";

?>