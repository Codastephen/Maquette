<?php $titre = "Formulaire" ?>

<?php ob_start(); ?>
<h1><b><Center>Veuillez indiquer votre présence</Center></b></h1>

<form Action ="connexion.php" method ="post" role="form" act>
  <div class="form-group">
    <label for="nom">Nom :</label>
    <input type="text" class="form-control" id="nom" name ="nom" placeholder="Entrer votre nom">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom :</label>
    <input type="text" class="form-control" id="prenom" name ="prenom" placeholder="Entrer votre prénom">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Société :</label>
    <input type="text" class="form-control" id="societe" name ="societe" placeholder="Entrer votre société">
  </div>
  
  <button type="submit" class="btn btn-default" onclick>Valider</button>
  <button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Retour</button> </br></br>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>