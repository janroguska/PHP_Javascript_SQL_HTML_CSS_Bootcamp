#!/usr/bin/php
<?PHP

function new_sort($a, $b)
{
	$i = 0;
	$j = 0;
	$str1 = strtolower($a);
	$str2 = strtolower($b);
	if ($str1 == $str2)
		return (0);
	while ($str1[$i] == $str2[$i])
		$i++;
	$comp = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
	while ($j < strlen($comp))
	{
		if ($str1[$i] == $comp[$j])
			$k = $j;
		if ($str2[$i] == $comp[$j])
			$l = $j;
		$j++;
	}
	return ($k < $l) ? -1 : 1;
}

if ($argc < 2)
	return ;
$i = 1;
$array = (preg_split('/ /', $argv[$i], 0, PREG_SPLIT_NO_EMPTY));
while ($argv[++$i])
{
	$tmp = (preg_split('/ /', $argv[$i], 0, PREG_SPLIT_NO_EMPTY));
	$result = array_merge((array)$array, (array)$tmp);
	$array = $result;
}
if ($argc == 2)
{
	usort($array, "new_sort");
	$i = -1;
	while ($array[++$i])
		print("$array[$i]\n");
	return ;
}
usort($result, "new_sort");
$i = -1;
while ($result[++$i])
	print("$result[$i]\n");

?>