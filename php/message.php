<?php
class Message
{
	var $_user;
	var $_msg;
	var $_dateDebut;
	var $_dateFin;

	
	function __construct($user,$msg,$debut,$fin)
	{
		$this->_user = $user;
		$this->_msg = $msg;
		$this->_dateDebut = $debut;
		$this->_dateFin = $fin;
	}
}
?>