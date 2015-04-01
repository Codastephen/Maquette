<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('header.php'); ?>
	<title>Serre file</title>
</head>
<body>
	<button class="btn btn-warning btn-lg" onclick="window.location='./index.php'">Retour à l'accueil de la borne</button>
	<?php
	require_once('autoload.php');
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(isset($_POST['password']) && $_POST['password'] == 'C3RFIL'){
		echo "<script>window.print()</script>";
		$conn = new connexionBDD();
		$reponse = $conn->getAllVisiteSecurity();
		ob_start(); 

		$oldcode="";
		$oldname = "";
		$oldsociete = "";
		echo "<h1 class='text-center'>Liste des visiteurs encore à l'intérieur des batiments</h1>
		<table id='tableVisite' class='table table-striped' style='text-align:center'>
		<thead>
		<th class='text-center'>Code</th>
		<th class='text-center'>Nom</th>
		<th class='text-center'>Société</th>
		<th class='text-center'>Jour d'arrivée</th>
		<th class='text-center'>Personne contactée</th>
		<th class='text-center'>Heure du contact</th>
		</thead>";
		while ($donnees = $reponse->fetch())
		{
			echo "<tr>".($donnees['code']==$oldcode?"<td class='code' width='10%' style='opacity:0'> ".$donnees['code']." </td>":"<td class='code' width='10%'> ".$donnees['code']." </td>").
			"<td width='15%'> ".($donnees['Nom']==$oldname?"":$donnees['Nom'])." </td>
			<td width='15%'> ".($donnees['Societe']==$oldsociete?"":$donnees['Societe'])." </td>
			<td width='15%'> ".date_format(date_create($donnees['HeureA']),"d/m/Y H:i:s")." </td>";
			$mail = $donnees['NomContact'];
			if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
				list($name) = explode("@",$mail);
				$mail = "<a href='sip:".$mail."'>".$name."</a>";
			}

			echo"<td width='15%'> ".$mail." </td>
			<td width='15%'> ".($donnees['HeureContact']!=0?date_format(date_create($donnees['HeureContact']),"H:i:s"):"")." </td>
			</tr>";
			$oldcode = $donnees['code'];
			$oldname = $donnees['Nom'];
			$oldsociete = $donnees['Societe'];
		}
		echo "</table>";
		$listevisite = ob_get_clean();
		$conn = new connexionBDD();
		$reponse = $conn->getAllSerreFile();
		$serrefile_mail = array();
		while ($donnees = $reponse->fetch()){
			array_push($serrefile_mail,$donnees['nom']);
		}
		$headers  = 'MIME-Version: 1.0' . "\r\n";
     	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		for($i = 0; $i < count($serrefile_mail);$i++){
			mail($serrefile_mail[$i],"[ALERTE][SERRE-FILE] Liste des visiteurs présents sur le site",$listevisite,$headers);
		}
		echo $listevisite;

	}else{
		$_SESSION['infomsg'] = "Mauvais code";
		$_SESSION['infotype'] = "danger";
		header("Location: cerfil.php");
	}

	?>

</body>
</html>