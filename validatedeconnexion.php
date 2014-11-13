<?php
require_once("autoload.php");

session_start();
if(isset($_GET['nomprenom']) && isset($_GET['societe'])){
	$nomprenom = $_GET['nomprenom'];
	$societe = $_GET['societe'];

	$cli = new Client($nomprenom,$societe);
	$bdd = new ConnexionBDD();
	$bdd->retirerClient($cli);

	if(isset($_GET['type']) && $_GET['type'] == 'admin'){
		header("Location: admin.php");
	}else{
		header("Location: index.php");
	}
}else{
	header("Location: index.php");
}

?>