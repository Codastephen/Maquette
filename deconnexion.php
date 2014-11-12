<?php
require_once("autoload.php");

session_start();
$id = $_GET['id'];
$_SESSION['liste']->suprimer($id);
header("Location: index.php");
?>