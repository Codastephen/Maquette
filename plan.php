<?php $titre = "Plan d'évacuation" ?>

<?php ob_start(); ?>
<div class="row text-center">
  <h1>Plan d'évacuation</h1>
</div>

<div class="row">
  <div class="col-xs-6 col-xs-offset-3">
    <img src="./img/plan.jpg" alt="..." class="img-responsive">
    <a class="btn btn-lg btn-default pull-right" href="index.php">
			Retour
		</a>
  </div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>