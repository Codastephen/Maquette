<?php
require_once('Client.php');
require_once('ListeClient.php');

session_start();
$_SESSION['liste']->size();


$cli = new Client($_POST['nom'],$_POST['prenom'],$_POST['societe']);
$cli->toString();

$_SESSION['liste']->ajouter($cli);
$_SESSION['liste']->ajouter($cli);
$_SESSION['liste']->size();
?>
<button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Retour</button> </br></br>
