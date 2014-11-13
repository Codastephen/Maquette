<?php
require_once("autoload.php");

?>

<?php $titre = "Test connexion" ?>
<?php ob_start(); ?>
<div class="row text-center">
		<?php
			$conn = new connexionBDD();
			$cli = new Client('coda','Designal');
			$conn->ajouterClient($cli);
		?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>  