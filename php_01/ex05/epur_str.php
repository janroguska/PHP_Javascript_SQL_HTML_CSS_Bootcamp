#!/usr/bin/php
<?PHP

	if ($argc != 2)
		return ;
	$string = trim(preg_replace('!\s+!', ' ', $argv[1]));
	print("$string\n");

?>