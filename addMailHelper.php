<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once("autoload.php");
if(isset($_POST['type']) && $_POST['type']=='admin'){
	if(isset($_POST['mail']) && !empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
		$conn = new connexionBDD();
		if($conn->addMailHelper($_POST['mail'])){
			$_SESSION['infomsg'] = "Assistant bien ajouté";
			$_SESSION['infotype'] = "success";
			header("Location:admin.php#serrefile");
		}
			
	}else{
		$_SESSION['infomsg'] = "Mail non valide";
		$_SESSION['infotype'] = "warning";
		header("Location:admin.php#serrefile");
	}
}else{
	$_SESSION['infomsg'] = "Vous n'êtes pas admin";
	$_SESSION['infotype'] = "danger";
	header("Location:admin.php#serrefile");
}
?>