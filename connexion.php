<?php
require_once('Client.php');

$cli = new Client($_POST['nom'],$_POST['prenom'],$_POST['societe']);
$cli->toString();

?>