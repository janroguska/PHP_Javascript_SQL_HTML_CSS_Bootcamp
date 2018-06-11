#!/usr/bin/php
<?PHP

if ($argc < 2)
	return ;
$i = 1;
$array = (preg_split('/ /', $argv[$i], 0, PREG_SPLIT_NO_EMPTY));
if ($argc == 2)
{
	sort($array);
	$i = -1;
	while ($array[++$i])
		print("$array[$i]\n");
	return ;
}
while ($argv[++$i])
{
	$tmp = (preg_split('/ /', $argv[$i], 0, PREG_SPLIT_NO_EMPTY));
	$result = array_merge((array)$array, (array)$tmp);
	$array = $result;
}
sort($result);
$i = -1;
while ($result[++$i])
	print("$result[$i]\n");

?>