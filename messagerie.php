<?php $titre = "Message" ?>
<?php require_once("autoload.php"); ?>
<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
} 

if(isset($_POST['message']) && isset($_POST['date']) && isset($_POST['heuredebut']) && isset($_POST['heurefin'])){
	if(empty($_POST['nomprenom'])){ 
			//Erreurs dans les champs
		$_SESSION['infomsg'] = "Erreur, champs incomplet";
		$_SESSION['infotype'] = "danger";
		header('Location: messagerie.php');
		exit();
	}
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
$bdd = new connexionBDD();
$reponse = $bdd->getAllMsg();
$msgCurrent="";
$msgOther="";
while ($donnees = $reponse->fetch())
{
	if(date('Y-m-d H:i:s')<$donnees['datedebut'])
		$msgOther .= "<p>".$donnees['message']."</p>";
	else if( date('Y-m-d H:i:s')>$donnees['datefin'])
		continue;
	else
		$msgCurrent .= "<p>".$donnees['message']."</p>";
}

?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Quel message voulez-vous envoyer?</h1>
</div>

<div class="row">
	<p>Actuellement affiché</p>
	<?php echo $msgCurrent ?>
	<p>Programmé pour plus tard</p>
	<?php echo $msgOther ?>
	<div class="col-xs-6 col-xs-offset-3">
		<form Action ="messagerie.php" method ="post" role="form" act>
			<div class="form-group">
				<label for="message">Message :</label>
				<input type="text" class="form-control" id="message" name ="message" required>
			</div>
			<div class="row">
				<div class="form-group col-xs-4">
					<label for="date">Date d'affichage :</label>
					<input class="inputdate" name="date" style="min-width:100%" type="date" value="<?php echo date('Y-m-d'); ?>"/>
				</div>
				<div class="form-group col-xs-4">
					<label for="heuredebut">Heure de début :</label>
					<input class="inputdate" name="heuredebut" style="min-width:100%" type="time" value="<?php echo date('H:i'); ?>"/>
				</div>
				<div class="form-group col-xs-4">
					<label for="heurefin">Heure de fin :</label>
					<input class="inputdate" name="heurefin" style="min-width:100%" type="time" value="<?php echo date('H:i'); ?>"/>
				</div>
			</div>
			
			<input type="hidden" name="type" value="admin">

			<div class="col-xs-4 col-xs-offset-4">
				<button type='submit' class='btn btn-success btn-lg ' style="width:100%">Valider</button>
			</div>
		</form>
	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>