<?php $titre = "Plan d'évacuation";
require_once('autoload.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!$_SESSION['admin']){
	header('Location:connexionadmin.php');
}
$conn = new BDDLog();
$reponse = $conn->afficherLog();
$log = "";
while ($donnees = $reponse->fetch())
{
	$log .= $donnees['date']." ".$donnees['action']." ".$donnees['visiteur_nomprenom']." ".$donnees['visiteur_societe']."<br/>";
}

ob_start(); 
?>
<div class="row text-center">
	<h1>Interface d'administration</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<div class="tableresize" style="overflow-y:auto">
			<table class="table tablevisitor table-striped">
				<?php
				$conn = new connexionBDD();
				$reponse = $conn->afficherClient();

				while ($donnees = $reponse->fetch())
				{
					echo "<tr>
					<td width='75%'> ".$donnees['Nom']." </td>
					<td class='no-padding' width='25%'>
					<a href='validatedeconnexion.php?nomprenom=".$donnees['Nom']."&societe=".$donnees['Societe']."&type=admin' class='btn btn-danger pull-right big' style='display:none;width:100%'>Partir</a>
					</td>
					</tr>";
				}


				?>
			</table>
		</div>
	</div>
</div>
<?php $liste = ob_get_clean(); ?>

<?php require 'layoutadmin.php'; ?>