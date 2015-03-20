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
	window.external.callLync(<?php echo "'".addslashes($visiteur->_nomprenom)."','".addslashes($visiteur->_societe)."','".addslashes($visiteur->_code)."','".addslashes($visiteur->_id)."','".addslashes($visiteur->_visite)."'" ?>)
}
</script>
<div class="row">
	<div class="col-xs-10 text-center col-xs-offset-1">
		<div  class="row" style="margin-top:50px">
			<div class="col-xs-8 col-xs-offset-2">
				<a href="index.php">
					<img src="./img/designal.png" class="img-responsive"/>								
				</a>	
			</div>
		</div>
		<h1>Bienvenue <?php echo $visiteur->_nomprenom ?></h1>	
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
				<!--<a href="./liste.php" class="btn btn-lg btn-success" style="width:100%;height:100px;padding-top:30px">-->
					Signaler sa présence
				</a>
			</div>
		</div>	
	</div>

</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>