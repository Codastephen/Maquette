<?php
class User
{
	var $_id;
	var $_name;

	
	function __construct($id, $name)
	{
		$this->_id = $id;
		$this->_name = $name;
	}
}
?>