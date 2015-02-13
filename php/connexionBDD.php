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
	

	public function ajouterVisiteur($visiteur)
	{
		$req = $this->bdd->prepare('INSERT INTO visiteur(nom, societe,code) VALUES(:nom, :societe, :code)');
		$visiteur->_code = $this->GenerateKey();
		$data = $req->execute(array(
			'nom' => $visiteur->_nomprenom,
			'societe' => $visiteur->_societe,
			'code' => $visiteur->_code
			));
		if($data){
			$newVisiteur = $this->getVisiteur($visiteur);
			$req = $this->bdd->prepare('INSERT INTO Visite(Id_visiteur, HeureA) VALUES(:id, :heureA)');
			$data = $req->execute(array(
				'id' => $newVisiteur->_id,
				'heureA' => date('Y-m-d H:i:s',$visiteur->_hArrive),
				));
			BDDLog::ajouterLigne("ARRIVEE",$newVisiteur);
			return $newVisiteur;
		}else{
			$req = $this->bdd->prepare('INSERT INTO visiteur(nom, societe,code) VALUES(:nom, :societe, :code)');
			$visiteur->_code = $this->GenerateKey();
			$data = $req->execute(array(
				'nom' => $visiteur->_nomprenom,
				'societe' => $visiteur->_societe,
				'code' => $visiteur->_code
				));
			if($data){
				$newVisiteur = $this->getVisiteur($visiteur);
				$req = $this->bdd->prepare('INSERT INTO Visite(Id_visiteur, HeureA) VALUES(:id, :heureA)');
				$data = $req->execute(array(
					'id' => $newVisiteur->_id,
					'heureA' => date('Y-m-d H:i:s',$visiteur->_hArrive),
					));
				BDDLog::ajouterLigne("ARRIVEE",$newVisiteur);
				return $newVisiteur;
			}else{
				die("Erreur fatale lors de l'insertion");
			}
		}
	}

	public function retirerVisiteur($visiteur)
	{
		$req = $this->bdd->prepare('UPDATE visite SET HeureD = :heureD WHERE Id_visiteur = :id');
		$req->execute(array(
			'id' => $visiteur->_id,
			'heureD' => date('Y-m-d H:i:s',time())
			));
		$req = $this->bdd->prepare('UPDATE visiteur SET code = null WHERE Id_visiteur = :id');
		$req->execute(array(
			'id' => $visiteur->_id
			));
		BDDLog::ajouterLigne("DEPART",$visiteur);
	}

	public function retirerVisiteurWithCode($code)
	{
		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE code ="'.$code.'"');
		if($reponse->rowCount()==0 || $reponse->rowCount()>1)
			return false;
		foreach  ($reponse as $row) {
			$toto= $row['Id_visiteur'];
		}
		$req = $this->bdd->prepare('UPDATE visite SET HeureD = :heureD WHERE Id_visiteur = :id');
		$req->execute(array(
			'id' => $toto,
			'heureD' => date('Y-m-d H:i:s',time())
			));
		$req = $this->bdd->prepare('UPDATE visiteur SET code = null WHERE Id_visiteur = :id');
		$req->execute(array(
			'id' => $toto
			));
		return $reponse;
	}

	public function afficherVisiteur()
	{
		$reponse = $this->bdd->query('SELECT Nom, Societe, code FROM visiteur WHERE code >=0 ORDER BY Nom');
		return $reponse;
	}

	public function getVisiteur($visiteur){
		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE code ="'.$visiteur->_code.'" ORDER BY Nom');
		$data = $reponse->fetch();
		$visiteur = Visiteur::withCodeAndHour($data['Id_visiteur'],$data['Nom'],$data['Societe'],$data['HeureA'],$data['code']);
		return $visiteur;
	}

	public function getVisiteurCode($code){
		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE code ="'.$code.'"');
		if($reponse->rowCount()==0)
			return false;
		$data = $reponse->fetch();
		$visiteur = Visiteur::withCodeAndHour($data['Id_visiteur'],$data['Nom'],$data['Societe'],$data['HeureA'],$data['code']);
		return $visiteur;
	}

	function GenerateKey($length = 4) {
		$key = '';
		for($i = 0; $i < $length; $i ++) {
			$key .= chr(mt_rand(48, 57));
		}
		return $key;
	}

	public function addMsg($msg){
		$req = $this->bdd->prepare('INSERT INTO Message(nom, contenu,datedebut,datefin) VALUES(:user, :msg, :debut,:fin)');
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
		$reponse = $this->bdd->query("SELECT m.Id_message as id,m.contenu as message,m.datedebut as datedebut,m.datefin as datefin,u.nom as user_nom FROM Message m,user u WHERE u.nom = m.nom ORDER BY m.Id_message");
		return $reponse;
	}

	public function deleteMsg($id){
		$reponse = $this->bdd->query("DELETE FROM Message WHERE Id_message=".$id);
		return $reponse;
	}

	public function addUser($nom){
		$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'"');
		if($reponse->rowCount()>1)
			return false;
		else if($reponse->rowCount()==1){
			$data = $reponse->fetch();
			return new User($data['nom']);
		}else{
			$req = $this->bdd->prepare('INSERT INTO User(nom) VALUES(:nom)');
			$data = $req->execute(array(
				'nom' => $nom
				));
			$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'"');
			if($reponse->rowCount()!=1)
				return false;
			else{
				$data = $reponse->fetch();
				return new User($data['nom']);
			}
		}
	}

}
?>
