<?php
require_once("autoload.php");

session_start();
$id = $_GET['id'];
$validate = $_GET['validate'];
if(isset($_GET['type']) && $_GET['type'] == 'admin'){
	$_SESSION['liste']->supprimer($id);
	header("Location: admin.php");
}else if($validate == "true"){
	$_SESSION['liste']->supprimer($id);
	header("Location: index.php");
}
?>