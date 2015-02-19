<?php
/**
 * Classe gérant tous les accès à la base de données (écriture, lecture, modification)
 */
class ConnexionBDD
{

	var $bdd = null;
	
	/**
	 * Constructeur de l'accès à la BDD
	 */
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
	

	/**
	 * Permet d'ajouter un visiteur dans la BDD
	 * @param  Visiteur $visiteur représente le visiteur
	 * @return Visiteur le visiteur avec son ID dans la BDD
	 */
	public function ajouterVisiteur($visiteur)
	{
		$req = $this->bdd->query('SELECT * FROM visiteur where nom = "'.$visiteur->_nomprenom.'" AND societe = "'.$visiteur->_societe.'"');
		$count=0;
		foreach  ($req as $row) {
			$count+=1;
			$id_vis= $row['Id_visiteur'];
		}
		if($count>=1){
			$visiteur->_code = $this->GenerateKey();
			$visiteur->_id=$id_vis;
			$req = $this->bdd->prepare('UPDATE visiteur SET code = :code WHERE Id_visiteur = :id');
			$req->execute(array(
				'id' => $id_vis,
				'code' => $visiteur->_code
				));
			$req = $this->bdd->prepare('INSERT INTO Visite(Id_visiteur, HeureA) VALUES(:id, :heureA)');
			$data = $req->execute(array(
				'id' => $id_vis,
				'heureA' => date('Y-m-d H:i:s',$visiteur->_hArrive),
				));
			$idVisite = $this->bdd->lastInsertId();
			$req = $this->bdd->prepare('UPDATE visiteur SET Id_current_visite = :code WHERE Id_visiteur = :id');
			$req->execute(array(
				'id' => $id_vis,
				'code' => $idVisite
				));
			$visiteur->_visite =  $idVisite;
			BDDLog::ajouterLigne("ARRIVEE",$visiteur);
			return $visiteur;
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
				$req = $this->bdd->prepare('UPDATE visiteur SET Id_current_visite = :code WHERE Id_visiteur = :id');
				$idVisite = $this->bdd->lastInsertId();
				$req->execute(array(
					'id' => $newVisiteur->_id,
					'code' => $idVisite
					));
				$newVisiteur->_visite =  $idVisite;
				BDDLog::ajouterLigne("ARRIVEE",$newVisiteur);
				return $newVisiteur;
			}else{
				die("Erreur fatale lors de l'insertion");
			}
		}
	}

	public function retirerVisiteurWithCode($code)
	{
		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE code ="'.$code.'"');
		if($reponse->rowCount()==0 || $reponse->rowCount()>1)
			return false;
		foreach  ($reponse as $row) {
			$toto= $row['Id_visiteur'];
			$id_vis = $row['Id_current_visite'];
		}
		$req = $this->bdd->prepare('UPDATE visite SET HeureD = :heureD WHERE Id_visiteur = :id AND Id = :idv');
		$req->execute(array(
			'id' => $toto,
			'idv' => $id_vis,
			'heureD' => date('Y-m-d H:i:s',time())
			));
		$req = $this->bdd->prepare('UPDATE visiteur SET Id_current_visite = null ,code = NULL WHERE Id_visiteur = :id');
		$req->execute(array(
			'id' => $toto
			));
		return $reponse;
	}

	public function afficherVisiteur()
	{
		$reponse = $this->bdd->query('SELECT v.Nom AS Nom, v.Societe AS Societe, v.code AS code FROM visiteur v ORDER BY v.Code,v.Nom ASC');
		return $reponse;
	}

	public function afficherVisite()
	{
		$reponse = $this->bdd->query('SELECT v.Nom AS Nom, v.Societe AS Societe, v.code AS code, vi.HeureA AS HeureA,vi.HeureD AS HeureD, contact.Heure AS HeureContact,contact.Nom_user AS NomContact FROM visiteur v,visite vi LEFT JOIN contact on vi.Id = contact.Id_visite WHERE v.Id_visiteur = vi.Id_visiteur  ORDER BY v.Code,v.Nom,vi.HeureA DESC');
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

	public function addContact($visite,$nom){
		$user = $this->addUser($nom);
		$req = $this->bdd->prepare('INSERT INTO Contact(Id_visite,Nom_user,heure) VALUES(:visite,:nom,:heure)');
		$data = $req->execute(array(
			'visite' => $visite,
			'nom' => $user->_nom,
			'heure' => date('Y-m-d H:i:s',time())
			));
	}

}
?>
