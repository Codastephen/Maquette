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
	
	public function getAllForcedDisconnected(){
		$this->bdd->query("UPDATE visite SET HeureD = NOW() WHERE HeureA < NOW() AND HeureD = '0000-00-00 00:00'");
		$this->bdd->query("UPDATE visiteur SET Id_current_visite = NULL, code = null");
	}

	/**
	 * Permet d'ajouter un visiteur dans la BDD
	 * @param  Visiteur $visiteur représente le visiteur
	 * @return Visiteur le visiteur avec son ID dans la BDD
	 */
	public function ajouterVisiteur($visiteur)
	{
		$infoVisiteur = connexionBDD::IsVisiteurExistant($visiteur);
		if($infoVisiteur['id'] != null){
			//Le visiteur existe déjà ici
			$visiteur->_id=$infoVisiteur['id'];
			//Si le visiteur n'a pas de code, il est donc parti, il faut lui en générer un nouveau
			if($infoVisiteur['code'] == null){

				$visiteur->_code = $this->GenerateKey();
				$req = $this->bdd->prepare('UPDATE visiteur SET code = :code WHERE Id_visiteur = :id');
				$data = $req->execute(array(
					'id' => $visiteur->_id,
					'code' => $visiteur->_code
					));
				if($data){
					//Comme il est parti, il lui faut une nouvelle visite
					$req = $this->bdd->prepare('INSERT INTO Visite(Id_visiteur, HeureA) VALUES(:id, :heureA)');
					$data = $data = $req->execute(array(
						'id' => $visiteur->_id,
						'heureA' => date('Y-m-d H:i:s',$visiteur->_hArrive),
						));
					if($data){
						//On met à jour le visiteur pour qu'il connaisse l'id de sa visite actuelle
						$idVisite = $this->bdd->lastInsertId();
						$req = $this->bdd->prepare('UPDATE visiteur SET Id_current_visite = :code WHERE Id_visiteur = :id');
						$data = $req->execute(array(
							'id' => $visiteur->_id,
							'code' => $idVisite
							));
						if($data){
							$visiteur->_visite =  $idVisite;
							BDDLog::ajouterLigne("ARRIVEE",$visiteur);
						}else{
							die("Erreur fatale lors de la MAJ du visiteur. Impossible de mettre à jour la visite actuelle.");
						}
					}else{
						die("Erreur fatale lors de la création d'une visite.");
					}
				}else{
					die("Erreur fatale lors de la MAJ du visiteur. Impossible de mettre à jour le code du visiteur.");
				}
			}
			else{
				$visiteur->_code = $infoVisiteur['code'];
				$visiteur->_visite = $infoVisiteur['id_visite'];
			}

			return $visiteur;
		}else{
			//Le visiteur n'existe pas
			$req = $this->bdd->prepare('INSERT INTO visiteur(nom, societe,code) VALUES(:nom, :societe, :code)');
			$visiteur->_code = $this->GenerateKey();
			$data = $req->execute(array(
				'nom' => $visiteur->_nomprenom,
				'societe' => $visiteur->_societe,
				'code' => $visiteur->_code
				));
			if($data){

				//On lui créé une visite
				$visiteur->_id = $this->bdd->lastInsertId();
				$req = $this->bdd->prepare('INSERT INTO Visite(Id_visiteur, HeureA) VALUES(:id, :heureA)');
				$data = $req->execute(array(
					'id' => $visiteur->_id,
					'heureA' => date('Y-m-d H:i:s',$visiteur->_hArrive),
					));
				if($data){
					//On MAJ le visiteur pour qu'il connaisse l'id de sa visite actuelle
					$req = $this->bdd->prepare('UPDATE visiteur SET Id_current_visite = :code WHERE Id_visiteur = :id');
					$idVisite = $this->bdd->lastInsertId();
					$data = $req->execute(array(
						'id' => $visiteur->_id,
						'code' => $idVisite
						));
					if($data){
						$visiteur->_visite =  $idVisite;
						BDDLog::ajouterLigne("ARRIVEE",$visiteur);
						return $visiteur;
					}else{
						die("Erreur fatale lors de la MAJ du visiteur. Impossible de mettre à jour la visite actuelle.");
					}
				}else{
					die("Erreur fatale lors de la création d'une visite.");
				}
			}else{
				die("Erreur fatale lors de la création d'un visiteur.");
			}
		}
	}

	/**
	 * Vérifie si le visiteur existe dans la base
	 * @param User $visiteur Objet représentant le visiteur
	 */
	private function IsVisiteurExistant($visiteur){

		$req = $this->bdd->query('SELECT v.Id_visiteur AS Id_visiteur,
			v.code AS code,
			v.Id_current_visite as Id_visite 
			FROM visiteur v
			WHERE v.nom = "'.$visiteur->_nomprenom.'" AND v.societe = "'.$visiteur->_societe.'"');
		$count=0;
		$id_vis = null;
		$code_vis = null;
		$id_visite = null;
		foreach  ($req as $row) {
			$count+=1;
			$id_vis= $row['Id_visiteur'];
			$code_vis = $row['code'];
			$id_visite = $row['Id_visite'];
		}
		($count > 1)? $id_vis=null:'';
		$result = array('id'=>$id_vis,'code' => $code_vis,'id_visite' => $id_visite);
		return $result;
	}

	/**
	 * Retire un visiteur dans la base de données
	 * @param  int $code code du visiteur
	 */
	public function retirerVisiteur($code)
	{
		$infoVisiteur = ConnexionBDD::IsCodeExistant($code);
		if($infoVisiteur['id'] == null)
			return false;
		else{
			$req = $this->bdd->prepare('UPDATE visite SET HeureD = :heureD WHERE Id_visiteur = :id AND Id = :idv');
			$data = $req->execute(array(
				'id' => $infoVisiteur['id'],
				'idv' => $infoVisiteur['id_visite'],
				'heureD' => date('Y-m-d H:i:s',time())
				));
			if($data){
				$req = $this->bdd->prepare('UPDATE visiteur SET Id_current_visite = null ,code = NULL WHERE Id_visiteur = :id');
				$data = $req->execute(array(
					'id' => $infoVisiteur['id']
					));
				return true;
				if(!$data){
					return false;
				}
			}else{
				return false;
			}
		}
	}

	/**
	 * Vérifie si le code existe dans la base
	 * @param int $code Code représentant le visiteur
	 */
	private function IsCodeExistant($code){

		$reponse = $this->bdd->query('SELECT * FROM visiteur WHERE code ="'.$code.'"');
		if($reponse->rowCount()==0 || $reponse->rowCount()>1)
			$id_vis = null;
		$id_visite = null;
		foreach  ($reponse as $row) {
			$id_vis= $row['Id_visiteur'];
			$id_visite = $row['Id_current_visite'];
		}
		$result = array('id'=>$id_vis,'id_visite' => $id_visite);
		return $result;
	}

	/**
	 * Retourne tous les visiteurs
	 */
	public function getAllVisiteur()
	{
		$reponse = $this->bdd->query('SELECT v.Nom AS Nom, 
			v.Societe AS Societe, 
			v.code AS code 
			FROM visiteur v 
			ORDER BY v.Code,v.Nom ASC');
		return $reponse;
	}

	/**
	 * Retourne toutes les visites
	 */
	public function getAllVisite()
	{
		$reponse = $this->bdd->query('SELECT v.Nom AS Nom,
			v.Id_visiteur AS Id_visiteur,
			v.Societe AS Societe, 
			v.code AS code, 
			vi.HeureA AS HeureA,
			vi.HeureD AS HeureD, 
			contact.Heure AS HeureContact,
			contact.Nom_user AS NomContact 
			FROM visiteur v,visite vi LEFT JOIN contact on vi.Id = contact.Id_visite 
			WHERE v.Id_visiteur = vi.Id_visiteur  
			ORDER BY v.Code,v.Nom,vi.HeureA DESC');
		return $reponse;
	}

	/**
	 * Retourne toutes les visites non terminées
	 */
	public function getAllVisiteSecurity()
	{
		$reponse = $this->bdd->query('SELECT v.Nom AS Nom, 
			v.Societe AS Societe, 
			v.code AS code, 
			vi.HeureA AS HeureA,
			vi.HeureD AS HeureD, 
			contact.Heure AS HeureContact,
			contact.Nom_user AS NomContact 
			FROM visiteur v,visite vi LEFT JOIN contact on vi.Id = contact.Id_visite 
			WHERE v.Id_visiteur = vi.Id_visiteur 
			AND vi.HeureD =\'0000-00-00 00:00\' 
			ORDER BY v.Code,v.Nom,vi.HeureA DESC');
		return $reponse;
	}

	/**
	 * Retourne un visiteur à partir de son code
	 * @param  int $code code du visiteur
	 * @return User       visiteur créé
	 */
	public function getVisiteur($code){
		$reponse = $this->bdd->query('SELECT v.Id_visiteur AS Id_visiteur,
		v.Nom AS Nom,
		v.Societe AS Societe,
		v.code AS code
		FROM visiteur v
		WHERE code ="'.$code.'"');
		if($reponse->rowCount()>1 || $reponse->rowCount()==0)
			return false;
		$data = $reponse->fetch();
		$visiteur = new Visiteur($data['Nom'],$data['Societe']);
		$visiteur->_id = $data['Id_visiteur'];
		$visiteur->_code = $data['code'];				
		return $visiteur;
	}

	/**
	 * Génère une clé pour le visiteur
	 * @param integer $length taille de la clé à générer
	 */
	function GenerateKey($length = 4) {
		$key = '';
		for($i = 0; $i < $length; $i ++) {
			$key .= chr(mt_rand(48, 57));
		}
		return $key;
	}

	/**
	 * Ajoute un message dans la base
	 * @param Message $msg message a ajouter
	 */
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

	/**
	 * Met à jour un message
	 * @param  [type] $id    [description]
	 * @param  [type] $value [description]
	 * @param  [type] $debut [description]
	 * @param  [type] $fin   [description]
	 * @return [type]        [description]
	 */
	public function updateMsg($id,$value,$debut,$fin){
		$req = $this->bdd->prepare('UPDATE Message SET contenu = :value,datedebut =:debut, datefin = :fin WHERE id_message = :id');
		$data = $req->execute(array(
			'value' => $value,
			'id' => $id,
			'debut' => $debut,
			'fin' => $fin
			));
		return $this->bdd->query("SELECT contenu FROM Message WHERE id = ".$id);
	}

	/**
	 * Retourne tous les messages
	 * @return [type] [description]
	 */
	public function getAllMsg(){
		$reponse = $this->bdd->query("SELECT m.Id_message as id,
			m.contenu as message,
			m.datedebut as datedebut,
			m.datefin as datefin,
			m.nom as nom
			FROM Message m
			ORDER BY m.Id_message");
		return $reponse;
	}

	/**
	 * Supprime un message par son ID
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function deleteMsg($id){
		$reponse = $this->bdd->query("DELETE FROM Message WHERE Id_message=".$id);
		return $reponse;
	}

	/**
	 * Ajoute un utilisateur interne à l'entreprise
	 * @param String $nom nom de l'utilisateur
	 */
	public function addUser($nom){
		$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'"');
		if($reponse->rowCount()>1)
			die("Impossible d'ajouter l'utilisateur dans la base. Trop d'utilisateurs ont déjà le même nom");
		else if($reponse->rowCount()==1){
			$data = $reponse->fetch();
			return new User($data['nom'],$data['statut']);
		}else{
			$req = $this->bdd->prepare('INSERT INTO User(nom) VALUES(:nom)');
			$data = $req->execute(array(
				'nom' => $nom
				));
			if($data){
				$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'"');
				if($reponse->rowCount()!=1)
					die("Impossible de récupérer l'utilisateur dans la base. Trop d'utilisateurs ont déjà le même nom");
				else{
					$data = $reponse->fetch();
					return new User($data['nom'],$data['statut']);
				}
			}else{
				die("Erreur fatale lors de l'insertion d'un user");
			}
		}
	}

	/**
	 * Ajoute un utilisateur interne à l'entreprise Serre file
	 * @param String $nom nom de l'utilisateur
	 */
	public function addSerreFile($nom){
		$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'"');
		if($reponse->rowCount()>1)
			die("Impossible d'ajouter l'utilisateur serre file dans la base. Trop d'utilisateurs serre file ont déjà le même nom");
		else if($reponse->rowCount()==1){
			return ConnexionBDD::updateUser($nom,'SERREFILE');
		}else{
			$req = $this->bdd->prepare('INSERT INTO User(nom,statut) VALUES(:nom,"SERREFILE")');
			$data = $req->execute(array(
				'nom' => $nom
				));
			if($data){
				$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'" AND statut = "SERREFILE"');
				if($reponse->rowCount()!=1)
					die("Impossible d'ajouter l'utilisateur serre file dans la base. Trop d'utilisateurs serre file ont déjà le même nom");
				else{
					$data = $reponse->fetch();
					return new User($data['nom'],$data['statut']);
				}
			}else{
				die("Erreur fatale lors de l'insertion d'un user serrefile");
			}
		}
	}

	/**
	 * Ajoute un utilisateur interne à l'entreprise Serre file
	 * @param String $nom nom de l'utilisateur
	 */
	public function addMailHelper($nom){
		$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'"');
		if($reponse->rowCount()>1)
			die("Impossible d'ajouter l'utilisateur assistant dans la base. Trop d'utilisateurs assistant ont déjà le même nom");
		else if($reponse->rowCount()==1){
			return ConnexionBDD::updateUser($nom,'HELPER');
		}else{
			$req = $this->bdd->prepare('INSERT INTO User(nom,statut) VALUES(:nom,"HELPER")');
			$data = $req->execute(array(
				'nom' => $nom
				));
			if($data){
				$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'" AND statut = "HELPER"');
				if($reponse->rowCount()!=1)
					die("Impossible d'ajouter l'utilisateur assistant dans la base. Trop d'utilisateurs assistant ont déjà le même nom");
				else{
					$data = $reponse->fetch();
					return new User($data['nom'],$data['statut']);
				}
			}else{
				die("Erreur fatale lors de l'insertion d'un user assistant");
			}
		}
	}

	/**
	 * MAJ un utilisateur interne à l'entreprise Serre file
	 * @param String $nom nom de l'utilisateur
	 */
	public function updateUser($nom,$statut){
		$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'"');
		if($reponse->rowCount()>1 )
			die("Impossible de MAJ l'utilisateur dans la base. Trop d'utilisateurs ont déjà le même nom");
		else if($reponse->rowCount()==1){
			$req = $this->bdd->prepare('UPDATE User SET statut = :statut  WHERE  nom = :nom');
			$data = $req->execute(array(
				'nom' => $nom,
				'statut' => $statut
				));
			if($data){
				$reponse = $this->bdd->query('SELECT * FROM user WHERE nom ="'.$nom.'" AND statut = "'.$statut.'"');
				if($reponse->rowCount()!=1)
					die("Impossible de MAJ l'utilisateur dans la base. Trop d'utilisateurs ont déjà le même nom");
				else{
					$data = $reponse->fetch();
					return new User($data['nom'],$data['statut']);
				}
			}else{
				die("Erreur fatale lors de la MAJ d'un user");
			}
		}else{
			die("Impossible de MAJ l'utilisateur dans la base. L'utilisateur n'existe pas");
			
		}
	}

	/**
	 * Retourne tous les users serre file
	 * @return [type] [description]
	 */
	public function getAllSerreFile(){
		$reponse = $this->bdd->query("SELECT u.nom AS nom,
			u.statut AS statut
			FROM user u
			WHERE u.statut = 'SERREFILE'
			ORDER BY u.nom");
		return $reponse;
	}

	/**
	 * Ajoute un contact lync dans la base
	 * @param int $visite ID de la visite
	 * @param nom $nom    adresse mail de l'utilisateur concerné
	 */
	public function addContact($visite,$nom){
		$user = $this->addUser($nom);
		$req = $this->bdd->prepare('INSERT INTO Contact(Id_visite,Nom_user,heure) VALUES(:visite,:nom,:heure)');
		$data = $req->execute(array(
			'visite' => $visite,
			'nom' => $user->_nom,
			'heure' => date('Y-m-d H:i:s',time())
			));
		if(!$data){
			die("Erreur fatale lors de l'insertion.Impossible d'ajouter un contact.");
		}
	}

	/**
	 * Renvoit le mail du helper
	 */
	public function getMailHelper(){
		$req = $this->bdd->query("SELECT nom FROM user WHERE statut='HELPER'");
		if(!$req){
			die("Erreur fatale lors de l'insertion.Impossible d'ajouter un contact.");
		}
		return $req;
	}

}
?>
