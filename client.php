<?php
class Client
{
	var $_nom;
	var $_prenom;
    var $_societe;
	var $_hArrive;
	var $_hDepart;

	
	function __construct($nom, $prenom, $societe)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
		$this->_societe = $societe;
    }

  // to String
  public function toString()
  {
	echo " Nom :". $this->_nom;
	echo " </br> Prenom :". $this->_prenom;
	echo " </br> Societe :". $this->_societe;
  }
}
?>