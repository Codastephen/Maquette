<?php
require_once("autoload.php");
session_start();

$bdd = new connexionBDD();
$reponse = $bdd->getAllMsg();
$msg="<span>";
$first=true;
while ($donnees = $reponse->fetch())
{
	if(date('Y-m-d H:i:s')<$donnees['datedebut'] || date('Y-m-d H:i:s')>$donnees['datefin'])
		continue;
	$msg .= $donnees['message'];
	$msg .= "<span style='display:inline-block;width:30px'></span>";
}
echo $msg."</span>";
?>