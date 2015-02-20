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
$conn = new BDDLog();
$reponse = $conn->afficherLog();
$log = "";
while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
{
	$log .= $donnees['date']." ".$donnees['action']." ".$donnees['nom']." ".$donnees['societe']."<br/>";
}
$conn = new connexionBDD();
$reponse = $conn->getAllVisiteur();
ob_start(); 

while ($donnees = $reponse->fetch())
{
	echo "<tr>
	<td class='code' width='15%'> ".$donnees['code']." </td>
	<td width='30%'> ".$donnees['Nom']." </td>
	<td width='30%'> ".$donnees['Societe']." </td>
	<td class='no-padding' width='25%'>
	<form Action ='deconnexion.php' method ='post'>
	<input type='hidden' id='type' name='type' value='admin'>
	<input type='hidden' id='code' name='code' value='".$donnees['code']."'>
	<button type='submit' class='btn btn-danger pull-right big' style='display:none;width:100%'>Partir</a>
	</form>
	</td>
	</tr>";
}
$liste = ob_get_clean();
$conn = new connexionBDD();
$reponse = $conn->getAllVisite();
ob_start(); 

$oldcode="";
$oldname = "";
$oldsociete = "";
while ($donnees = $reponse->fetch())
{
	echo "<tr>".($donnees['code']==$oldcode?"<td class='code' width='10%' style='opacity:0'> ".$donnees['code']." </td>":"<td class='code' width='10%'> ".$donnees['code']." </td>").
	"<td width='15%'> ".($donnees['Nom']==$oldname?"":$donnees['Nom'])." </td>
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
require 'layoutadmin.php'; 
?>