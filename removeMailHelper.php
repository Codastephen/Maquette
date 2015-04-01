<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once("autoload.php");
if(isset($_POST['type']) && $_POST['type']=='admin'){
	if(isset($_POST['nom']) && !empty($_POST['nom'])){
		$conn = new connexionBDD();
		if($conn->updateUser($_POST['nom'],'MEMBRE')){
			$_SESSION['infomsg'] = "Assistant bien retiré";
			$_SESSION['infotype'] = "success";
			header("Location:admin.php#serrefile");
		}
			
	}else{
		$_SESSION['infomsg'] = "Utilisateur non valide";
		$_SESSION['infotype'] = "warning";
		header("Location:admin.php#serrefile");
	}
}else{
	$_SESSION['infomsg'] = "Vous n'êtes pas admin";
	$_SESSION['infotype'] = "danger";
	header("Location:admin.php#serrefile");
}
?>