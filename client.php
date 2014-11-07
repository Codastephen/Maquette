<?php
class Client
{
	private $_nom;
	private $_prenom;
    private $_societe;
	private $_hArrive;
	private $_hDepart;
	
  // Nous déclarons une méthode dont le seul but est d'afficher un texte.
  public function toString()
  {
	echo'$_nom' . '$_prenom'. '$_societe' . '$_nom' . '$_nom';
  }
}
?>