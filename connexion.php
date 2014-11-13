<?php
require_once('autoload.php');

session_start();

if(isset($_POST['type'])){
	if($_POST['type']=="admin"){
		if($_POST['password']=="toto"){
			header('Location:admin.php');
		}else{
			header('Location:connexionadmin.php');
		}
	}else{
		$cli = new Client($_POST['nom'],$_POST['prenom'],$_POST['societe']);
		header('Location: listeContact.php?id='.$_SESSION['liste']->ajouter($cli));
	}
}
exit();
?>