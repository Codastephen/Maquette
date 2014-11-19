<?php $titre = "Message" ?>
<?php require_once("autoload.php"); ?>
<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
} 

if(isset($_POST['message']) && isset($_POST['date']) && isset($_POST['heuredebut']) && isset($_POST['heurefin'])){
	$msg = new Message(0,$_POST['message'],$_POST['date']." ".$_POST['heuredebut'],$_POST['date']." ".$_POST['heurefin']);
	$bdd= new ConnexionBDD();
	$bdd->addMsg($msg);
	if($bdd){
		$_SESSION['infomsg'] = "Message bien envoyé";
		$_SESSION['infotype'] = "success";
	}else{
		$_SESSION['infomsg'] = "Erreur lors de l'envoi";
		$_SESSION['infotype'] = "danger";
	}
	unset($_POST['message']);
}

?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Quel message voulez-vous envoyer?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<form Action ="messagerie.php" method ="post" role="form" act>
			<div class="form-group">
				<label for="message">Message :</label>
				<input type="text" class="form-control" id="message" name ="message" required>
			</div>
			<div class="form-group">
				Date d'affichage
				<input class="inputdate" name="date" type="date" value="<?php echo date('Y-m-d'); ?>"/>
			</div>
			<div class="form-group">
				Heure de début
				<input class="inputdate" name="heuredebut" type="time" value="<?php echo date('H:i'); ?>"/>
			</div>
			<div class="form-group">
				Heure de fin
				<input class="inputdate" name="heurefin" type="time" value="<?php echo date('H:i'); ?>"/>
			</div>
			<input type="hidden" name="type" value="admin">

			<button type="submit" class="btn btn-success btn-lg">Valider</button>
		</form>
	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>