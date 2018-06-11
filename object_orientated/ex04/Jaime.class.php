<?PHP

class Jaime extends Lannister
{
	public function check_for_sex($a)
	{
		if (is_subclass_of($a, Stark) === True)
			return ("Let's do this.");
		else if (get_class($a) == "Tyrion")
			return ("Not even if I'm drunk !");
		else
			return ("With pleasure, but only in a tower in Winterfell, then.");
	}
}


?>