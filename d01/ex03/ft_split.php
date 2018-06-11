#!/usr/bin/php
<?PHP

function ft_split($str)
{
	return (preg_split('/ /', $str, 0, PREG_SPLIT_NO_EMPTY));
}

?>