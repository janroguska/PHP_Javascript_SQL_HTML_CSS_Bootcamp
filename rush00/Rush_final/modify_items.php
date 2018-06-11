<?PHP
include 'auth.php';

session_start();
if ((check_user($_SESSION['loggued_on_user'])) == FALSE)
	header('location: ./admin.html');
if (($fd = fopen('products.csv', "r")) !== FALSE)
{
	while (($data = fgetcsv($fd, 0)) !== FALSE)
		$pokemon[] = explode(";", $data[0]);
}
if ($pokemon)
{
	foreach($pokemon as $key => $ele)
	{
		echo "<tr>";
		echo "<td><figure><img src=".$ele[0]."><figcaption class=\"legende\"><p><br>
	</p><br /><form action=\"modify_items.php\" method = \"post\"><label>
	<b>Nom</b></label><input type=\"text\" name =\"nom_$key\"><input class=\"login-button\" type=\"submit\" name=\"submit_nom_$key\" value=\"OK\" /><br /><label>
	<b>Prix</b></label><b><select type=\"text\" name =\"prix_$key\"><option value=\"100€\">100€</option><option value=\"150€\">150€</option><option value=\"200€\">200€</option><option value=\"250€\">250€</option><option value=\"300€\">300€</option></select><input class=\"login-button\" type=\"submit\" name=\"submit_prix_$key\" value=\"OK\" /><br />
	<b>Type</b><select type=\"text\" name =\"type_$key\"><option value=\"Fire\">Fire</option><option value=\"Grass\">Grass</option><option value=\"Water\">Water</option><option value=\"Normal\">Normal</option></select><input class=\"login-button\" type=\"submit\" name=\"submit_type_$key\" value=\"OK\" /><br />
	<b>Evolution</b><select type=\"text\" name =\"evolution_$key\"><option value=\"1\">1</option><option value=\"2\">2</option><option value=\"3\">3</option></select><input class=\"login-button\" type=\"submit\" name=\"submit_evolution_$key\" value=\"OK\" /><br />
	<b>Image</b><input type=\"text\" name =\"image_$key\"><input class=\"login-button\" type=\"submit\" name=\"submit_image_$key\" value=\"OK\" /><br /><input class=\"login-button\" type=\"submit\" name=\"remove_$key\" value=\"REMOVE\" /></form></figcaption></figure></td>";
		if ($_POST["submit_type_$key"] && $_POST["type_$key"])
			$pokemon[$key][4] = $_POST["type_$key"];
		if ($_POST["submit_nom_$key"] && $_POST["nom_$key"])
			$pokemon[$key][1] = $_POST["nom_$key"];
		if ($_POST["submit_prix_$key"] && $_POST["prix_$key"])
			$pokemon[$key][2] = $_POST["prix_$key"];
		if ($_POST["submit_image_$key"] && $_POST["image_$key"])
			$pokemon[$key][0] = $_POST["image_$key"];
		if ($_POST["submit_evolution_$key"] && $_POST["evolution_$key"])
			$pokemon[$key][5] = $_POST["evolution_$key"];
		if ($_POST["remove_$key"])
			unset($pokemon[$key]);
		echo "</tr>";
		$i = $key;
	}
	echo "<br /><tr>";
	echo "<td><p>Add Pokemon</p><figure><form action=\"modify_items.php\" method = \"post\"><label>
	<b>Nom</b></label><input type=\"text\" name =\"new_nom\"><br /><label>
	<b>Prix</label><b><select type=\"text\" name =\"new_prix\"><option value=\"100€\">100€</option><option value=\"150€\">150€</option><option value=\"200€\">200€</option><option value=\"250€\">250€</option><option value=\"300€\">300€</option></select><br />
	<b>Type</b><select type=\"text\" name =\"new_type\"><option value=\"Fire\">Fire</option><option value=\"Grass\">Grass</option><option value=\"Water\">Water</option><option value=\"Normal\">Normal</option></option></select><br />
	<b>Evolution</b><select type=\"text\" name =\"new_evolution\"><option value=\"1\">1</option><option value=\"2\">2</option><option value=\"3\">3</option></select><br />
	<b>Image</b><input type=\"text\" name =\"new_image\"><br /><input class=\"login-button\" type=\"submit\" name=\"submit_new\" value=\"OK\" /></form></figcaption></figure></td>";
	echo "</tr>";
	echo "<form methode=\"post\" action=\"./admin.php\" class=\"box\"><h1><input class=\"button\" type=\"submit\" value=\"Retour\" style=\"color:white\"/></h1></form>";
	if ($_POST["submit_new"] && $_POST["new_nom"] && $_POST["new_prix"]
	&& $_POST["new_type"] && $_POST["new_image"])
	{
		$pokemon[$i + 1][0] = $_POST["new_image"];
		$pokemon[$i + 1][1] = $_POST["new_nom"];
		$pokemon[$i + 1][2] = $_POST["new_prix"];
		$pokemon[$i + 1][3] = $i + 2;
		$pokemon[$i + 1][4] = $_POST["new_type"];
		$pokemon[$i + 1][5] = $_POST["new_evolution"];
		$pokemon[$i + 1][6] = "!";
	}
}
fclose($fd);
if (($fd = fopen('products.csv', "w")) !== FALSE)
{
	$i = -1;
	foreach($pokemon as $ele)
		fputcsv($fd, $ele, ";");
	fclose($fd);
}

?>