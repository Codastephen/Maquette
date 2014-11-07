<?php $titre = "Présence" ?>

<?php ob_start(); ?>
<button type="button" class="btn btn-default" onclick="self.location.href='formulairePresence.php'"  >Signaler ma présence</button> </br></br>
	<button type="button" class="btn btn-default" onclick="self.location.href='connecte.php'">J'ai déjà signalé ma présence</button> </br></br>
	<button type="button" class="btn btn-default" onclick="self.location.href='index.php'">Retour</button> </br></br>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>