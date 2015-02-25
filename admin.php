<?php 
$titre = "Admin";
require_once('autoload.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_GET['deco']) && $_GET['deco']){
	unset($_SESSION['user']);
	unset($_SESSION['admin']);
}
if(!$_SESSION['admin']){
	header('Location:connexionadmin.php');
}
$conn = new connexionBDD();
$reponse = $conn->getAllMsg();
$msg = "";
while ($donnees = $reponse->fetch())
{
	$msg .= "<tr>";
	$msg .= "<td class='text-center'>".$donnees['nom']."</td>";
	$msg .= "<td class='text-center'>".$donnees['message']."</td>";
	$msg .= "<td class='text-center'>".$donnees['datedebut']."</td>";
	$msg .= "<td class='text-center'>".$donnees['datefin']."</td>";
	$msg .= "</tr>";
}

$conn = new connexionBDD();
$reponse = $conn->getAllVisite();
ob_start(); 

$oldcode=0;
$oldname = "";
$oldsociete = "";
while ($donnees = $reponse->fetch())
{
	if($donnees['code']==""){
		echo "<tr class='absent ".$donnees['Id_visiteur']."'>";
		if($donnees['Nom']==$oldname && $donnees['Societe']==$oldsociete){
			echo "<td class='code' width='10%' style='opacity:0'> ".$donnees['code']." </td>";
		}
		else{
			echo "<td class='multiple code' width='10%'>
			<span style='margin-right:20px' class='glyphicon glyphicon-minus-sign' onclick=\"HideTr(this,'".$donnees['Id_visiteur']."')\"></span>
			</td>";
		}

	}else{
		echo "<tr class='present ".$donnees['Id_visiteur']."'>";
		if($donnees['code']!=$oldcode){
			echo "<td class='multiple code' width='10%'>
			<span style='margin-right:20px' class='glyphicon glyphicon-minus-sign' onclick=\"HideTr(this,'".$donnees['Id_visiteur']."')\"></span>".$donnees['code']."
			</td>";
		}else
			echo "<td></td>";
		
	}

	echo "<td width='15%'> ".($donnees['Nom']==$oldname?"":$donnees['Nom'])." </td>
	<td width='15%'> ".($donnees['Societe']==$oldsociete?"":$donnees['Societe'])." </td>
	<td width='15%'> ".date_format(date_create($donnees['HeureA']),"d/m/Y H:i:s")." </td>
	<td width='15%'> ".($donnees['HeureD']!=0?date_format(date_create($donnees['HeureD']),"d/m/Y H:i:s"):"")." </td>";
	$mail = $donnees['NomContact'];
	if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
		list($name) = split("@",$mail);
		$mail = "<a href='sip:".$mail."'>".$name."</a>";
	}

	echo"<td width='15%'> ".$mail." </td>
	<td width='15%'> ".($donnees['HeureContact']!=0?date_format(date_create($donnees['HeureContact']),"H:i:s"):"")." </td>

	</tr>";
	$oldcode = $donnees['code'];
	$oldname = $donnees['Nom'];
	$oldsociete = $donnees['Societe'];
}
$listevisite = ob_get_clean();

$reponse = $conn->getAllSerreFile();
ob_start(); 

while ($donnees = $reponse->fetch())
{
	echo "<tr>
	<td width='15%'> ".$donnees['nom']." </td>
	<td width='30%'> ".$donnees['statut']." </td>
	<td class='no-padding' width='25%'>
	<form Action ='removeSerreFile.php' method ='post'>
	<input type='hidden' id='type' name='type' value='admin'>
	<input type='hidden' id='nom' name='nom' value='".$donnees['nom']."'>
	<button type='submit' class='btn btn-danger pull-right big' style='width:100%'>Ne plus être serre file</a>
	</form>
	</td>
	</tr>";
}
$serrefile = ob_get_clean();


require 'layoutadmin.php'; 
?>