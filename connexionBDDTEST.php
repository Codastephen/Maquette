<?php
require_once("autoload.php");

?>

<?php $titre = "Test connexion" ?>
<?php ob_start(); ?>
<div class="row text-center">
		<?php
			$cli = new connexionBDD();
		?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>  