<?php $titre = "Contacter" ?>

<?php ob_start(); ?>
<h1><b><Center>Contacter</Center></b></h1>


 
  <button type="submit" class="btn btn-default">Valider</button>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>