<?php
require_once("autoload.php");
session_start();

if(isset($_POST['mid'])){
	$idmsg = $_POST['mid'];

	$bdd = new connexionBDD();
	$reponse = $bdd->deleteMsg($idmsg);
}

?>