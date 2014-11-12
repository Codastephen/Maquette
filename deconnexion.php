<?php
require_once("autoload.php");

session_start();
$id = $_GET['id'];
$validate = $_GET['validate'];
if($validate == "true"){
	$_SESSION['liste']->supprimer($id);
	header("Location: index.php");
}
?>

<?php $titre = "Voulez-vous vraiment partir?" ?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Voulez-vous vraiment partir?</h1>
</div>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<?php
		echo "<p>Nom : ".$_SESSION['liste']->_liste[0]->_nom."</p>";
		echo "<p>Prénom : ".$_SESSION['liste']->_liste[0]->_prenom."</p>";

		echo "<a href='deconnexion.php?id=\'".$id."\'&validate=true' class='btn btn-danger'>Me déconnecter</a>";
		?>
		<a class="btn btn-default" href="index.php">Retour</a>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>