<?PHP

class UnholyFactory
{
	private $_new_guys = array();
	public function absorb($recruit)
	{
		if ($recruit instanceof Fighter)
		{
			if (in_array($recruit, $this->_new_guys))
			{
				print("(Factory already absorbed a fighter of type " . $recruit->Get_Fighter() . ")" . PHP_EOL);
				return ;
			}
			else
			{
				print("(Factory absorbed a fighter of type " . $recruit->Get_Fighter() . ")" . PHP_EOL);
				$this->_new_guys[$recruit->Get_Fighter()] = $recruit;
				return ;
			}
		}
		print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
	}
	public function fabricate($fighter)
	{
		if (isset($this->_new_guys[$fighter]))
		{
			print("(Factory fabricates a fighter of type " . $fighter . ")" . PHP_EOL);
			return ($this->_new_guys[$fighter]);
		}
		else
			print("(Factory hasn't absorbed any fighter of type " . $fighter . ")" . PHP_EOL);
	}
}

?>