<?php 
require_once('autoload.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$conn = new connexionBDD();
if(isset($_GET["id_visite"]) && isset($_GET["nom_user"])){
	$reponse = $conn->addContact($_GET["id_visite"],$_GET["nom_user"]);
	//echo $_GET["nom_user"];
}

?>