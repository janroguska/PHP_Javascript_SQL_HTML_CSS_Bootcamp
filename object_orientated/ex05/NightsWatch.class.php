<?PHP

class NightsWatch implements IFighter
{
	public function recruit($crow)
	{
		if ($crow instanceof IFighter)
			$this->array[] = $crow;
	}
	public function fight()
	{
		foreach($this->array as $key => $elem)
		{
			$elem->fight();
		}
	}
}

?>