<?php
require_once("autoload.php");
session_start();

$bdd = new connexionBDD();
$reponse = $bdd->getAllMsg();
$msg="<p>";
$first=true;
while ($donnees = $reponse->fetch())
{
	if(date('Y-m-d H:i:s')<$donnees['datedebut'] || date('Y-m-d H:i:s')>$donnees['datefin'])
		continue;

	if(!$first)
		$msg.=" - ";
	$msg .= $donnees['message'];
	$first = false;
}
echo $msg."</p>";
?>