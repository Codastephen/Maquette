<?php
class ListeClient
{
	var $_liste;
	
  // to String
  public function ajouter($client)
  {
	$_liste = $client;
  }
  
   public function size()
  {
	echo sizeof($_liste);
  }
  }
?>