<?PHP

function auth($login, $passwd)
{
	if (!file_exists("../private/passwd"))
		return false;
	$newpw = hash('whirlpool', $passwd);
	$data = unserialize(file_get_contents('../private/passwd'));
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

?>