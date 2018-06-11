<?PHP

function auth($login, $passwd)
{
	if (!file_exists("private/passwd"))
		return false;
	$newpw = hash('whirlpool', $passwd);
	$data = unserialize(file_get_contents('private/passwd'));
	if ($data)
	{
		foreach ($data as $key => $elem)
		{
			if ($elem['login'] === $login
			&& $elem['passwd'] === $newpw)
				return true;
		}
	}
	return false;
}

function auth_admin($login, $passwd)
{
	if (!file_exists("private/admin"))
		return false;
	$newpw = hash('whirlpool', $passwd);
	$data = unserialize(file_get_contents('private/admin'));
	if ($data)
	{
		foreach ($data as $key => $elem)
		{
			if ($elem['login'] === $login
			&& $elem['passwd'] === $newpw)
				return true;
		}
	}
	return false;
}


function check_user($user)
{
	$data = unserialize(file_get_contents('private/admin'));
	if ($data)
	{
		foreach ($data as $key => $elem)
		{
			if ($elem['login'] === $user)
				return true;
		}
	}
	return false;
	}
?>
