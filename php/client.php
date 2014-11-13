<?php
class Client
{
	var $_nomprenom;
	var $_societe;
	var $_hArrive;
	var $_hDepart;

	
	function __construct($nomprenom, $societe)
	{
		$this->_nomprenom = $nomprenom;
		$this->_societe = $societe;
		$this->_hArrive = time();
	}

  // to String
	public function toString()
	{
		echo " Nom :". $this->_nomprenom;
		echo " </br> Societe :". $this->_societe;
	}
}
?>