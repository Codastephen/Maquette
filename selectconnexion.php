<?php 
$titre = "Présence";

require_once("autoload.php");
session_start();
$size = count($_SESSION['liste']->_liste);

if($size==0){
	$link = '<img src="./img/resignal-gray.png" class="img-responsive"/>';
}else{
	$link = '<a href="reconnexion.php">
	<img src="./img/resignal.png" class="img-responsive"/>
	</a>';
}
ob_start(); 
?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="row">
			<div class="col-sm-5">
				<a href="formulairePresence.php">
					<img src="./img/signal.png" class="img-responsive"/>
				</a>
			</div>
			<div class="col-sm-5 col-sm-offset-2">
				<?php echo $link ?>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top : 5%">
	<div class="col-sm-6 col-sm-offset-3 text-center">
		<a class="btn btn-lg btn-default" href="index.php">
			Retour
		</a>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>