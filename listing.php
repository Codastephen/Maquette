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
	while ($donnees = $reponse->fetch())
	{
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
	$listevisite = ob_get_clean();
	?>
	<h1 class="text-center">Liste des visiteurs encore à l'intérieur des batiments</h1>
	<table id="tableVisite" class="table table-striped">
		<thead>
			<th class="text-center">Code</th>
			<th class="text-center">Nom</th>
			<th class="text-center">Société</th>
			<th class="text-center">Jour d'arrivée</th>
			<th class="text-center">Personne contactée</th>
			<th class="text-center">Heure du contact</th>
		</thead>
		<?php echo $listevisite ?>
	</table>
</body>
</html>