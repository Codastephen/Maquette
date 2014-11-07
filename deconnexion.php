<?php
require_once("autoload.php");

session_start();
$_SESSION['liste']->suprimer(1);
?>
<button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Retour</button> </br></br>
