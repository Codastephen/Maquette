<?php 
require_once("autoload.php");
?>

<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<h1 class="text-center">Qui êtes-vous?</h1>
		<table id="tablevisitor" class="table table-hover table-striped">
			<thead>
				<tr>
					<th col-width=4>
						NomPrénom
					</th>
					<th col-width=2></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($_SESSION['liste']->_liste as $key=>$item) {
					echo "<tr> <td> ".$item->_nomprenom." </td> <td><button class='btn btn-success' style='opacity:0' onclick='$(this).next().show();$(this).fadeOut();'>Me déconnecter</button><a class='btn btn-danger btn-hidden' onclick='validate(".$key.")' style='vertical-align:middle'>Valider</a><td></tr>";
				}
				?>
			</tbody>
		</table>

	</div>
</div>
