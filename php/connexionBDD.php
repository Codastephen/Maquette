<?php
class ConnexionBDD
{
	
	
	var $host = 'localhost';

	public function ajouterClient($client)
	{
		
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
		$req = $bdd->prepare('INSERT INTO visiteur(nom, societe,heureA) VALUES(:nom, :societe, :heureA)');
		$req->execute(array(
			'nom' => $client->_nomprenom,
			'societe' => $client->_societe,
			'heureA' => date('Y-m-d H:i:s',$client->_hArrive)	
			));
	}
	
	public function retirerClient($client)
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
		$req = $bdd->prepare('DELETE FROM visiteur WHERE nom = :nom AND societe = :societe ');
		$req->execute(array(
			'nom' => $client->_nomprenom,
			'societe' => $client->_societe,
			));
	}
	public function afficherClient()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
		
		$reponse = $bdd->query('SELECT * FROM visiteur');
		return $reponse;
	}	
}
?>
