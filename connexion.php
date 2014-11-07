<?php
require_once('Client.php');
require_once('ListeClient.php');

session_start();
$cli = new Client($_POST['nom'],$_POST['prenom'],$_POST['societe']);
$_SESSION['liste']->ajouter($cli);   
 
header('Location: index.php');      
?>
<button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Retour</button> </br></br>
