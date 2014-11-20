<?php
require_once("autoload.php");
session_start();

if(isset($_POST['mid']) || isset($_POST['mmsg'])|| isset($_POST['mdatedebut'])|| isset($_POST['mdatefin'])){
	$idmsg = $_POST['mid'];
	$newmsg = $_POST['mmsg'];
	$newdebut = $_POST['mdatedebut'];
	$newfin = $_POST['mdatefin'];

	$bdd = new connexionBDD();
	$reponse = $bdd->updateMsg($idmsg,$newmsg,$newdebut,$newfin);
	$msg="";
	while ($donnees = $reponse->fetch())
	{
		$msg .= $donnees['message'];
	}
}

?>