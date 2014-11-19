<?php 
require_once("autoload.php");
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_POST['code'])){
	$code = $_POST['code'];

	$bdd = new ConnexionBDD();
	$cli = $bdd->getClientCode($code);
	$result = $bdd->retirerClientWithCode($code);
	
	if(!$result){
		$_SESSION['infomsg'] = "Le code n'éxiste pas";
		$_SESSION['infotype'] = "danger";
		header("Location: index.php#depart");
	}else{
		$log = new BDDLog();
		$log->ajouterLigne("DEPART",$cli);

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
	<div class="col-xs-10 col-xs-offset-1">
		<h1 class="text-center">Qui êtes-vous?</h1>
		<p class="text-center"><i>Rentrez votre code dans le champ ci-dessous pour confirmer votre départ :</i></p>
		<form Action ='deconnexion.php' method ='post' role='form' act>
			<input type='hidden' id='type' name='type' value='visitor'>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<input type="text" class="form-control" id="code" name ="code" placeholder="Entrer votre code" autocomplete="off" required>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4">
					<button type='submit' class='btn btn-danger pull-right big' style="width:100%">Partir</button>
				</div>
			</div>
		</form>
	</div>
</div>
