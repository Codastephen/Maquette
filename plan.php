<?php $titre = "Plan d'évacuation" ?>

<?php ob_start(); ?>
<h1><b><Center>Plan d'évacuation</Center></b></h1>
<div class="row">
	<div class="col-xs-6 col-md-4 col-xs-offset-3 col-md-offset-4">
		<a href="#" class="thumbnail">
			<img src="./img/plan.jpg" alt="...">
		</a>
	</div>

</div>

<button type="button" class="btn btn-default" onclick="self.location.href='index.php'">Retour</button> </br></br>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>