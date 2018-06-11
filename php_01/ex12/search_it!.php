#!/usr/bin/php
<?PHP

if ($argc < 2)
	return ;
$i = 2;
while ($argv[$i])
{
	$j = 0;
	while ($argv[$i][$j])
		$j++;
	$a = $argv[$i][$j - 1];
	if ($argv[$i][$j - 1] == ':')
		return ;
	$array = explode(':', $argv[$i]);
	if ($array[2] || !$array[1])
		return ;
	if ((strcmp($argv[1], $array[0])) == 0)
		$value = $array[1];
	if ((strcmp($argv[1], $array[1])) == 0)
		$value = $array[0];
	$i++;
}
if (!$value)
	return ;
print("$value\n");

?>