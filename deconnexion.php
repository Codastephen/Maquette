<?php
require_once("autoload.php");

session_start();
$id = $_GET['id'];
$_SESSION['liste']->suprimer($id);
?>
<button type="button" class="btn btn-default" onclick="self.location.href='selectconnexion.php'">Retour</button> </br></br>
