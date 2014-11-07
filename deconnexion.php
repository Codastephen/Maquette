<?php
require_once("autoload.php");

session_start();
unset($_SESSION['liste'][0]);
$array = array_values($_SESSION['liste']);


?>
<button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Retour</button> </br></br>
