<?php 
require_once 'autoload.php';
$titre = "Formulaire";
session_start();
ob_start(); 
?>

<div class="row text-center">
  <h1>Qui êtes-vous?</h1>
</div>

<div class="row">
  <div class="col-xs-6 col-xs-offset-3">
    <form Action ="connexion.php" method ="post" role="form" act>
      <div class="form-group">
        <label for="nomprenom">Nom Prénom :</label>
        <input type="text" class="form-control" id="nomprenom" name ="nomprenom" placeholder="Entrer votre nom prénom" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Société :</label>
        <input type="text" class="form-control" id="societe" name ="societe" placeholder="Entrer votre société" required>
      </div>
      <input type="hidden" name="type" value="visitor">

      <button type="submit" class="btn btn-success btn-lg">Valider</button>
      <a class="btn btn-danger btn-lg" href="selectconnexion.php">Retour</a>
    </form>
  </div>
</div>

		<?php
		$conn = new connexionBDD();
		$conn->afficherClient();
		?>
		
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>