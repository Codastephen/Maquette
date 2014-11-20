<?php
require_once("autoload.php");
session_start();

if(isset($_POST['id']) || isset($_POST['value'])){
	$idmsg = $_POST['id'];
	$newmsg = $_POST['value'];


	$bdd = new connexionBDD();
	$reponse = $bdd->updateMsg($idmsg,$newmsg);
	$msg="";
	while ($donnees = $reponse->fetch())
	{
		$msg .= $donnees['message'];
	}
	echo $msg;
}

?>