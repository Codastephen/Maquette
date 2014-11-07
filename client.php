<?php
class Client
{
	var $_nom;
	var $_prenom;
    var $_societe;
	var $_hArrive;
	var $_hDepart;

	
	function __construct()
    {
        $this->_nom = "toto";
        $this->_prenom = "tata";
    }

  // to String
  public function toString()
  {
	echo $this->_nom;
  }
}
?>