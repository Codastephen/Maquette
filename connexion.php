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
		$conn = new connexionBDD();
		$cli = new Client($_POST['nomprenom'],$_POST['societe']);
		$conn->ajouterClient($cli);
		
		header('Location: listeContact.php?id='.$_SESSION['liste']->ajouter($cli));
	}
}
exit();
?>