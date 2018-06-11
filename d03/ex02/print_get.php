<?PHP

$array = $_GET;

foreach ($array as $key => $value)
{	
	if (!$value)
		echo "$key\n";
	else
		echo "$key: $value\n";
}

?>