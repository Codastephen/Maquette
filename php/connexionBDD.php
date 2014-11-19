<?php
class ConnexionBDD
{

	var $bdd = null;
	
	function __construct(){
		try
		{
			$this->bdd = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	

	public function ajouterClient($client)
	{
		$req = $this->bdd->prepare('INSERT INTO visiteur(nom, societe,heureA,code) VALUES(:nom, :societe, :heureA,:code)');
		$data = $req->execute(array(
			'nom' => $client->_nomprenom,
			'societe' => $client->_societe,
			'heureA' => date('Y-m-d H:i:s',$client->_hArrive),
			'code' => $this->GenerateKey()
			));
		if($data){
			return $this->getClient($client);
		}else{
			$data = $req->execute(array(
				'nom' => $client->_nomprenom,
				'societe' => $client->_societe,
				'heureA' => date('Y-m-d H:i:s',$client->_hArrive),
				'code' => $this->GenerateKey()
				));
			if($data){
				return $this->getClient($client);
			}else{
				die("Erreur fatale lors de l'insertion");
			}
		}
	}

	public function retirerClient($client)
	{
		$req = $this->bdd->prepare('DELETE FROM visiteur WHERE nom = :nom AND societe = :societe ');
		$req->execute(array(
			'nom' => $client->_nomprenom,
			'societe' => $client->_societe,
			));
	}

	public function afficherClient()
	{
		$reponse = $this->bdd->query('SELECT Nom, Societe FROM visiteur ORDER BY Nom');
		return $reponse;
	}

	public function getClient($client){
		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE nom ="'.$client->_nomprenom.'" AND societe="'.$client->_societe.'" ORDER BY Nom');
		$data = $reponse->fetch();
		$client = Client::withCodeAndHour($data['Nom'],$data['Societe'],$data['HeureA'],$data['code']);
		return $client;
	}

	function GenerateKey($length = 4) {
		$key = '';
		$type = mt_rand(0,1);
		for($i = 0; $i < $length; $i ++) {
			if($type==0){
				$key .= chr(mt_rand(65, 90));
			}else{
				$key .= chr(mt_rand(48, 57));
			}
			$type = mt_rand(0,1);
		}
		return $key;
	}

}
?>
