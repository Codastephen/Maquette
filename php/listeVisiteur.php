<?php
class ListeVisiteur
{
	var $_liste;

	function __construct(){
    $this->_liste = array();
  }

  public function ajouter($visiteur){
    $this->_liste[] = $visiteur;
    $last_key = key( array_slice( $this->_liste, -1, 1, TRUE ) );
    return $last_key;
  }
  public function supprimer($index){
    unset($this->_liste[$index]);
    array_merge($this->_liste );
  }
  public function size(){
    return sizeof($this->_liste);
  }
  public function toString(){
    foreach ($this->_liste as $item) {
      echo $item->toString();
    }
  }
  public function getItem($index){
    return $this->_liste[$index];
  }
}
?>