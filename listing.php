<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('header.php'); ?>
	<title>Serre file</title>
</head>
<body>
	<?php
	require_once('autoload.php');
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(isset($_POST['password']) && $_POST['password'] == 'tutu'){
		echo '<script>window.print();</script> ';

	}else{
		header("Location: cerfil.php");
	}

	$conn = new connexionBDD();
	$reponse = $conn->getAllVisiteSecurity();
	ob_start(); 

	$oldcode="";
	$oldname = "";
	$oldsociete = "";
	echo "<h1 class='text-center'>Liste des visiteurs encore à l'intérieur des batiments</h1>
	<table id='tableVisite' class='table table-striped'>
	<thead>
	<th class='text-center'>Code</th>
	<th class='text-center'>Nom</th>
	<th class='text-center'>Société</th>
	<th class='text-center'>Jour d'arrivée</th>
	<th class='text-center'>Personne contactée</th>
	<th class='text-center'>Heure du contact</th>
	</thead>";
	$data_mailer = array('code'=>array(),
		'nom'=>array(),
		'societe'=>array(),
		'HeureA'=>array(),
		'Contact'=>array(),
		'HeureC'=>array());
	$size_mailer = array('nom'=>3,
		'societe'=>7,
		'HeureA'=>19,
		'Contact'=>14);
	while ($donnees = $reponse->fetch())
	{
		array_push($data_mailer['code'],$donnees['code']);
		array_push($data_mailer['nom'],($donnees['Nom']==$oldname?"":$donnees['Nom']));
		array_push($data_mailer['societe'],($donnees['Societe']==$oldsociete?"":$donnees['Societe']));
		array_push($data_mailer['HeureA'],date_format(date_create($donnees['HeureA']),"d/m/Y H:i:s"));
		array_push($data_mailer['Contact'],$donnees['NomContact']);
		array_push($data_mailer['HeureC'],($donnees['HeureContact']!=0?date_format(date_create($donnees['HeureContact']),"H:i:s"):""));
		
		if($size_mailer['nom'] < strlen($donnees['Nom']))
			$size_mailer['nom'] = strlen($donnees['Nom']);
		if($size_mailer['societe'] < strlen($donnees['Societe']))
			$size_mailer['societe'] = strlen($donnees['Societe']);
		if($size_mailer['Contact'] < strlen($donnees['NomContact']))
			$size_mailer['Contact'] = strlen($donnees['NomContact']);

		echo "<tr>".($donnees['code']==$oldcode?"<td class='code' width='10%' style='opacity:0'> ".$donnees['code']." </td>":"<td class='code' width='10%'> ".$donnees['code']." </td>").
		"<td width='15%'> ".($donnees['Nom']==$oldname?"":$donnees['Nom'])." </td>
		<td width='15%'> ".($donnees['Societe']==$oldsociete?"":$donnees['Societe'])." </td>
		<td width='15%'> ".date_format(date_create($donnees['HeureA']),"d/m/Y H:i:s")." </td>";
		$mail = $donnees['NomContact'];
		if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
			list($name) = split("@",$mail);
			$mail = "<a href='sip:".$mail."'>".$name."</a>";
		}

		echo"<td width='15%'> ".$mail." </td>
		<td width='15%'> ".($donnees['HeureContact']!=0?date_format(date_create($donnees['HeureContact']),"H:i:s"):"")." </td>
		<td class='no-padding' width='25%'>
		<form Action ='deconnexion.php' method ='post'>
		<input type='hidden' id='type' name='type' value='admin'>
		<input type='hidden' id='code' name='code' value='".$donnees['code']."'>
		<button type='submit' class='btn btn-danger pull-right big' style='display:none;width:100%'>Partir</a>
		</form>
		</td>
		</tr>";
		$oldcode = $donnees['code'];
		$oldname = $donnees['Nom'];
		$oldsociete = $donnees['Societe'];
	}
	echo "</table>";
	$listevisite = ob_get_clean();
	$mailer ="Code%09Nom";
	for($i = 3; $i < $size_mailer['nom'] ; $i++){
		$mailer .= "  ";
	}
	$mailer.="%09%09";
	$mailer.="Societe";
	for($i = 3; $i < $size_mailer['societe'] ; $i++){
		$mailer .= "  ";
	}
	$mailer .= "%09%09Heure d'arrivée%09%09%09Nom du contact";
	for($i = 3; $i < $size_mailer['Contact'] ; $i++){
		$mailer .= " ";
	}
	$mailer.="%09%09";
	$mailer.="Heure du contact%0A";
	for($j = 0 ; $j < count($data_mailer['code']) ; $j++ ){
		$mailer .= $data_mailer['code'][$j]. "%09".$data_mailer['nom'][$j];
		for($i = strlen($data_mailer['nom'][$j]); $i < $size_mailer['nom'] ; $i++){
			$mailer .= "  ";
		}
		$mailer .= "%09%09";
		$mailer .= $data_mailer['societe'][$j];
		for($i = strlen($data_mailer['societe'][$j]); $i < $size_mailer['societe']+3 ; $i++){
			$mailer .= "  ";
		}
		$mailer .= "%09%09";
		$mailer .= $data_mailer['HeureA'][$j]."%09%09";
		$mailer .= $data_mailer['Contact'][$j];
		for($i = strlen($data_mailer['Contact'][$j]); $i < $size_mailer['Contact']+3 ; $i++){
			$mailer .= "  ";
		}
		$mailer .= "%09%09";
		$mailer .= ($data_mailer['HeureC'][$j]!=0?date_format(date_create($data_mailer['HeureC'][$j]),"H:i:s"):"");
		$mailer .= "%0A";
	}
	$conn = new connexionBDD();
	$reponse = $conn->getAllSerreFile();
	$serrefile_mail = "";
	while ($donnees = $reponse->fetch()){
		$serrefile_mail .= $donnees['nom'].";";
	}
	?>
	<?php echo $listevisite ?>
	<script>
	MyWindow = window.open("mailto:<?php echo $serrefile_mail; ?>?subject=[ALERTE][SERRE-FILE] Liste des visiteurs présents dans les locaux&body=<?php echo $mailer ?>");
	MyWindow.close();
	</script>
</body>
</html>