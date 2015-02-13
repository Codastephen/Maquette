<?php
class Visiteur
{
	var $_id;
	var $_nomprenom;
	var $_societe;
	var $_hArrive;
	var $_hDepart;
	var $_code;
	var $_visite;

	
	function __construct($nomprenom, $societe)
	{
		$this->_id = null;
		$this->_nomprenom = $nomprenom;
		$this->_societe = $societe;
		$this->_hArrive = time();
		$this->_code = null;
	}

	public static function withCodeAndHour($id,$nomprenom,$societe,$arrive,$code,$visite)
	{
		$instance = new self($nomprenom,$societe);
		$instance->_id = $id;
		$instance->_hArrive = $arrive;
		$instance->_code = $code;
		$instance->_visite = $visite;
		
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