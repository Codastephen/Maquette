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

	public function retirerClientWithCode($code)
	{
		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE code ="'.$code.'"');
		if($reponse->rowCount()==0)
			return false;
		$req = $this->bdd->prepare('DELETE FROM visiteur WHERE code = :code');
		$req->execute(array(
			'code' => $code
			));
		return true;
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

	public function getClientCode($code){
		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE code ="'.$code.'"');
		if($reponse->rowCount()==0)
			return false;
		$data = $reponse->fetch();
		$client = Client::withCodeAndHour($data['Nom'],$data['Societe'],$data['HeureA'],$data['code']);
		return $client;
	}

	function GenerateKey($length = 4) {
		$key = '';
		for($i = 0; $i < $length; $i ++) {
			$key .= chr(mt_rand(48, 57));
		}
		return $key;
	}

	public function addMsg($msg){
		$req = $this->bdd->prepare('INSERT INTO Message(user, message,datedebut,datefin) VALUES(:user, :msg, :debut,:fin)');
		$data = $req->execute(array(
			'user' => $msg->_user,
			'msg' => $msg->_msg,
			'debut' => $msg->_dateDebut,
			'fin' => $msg->_dateFin
			));
		return $data;
	}

	public function updateMsg($id,$value,$debut,$fin){
		$req = $this->bdd->prepare('UPDATE Message SET message = :value,datedebut =:debut, datefin = :fin WHERE id = :id');
		$data = $req->execute(array(
			'value' => $value,
			'id' => $id,
			'debut' => $debut,
			'fin' => $fin
			));
		return $this->bdd->query("SELECT message FROM Message WHERE id = ".$id);
	}

	public function getAllMsg(){
		$reponse = $this->bdd->query("SELECT m.id as id,m.message as message,m.datedebut as datedebut,m.datefin as datefin,u.id as user_id,u.name as user_name FROM Message m,user u WHERE u.id = m.user ORDER BY m.id");
		return $reponse;
	}

	public function deleteMsg($id){
		$reponse = $this->bdd->query("DELETE FROM Message WHERE id=".$id);
		return $reponse;
	}

	public function addUser($username){
		$reponse = $this->bdd->query('SELECT * FROM user WHERE name ="'.$username.'"');
		if($reponse->rowCount()>1)
			return false;
		else if($reponse->rowCount()==1){
			$data = $reponse->fetch();
			return new User($data['id'],$data['name']);
		}else{
			$req = $this->bdd->prepare('INSERT INTO User(name) VALUES(:name)');
			$data = $req->execute(array(
				'name' => $username
				));
			$reponse = $this->bdd->query('SELECT * FROM user WHERE name ="'.$username.'"');
			if($reponse->rowCount()!=1)
				return false;
			else{
				$data = $reponse->fetch();
				return new User($data['id'],$data['name']);
			}
		}
	}

}
?>
