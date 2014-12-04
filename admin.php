<?php 
$titre = "Admin";
require_once('autoload.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!$_SESSION['admin']){
	header('Location:connexionadmin.php');
}
$conn = new BDDLog();
$reponse = $conn->afficherLog();
$log = "";
while ($donnees = $reponse->fetch())
{
	$log .= $donnees['date']." ".$donnees['action']." ".$donnees['visiteur_nomprenom']." ".$donnees['visiteur_societe']."<br/>";
}

ob_start(); 
$conn = new connexionBDD();
$reponse = $conn->afficherClient();

while ($donnees = $reponse->fetch())
{
	echo "<tr>
	<td width='15%'> ".$donnees['code']." </td>
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
require 'layoutadmin.php'; 
?>