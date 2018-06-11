<?php
$fd = fopen('products.csv', 'r');
$i = 0;
$db = array();
while ($fd && !feof($fd))
{
	$a = explode(";", fgets($fd));
	$a = str_replace('"', '', $a);
    $db[$i]["img"] = $a[0];
    $db[$i]["nom"] = $a[1];
    $db[$i]["prix"] = $a[2];
    $db[$i]["id"] = $a[3];
    $db[$i]["categorie"] = $a[4];
    $i += 1;
}
$i = 0;
foreach ($db as $ele)
{
	if (!$_GET['name'])
	{
		if ($i == 0)
			echo "<tr>";
		echo "<td><figure><img src=".$ele["img"]."><figcaption class=\"legende\"><p>".$ele["nom"]."<br><strong class=\"price\">".$ele["prix"]."</strong>
</p><br /><form action=\"./add.php\"><input class=\"add-basket\" type=\"submit\" name =\"name\" value=\"".$ele['nom']." ".$ele["prix"]."\"></form></figcaption></figure></td>";
		if ($i == 3)
		{
			echo "</tr>";
			$i = -1;
		}
	}
	else
	{
		if ($ele["categorie"] === $_GET["name"])
		{
			if ($i == 0)
				echo "<tr>";
			echo "<td><figure><img src=".$ele["img"]."><figcaption class=\"legende\"><p>".$ele["nom"]."<br><strong class=\"price\">".$ele["prix"]."</strong>
</p><br /><form action=\"./add.php\"><input class=\"add-basket\" type=\"submit\" name =\"name\" value=\"".$ele['nom']." ".$ele["prix"]."\"></form></figcaption></figure></td>";
			if ($i == 3)
			{
				echo "</tr>";
				$i = -1;
			}
		}
	}
	$i += 1;
}
?>