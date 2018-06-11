<?PHP

$array = $_GET;

foreach ($array as $key => $elem)
{
	if ($key == "action")
		$action = $elem;
	if ($key == "name")
		$name = $elem;
	if ($key == "value")
		$value = $elem;
}

$array = $_COOKIE;

if ($action == "set")
	setcookie($name, $value);
else if ($action == "get")
{
	foreach ($array as $key => $elem)
	{
		if ($key == $name)
			echo ("$elem\n");
	}
}
else if ($action == "del")
	setcookie($name, null, time() -3600);
else
	return ;

?>