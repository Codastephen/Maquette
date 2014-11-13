<?php 
$titre = "Accueil";

require_once("autoload.php");
session_start();
$link = '<img src="./img/depart-gray.png" class="img-responsive"/>';
if(isset($_SESSION['liste'])){
	$size = count($_SESSION['liste']->_liste);

	if($size==0){
		$linkdepart = '<img src="./img/depart-gray.png" class="img-responsive"/>';
		$linkreco = '<img src="./img/resignal-gray.png" class="img-responsive"/>';
	}else{
		$linkdepart = '<a href="depart.php">
		<img src="./img/depart.png" class="img-responsive"/>
		</a>';
		$linkreco = '<a href="reconnexion.php">
		<img src="./img/resignal.png" class="img-responsive"/>
		</a>';
	}
}

?>

<?php ob_start(); ?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="row">
			<div class="col-sm-4">
				<a href="formulairePresence.php">
					<img src="./img/signal.png" class="img-responsive"/>
				</a>
			</div>
			<div class="col-sm-4">
				<?php echo $linkreco ?>
			</div>
			<div class="col-sm-4">
				<?php echo $linkdepart ?>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top : 5%">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="row">
			<div class="col-sm-5">
				<a href="plan.php">
					<img src="./img/map.png" class="img-responsive"/>
				</a>
			</div>
			<div class="col-sm-5 col-sm-offset-2">
				<a href="help.php">
					<img src="./img/help.png" class="img-responsive"/>
				</a>
			</div>	
		</div>
	</div>
</div>
<a href="connexionadmin.php">Admin</a>
<?php $contenu = ob_get_clean(); ?>


<?php require 'layout.php'; ?>