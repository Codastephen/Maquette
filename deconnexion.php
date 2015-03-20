<?php 
require_once("autoload.php");
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_POST['code'])){
	$code = $_POST['code'];

	$bdd = new ConnexionBDD();
	$result = $bdd->retirerVisiteur($code);
	
	if(!$result){
		$_SESSION['infomsg'] = "Le code n'éxiste pas".$result;
		$_SESSION['infotype'] = "danger";
		header("Location: index.php#leave");
	}else{
		BDDLog::ajouterLigne("DEPART",$cli);

		if(isset($_POST['type']) && $_POST['type'] == 'admin'){
			$_SESSION['infomsg'] = "Visiteur bien déconnecté";
			$_SESSION['infotype'] = "warning";
			header("Location: admin.php");
		}else{
			$_SESSION['infomsg'] = "Vous êtes bien déconnecté";
			$_SESSION['infotype'] = "warning";
			header("Location: index.php");
		}
	}
	
}

?>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1 text-center">
		<br/>
		<h1>Merci d'être venu chez Designal Systems</h1>
		<h2>Nous vous souhaitons un agréable retour</h2>
		<br/>
		<h4>Merci de saisir votre code à 4 chiffres pour confirmer votre départ</h4>
		<br/>
		<form Action ='deconnexion.php' method ='post' role='form' act>
			<input type='hidden' id='type' name='type' value='visitor'>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<input maxlength="4" type="number" class="form-control upperCase" id="code" name ="code" autocomplete="off" required>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4">
					<button type='submit' class='btn btn-danger btn-lg' style="width:100%">Me déconnecter</button>
				</div>
			</div>
		</form>
	</div>
</div>
