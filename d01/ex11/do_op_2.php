#!/usr/bin/php
<?PHP

if ($argc != 2)
{
	print("Incorrect Parameters\n");
	return ;
}
$i = 0;
$string = trim(preg_replace("{[ \t]+}", '', $argv[1]));
while (($string[$i] >= '0' && $string[$i] <= '9')
|| ($string[$i] == '+' || $string[$i] == '-'
|| $string[$i] == '*' || $string[$i] == '/'
|| $string[$i] == '%') && $string[$i])
	$i++;
if ($i < strlen($string))
{
	print("Syntax Error\n");
	return ;
}
$i = 0;
while ($string[$i] >= '0' && $string[$i] <= '9')
	$i++;
$first = substr($string, 0, $i);
if ($string[$i] != '+' && $string[$i] != '-'
&& $string[$i] != '*' && $string[$i] != '/'
&& $string[$i] != '%')
{
	print("Syntax Error\n");
	return ;
}
else
	$operator = $string[$i];
$third = substr($string, $i + 1);
if ($operator == '%' || $operator == '/' && $third == '0')
{
	print("Incorrect Parameters\n");
	return ;
}
if ($operator == '+')
	print($first + $third);
else if ($operator == '-')
	print($first - $third);
else if ($operator == '*')
	print($first * $third);
else if ($operator == '/')
	print($first / $third);
else if ($operator == '%')
	print($first % $third);
else
	return ;

?>