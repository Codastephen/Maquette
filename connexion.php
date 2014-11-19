<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once("autoload.php");
if(isset($_POST['type'])){
	if($_POST['type']=="admin"){
		if($_POST['password']=="toto"){
			$_SESSION['admin']=true;
			$_SESSION['infomsg'] = "Bienvenue maitre admin";
			$_SESSION['infotype'] = "success";
			header('Location:admin.php');
		}else{
			header('Location:connexionadmin.php');
		}
	}else{
		if(!empty($_POST['code'])){
			$bdd = new connexionBDD();
			$cli = $bdd->getClientCode($_POST['code']);
			$type = "RECONNEXION";
			$helper=1;
		}else {
			if(empty($_POST['nomprenom']) || empty($_POST['societe'])){
				$_SESSION['infomsg'] = "Erreur, champs incomplet";
				$_SESSION['infotype'] = "danger";
				header('Location: index.php');
				exit();
			}
			$cli = new Client($_POST['nomprenom'],$_POST['societe']);
			$conn = new connexionBDD();
			$cli = $conn->ajouterClient($cli);
			$type = "ARRIVEE";
			$helper=0;
		}
		$log = new BDDLog();
		$log->ajouterLigne($type,$cli);
		$_SESSION['client']=serialize($cli);
		header('Location: listeContact.php?helper='.$helper);
	}
}
?>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1">
		<h1 class="text-center">Déjà sur place?</h1>
		<p class="text-center"><i>Rentrez votre code dans le champ ci-dessous pour confirmer votre départ :</i></p>
		<form Action ='connexion.php' method ='post' role='form' act>
			<input type='hidden' id='type' name='type' value='visitor'>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<input type="text" class="form-control" id="code" name ="code" placeholder="Entrer votre code" autocomplete="off" required>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4">
					<button type='submit' class='btn btn-primary pull-right big' style="width:100%">Se reconnecter</button>
				</div>
			</div>
		</form>
	</div>

</div>