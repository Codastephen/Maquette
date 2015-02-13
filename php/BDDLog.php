<?php
class BDDLog
{
	
	
	var $host = 'localhost';

	public static function ajouterLigne($action,$visiteur)
	{
		
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		$req = $bdd->prepare('INSERT INTO log(action, Id_visiteur) VALUES(:action, :id)');
		$req->execute(array(
			'action' => $action,
			'id' => $visiteur->_id,
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
		
		
		$reponse = $bdd->query('SELECT l.date AS date, l.action AS action, v.nom AS nom, v.societe AS societe, v.code AS code FROM log l, visiteur v WHERE l.Id_visiteur=v.Id_visiteur ORDER BY l.date DESC');
		return $reponse;
	}	
}
?>
