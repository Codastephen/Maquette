<?php
class ConnexionBDD
{
	function __construct()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
	}
}
?>