<?php $titre = "Plan d'évacuation";
require_once('autoload.php');
session_start();
if(!$_SESSION['admin']){
	echo "log";
}
ob_start(); 
?>
<div class="row text-center">
  <h1>Interface d'administration</h1>
</div>

<div class="row">
  <div class="col-xs-6 col-xs-offset-3">
    <table id="tablevisitor" class="table table-hover table-striped">
			<thead>
				<tr>
					<th col-width=4>
						Nom
					</th>
					<th col-width=4>
						Prénom
					</th>
					<th col-width=4>
						Société
					</th>
					<th col-width=2></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($_SESSION['liste']->_liste as $key=>$item) {
					echo "<tr>
							<td> ".$item->_nom." </td>
							<td> ".$item->_prenom." </td>
							<td> ".$item->_societe." </td>
							<td><a href='deconnexion.php?id=".$key."&validate=true&type=admin' class='btn btn-success'>Me déconnecter</a></td>
						</tr>";
				}
				?>
			</tbody>
		</table>
    <a class="btn btn-lg btn-default pull-right" href="index.php">
			Retour
		</a>
  </div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>