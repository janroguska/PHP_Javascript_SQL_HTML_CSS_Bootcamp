#!/usr/bin/php
<?PHP

if ($argc != 4)
{
	print("Incorrect Parameters\n");
	return ;
}
$i = 0;
$first = floatval($argv[1]);
$third = floatval($argv[3]);
while ($argv[2][$i] != '+' && $argv[2][$i] != '-'
&& $argv[2][$i] != '*' && $argv[2][$i] != '/'
&& $argv[2][$i] != '%' && $i < strlen($argv[2]))
	$i++;
print($i);
if ($argv[2][$i] == '+')
	print($first + $third);
if ($argv[2][$i] == '-')
	print($first - $third);
if ($argv[2][$i] == '*')
	print($first * $third);
if ($argv[2][$i] == '/')
	print($first / $third);
if ($argv[2][$i] == '%')
	print($first % $third);
print("\n");
return ;

?>