<?PHP

abstract class Fighter
{
	protected $_recruit;
	abstract function fight($name);
	public function __construct($fighter)
	{
		$this->_recruit = $fighter;
	}
	public function Get_Fighter()
	{
		return ($this->_recruit);
	}
}

?>