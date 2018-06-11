#!/usr/bin/php
<?PHP

function ft_is_sort($tab)
{
	if (gettype($tab) != "array")
		return (0);
	$tmp = $tab;
	sort($tab);
	if ($tmp == $tab)
		return (1);
	else
		return (0);
}

?>