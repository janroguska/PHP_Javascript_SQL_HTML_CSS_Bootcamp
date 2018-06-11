#!/usr/bin/php
<?PHP

$i = 1;
if ($argc < 2)
	return ;
while ($argv[$i])
{
	print("$argv[$i]\n");
	$i++;
}

?>