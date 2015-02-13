<?php 
$titre="Liste contact";
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once("autoload.php");
if(!isset($_SESSION['visiteur'])){
	$_SESSION['infomsg'] = "Erreur, vous n'êtes pas identifié et ne pouvez accéder à cette page";
	$_SESSION['infotype'] = "danger";
	header('Location: index.php');
	exit();
}
$visiteur = unserialize($_SESSION['visiteur']);
?>
<?php ob_start(); ?>
<script type="text/javascript">
function showLync(){
	window.external.littleMe(<?php echo "'".$visiteur->_nomprenom."','".$visiteur->_societe."','".$visiteur->_code."'" ?>)
}
</script>
<div class="row">
	<div class="col-xs-10 text-center col-xs-offset-1">
		<div id="rowlogo" class="row" style="margin-top:50px">
			<div class="col-xs-8 col-xs-offset-2">
				<a href="index.php">
					<img src="./img/designal.png" class="img-responsive"/>								
				</a>	
			</div>
		</div>
		<p>Votre code est :</p>
		<h1><?php echo $visiteur->_code ?></h1><br/>
		<p>Notez le bien!<br/>Il vous sera demandé lors de votre départ de notre établissement</p>
		<br/><br/><br/><br/>
		<div class="col-xs-4 col-xs-offset-1 no-padding">
			<div class="text-center">
				<a class="btn btn-lg btn-danger" href="index.php" style="width:100%;height:100px;padding-top:30px">
					Retour à l'accueil
				</a>
			</div>
		</div>	
		<div class="col-xs-4 col-xs-offset-2 no-padding">
			<div class="text-center">
				<a class="btn btn-lg btn-success" style="width:100%;height:100px;padding-top:30px" onclick="showLync()">
					Signaler sa présence
				</a>
			</div>
		</div>	
	</div>

</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>