<?php
class BDDLog
{
	
	
	var $host = 'localhost';

	public function ajouterLigne($action,$visiteur)
	{
		
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		$req = $bdd->prepare('INSERT INTO log(action, visiteur_nomprenom,visiteur_societe) VALUES(:action, :np, :s)');
		$req->execute(array(
			'action' => $action,
			'np' => $visiteur->_nomprenom,
			's' => $visiteur->_societe	
			));
	}

	public function afficherLog()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		
		$reponse = $bdd->query('SELECT * FROM log ORDER BY log.date');
		return $reponse;
	}	
}
?>
