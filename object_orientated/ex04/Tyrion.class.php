<?PHP

class Tyrion extends Lannister
{
	public function check_for_sex($a)
	{
		if (is_subclass_of($a, Lannister) === True)
			return ("Not even if I'm drunk !");
		else
			return ("Let's do this.");
	}
}

?>