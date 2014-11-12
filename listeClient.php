<?php
class ListeClient
{
	var $_liste;


	function __construct()
  {
    $this->_liste = array();
  }


  public function ajouter($client)
  {
   $this->_liste[] = $client;
 }

 public function supprimer($index)
 {
   unset($this->_liste[$index]);
   array_merge($this->_liste );
 }
 public function size()
 {
   echo sizeof($this->_liste);
 }

 public function toString(){
  foreach ($this->_liste as $item) {
    echo $item->toString();
  }
}
}
?>