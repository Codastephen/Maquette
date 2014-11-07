<?php
class ListeClient
{
	var $_liste;


	function __construct()
    {
        $this->_liste = array();
    }
	
  // to String
  public function ajouter($client)
  {
	$this->_liste[] = $client;
  }
  
   public function size()
  {
	echo sizeof($this->_liste);
  }
  }
?>