<?php
class Client
{
	var $_nomprenom;
	var $_societe;
	var $_hArrive;
	var $_hDepart;
	var $_code;

	
	function __construct($nomprenom, $societe)
	{
		$this->_nomprenom = $nomprenom;
		$this->_societe = $societe;
		$this->_hArrive = time();
		$this->_code = null;
	}

	public static function withCodeAndHour($nomprenom,$societe,$arrive,$code)
	{
		$instance = new self($nomprenom,$societe);
		$instance->_hArrive = $arrive;
		$instance->_code = $code;
		return $instance;
	}

  // to String
	public function toString()
	{
		echo " Nom :". $this->_nomprenom;
		echo " </br> Societe :". $this->_societe;
	}
}
?>