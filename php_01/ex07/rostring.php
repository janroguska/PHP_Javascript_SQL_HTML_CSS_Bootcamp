#!/usr/bin/php
<?PHP

if ($argc < 2)
	return ;
$i = 1;
$j = 0;
$array = preg_split('/ /', $argv[1], 0, PREG_SPLIT_NO_EMPTY);
while ($array[$j])
	$j++;
if ($j > 1)
{
	print("$array[$i] ");
	while ($array[++$i])
		print("$array[$i] ");
}
print("$array[0]\n");

?>