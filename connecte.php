<?php $titre = "Accueil" ?>

<?php ob_start(); ?>
<div class="row text-center">
	<h1>Qui êtes-vous?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<table id="tablevisitor" class="table table-hover table-striped">
			<th col-width="1">
				Nom
			</th>
			<th col-width="2">
				Prénom
			</th>
			<th col-width="2">
				Société
			</th>
			<tr>
				<td>
					Coda	
				</td>
				<td>
					Stephen
				</td>
				<td>
					Designal Systems
				</td>
			</tr>
			<tr>
				<td>
					Coda	
				</td>
				<td>
					Stephen
				</td>
				<td>
					Designal Systems
				</td>
			</tr>
			<tr>
				<td>
					Coda	
				</td>
				<td>
					Stephen
				</td>
				<td>
					Designal Systems
				</td>
			</tr>
			<tr>
				<td>
					Coda	
				</td>
				<td>
					Stephen
				</td>
				<td>
					Designal Systems
				</td>
			</tr>
			<tr>
				<td>
					Coda	
				</td>
				<td>
					Stephen
				</td>
				<td>
					Designal Systems
				</td>
			</tr>
		</table>
		<a class="btn btn-default" href="presence.php">Retour</a>

	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>