
<?php $titre = "Formulaire" ?>

<?php
  require_once 'autoload.php';
  session_start();
?>

<?php ob_start(); ?>

<div class="row text-center">
  <h1>Qui êtes-vous?</h1>
</div>

<div class="row">
  <div class="col-xs-6 col-xs-offset-3">
    <form Action ="connexion.php" method ="post" role="form" act>
      <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" id="nom" name ="nom" placeholder="Entrer votre nom" required>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name ="prenom" placeholder="Entrer votre prénom" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Société :</label>
        <input type="text" class="form-control" id="societe" name ="societe" placeholder="Entrer votre société" required>
      </div>

      <button type="submit" class="btn btn-success">Valider</button>
      <a class="btn btn-danger" href="selectconnexion.php">Retour</a>
    </form>
  </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>