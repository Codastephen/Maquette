<?php
	$conn = new PDO('mysql:host=localhost;dbname=maquette', 'root', 'root');
	$data = $conn->query("SELECT c.Nom_user AS Nom_user, 
		v.Nom AS Nom_visiteur, 
		v.societe AS Societe,
		v.code AS code,
		vi.HeureA AS HeureA,
		c.Heure AS Heure_contact
		FROM contact c, visite vi, visiteur v 
		WHERE c.Id_visite = vi.Id 
		AND vi.Id_visiteur = v.Id_visiteur
		AND vi.HeureA < NOW() AND vi.HeureD = '0000-00-00 00:00'");
	while($d = $data->fetch()){
		if(filter_var($d["Nom_user"], FILTER_VALIDATE_EMAIL)){
			$headers  = 'MIME-Version: 1.0' . "\r\n";
     		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
     		$content = "Votre contact <b>".$d["Nom_visiteur"]."</b> de la société <b>".$d["Societe"]. "</b> n'a pas signalé son départ.";
     		$content .= "<br/><br/> Nous vous rappellons que pour des raisons de sécurité, il est obligatoire de signaler le départ de tous vos visiteurs lors de leurs venues dans les locaux.";
     		$content .= "<br/>Merci de bien vouloir sensibiliser vos visiteurs à bien signaler leur départ sur la borne grâce au code fourni.";
     		$content .= "<br/><br/>";
     		$content .= "<br/>Votre visiteur est maintenant considéré comme ayant quitté les locaux.";
     		$content .= "<br/><br/><br/>";
     		$content .= "Pour rappel, voici les informations sur votre visiteur :";
     		$content .= "<br/> <b>Nom :</b> ".$d["Nom_visiteur"];
     		$content .= "<br/> <b>Societe :</b> ".$d["Societe"];
     		$content .= "<br/> <b>Code de sortie :</b> ".$d["code"];
     		$content .= "<br/> <b>Heure d'arrivée :</b> ".date_format(date_create($d['HeureA']),"d/m/Y H:i:s");
     		$content .= "<br/> <b>Personne contactée :</b> ".$d["Nom_user"];
     		$content .= "<br/> <b>Heure du contact :</b> ".$d["Heure_contact"];
			mail($d["Nom_user"],"[Sécurité] Un visiteur vous ayant rendu visite n'a pas signalé son départ",$content,$headers);
		}
	}
	$conn->query("UPDATE visite SET HeureD = NOW() WHERE HeureA < NOW() AND HeureD = '0000-00-00 00:00'");
	$conn->query("UPDATE visiteur SET Id_current_visite = NULL, code = null");

?>