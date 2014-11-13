<?php
require_once('autoload.php');

session_start();

if(isset($_POST['type'])){
	if($_POST['type']=="admin"){
		if($_POST['password']=="toto"){
			$_SESSION['admin']=true;
			header('Location:admin.php');
		}else{
			$_SESSION['admin']=false;
			header('Location:connexionadmin.php');
		}
	}else{
		$_SESSION['admin']=false;
		$cli = new Client($_POST['nomprenom'],$_POST['societe']);
		header('Location: listeContact.php?id='.$_SESSION['liste']->ajouter($cli));
	}
}
exit();
?>