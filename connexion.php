<?php
require_once('Client.php');
require_once('ListeClient.php');

session_start();
 
$_SESSION['liste'] = new ListeClient();


$cli = new Client($_POST['nom'],$_POST['prenom'],$_POST['societe']);
$cli->toString();

$_SESSION['liste']->ajouter($cli);
$_SESSION['liste']->ajouter($cli);
$_SESSION['liste']->size();
?>