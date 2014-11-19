<?php
require_once("autoload.php");
session_start();

$bdd = new connexionBDD();
$reponse = $bdd->getAllMsg();
$msg="";
while ($donnees = $reponse->fetch())
{
	if(date('Y-m-d H:i')<$donnees['datedebut'] || date('Y-m-d H:i')>$donnees['datefin'] )
		continue;

	$msg .= "<p>".$donnees['message']."</p>";
	$first = false;
}
echo $msg;
?>