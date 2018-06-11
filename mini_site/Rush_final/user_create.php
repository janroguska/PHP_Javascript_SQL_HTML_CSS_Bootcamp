<?PHP


function add_user($login, $passwd, $submit)
{
	if ($submit != "OK" || !$passwd)
	{
		return false;
	}
	if (!file_exists("private/"))
		mkdir("private", 0777);
	if (!file_exists("private/passwd"))
		file_put_contents('private/passwd', "");
	$data = unserialize(file_get_contents('private/passwd'));
	$new_array = [];
	$new_array['login'] = $login;
	$new_array['passwd'] = hash('whirlpool', $passwd);
	if ($data)
	{
		foreach ($data as $key => $elem)
		{
			if ($elem['login'] === $new_array['login'])
				return false;
		}
	}
	$data[] = $new_array;
	file_put_contents('private/passwd', serialize($data));
	return true;
}

function add_admin($login, $passwd, $submit)
{
	if ($submit != "OK" || !$passwd)
	{
		return false;
	}
	if (!file_exists("private/"))
		mkdir("private", 0777);
	if (!file_exists("private/admin"))
		file_put_contents('private/admin', "");
	$data = unserialize(file_get_contents('private/admin'));
	$new_array = [];
	$new_array['login'] = $login;
	$new_array['passwd'] = hash('whirlpool', $passwd);
	if ($data)
	{
		foreach ($data as $key => $elem)
		{
			if ($elem['login'] === $new_array['login'])
				return false;
		}
	}
	$data[] = $new_array;
	file_put_contents('private/admin', serialize($data));
	return true;
}

?>