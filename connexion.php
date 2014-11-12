<?php
require_once('autoload.php');

session_start();

$cli = new Client($_POST['nom'],$_POST['prenom'],$_POST['societe']);
header('Location: listeContact.php?id='.$_SESSION['liste']->ajouter($cli));

exit();
?>