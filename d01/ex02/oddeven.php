#!/usr/bin/php
<?PHP

while(1)
{
	print("Enter a number: ");
	$line = (fgets(STDIN));
	if (!$line)
	{
		print("\n");
		exit ;
	}
	$line = trim($line);
	if ((is_numeric($line)) == 0)
		print("'$line' is not a number\n");
	else if ($line % 2 == 0)
		print("The number $line is even\n");
	else
		print("The number $line is odd\n");
}

?>