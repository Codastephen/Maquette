<?php 
$titre = "Liste des contacts";
require_once("autoload.php");
session_start();
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	header("Location: index.php");
}
$id = $_GET['id'];
$visitor = $_SESSION['liste']->getItem($id);
?>
<?php ob_start(); ?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		
		<div class="row">
			<p>Connecté en tant que <b><?php echo $visitor->_nom ?></b> <b><?php echo $visitor->_prenom ?></b> de la société <b><?php echo $visitor->_societe ?></b></p>
			<div class="col-sm-6">
				<div class="block-update-card status">
					<div class="v-status present"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
				<div class="block-update-card status">
					<div class="v-status away"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
				<div class="block-update-card status">
					<div class="v-status disturb"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
				<div class="block-update-card status">
					<div class="v-status present"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="block-update-card status">
					<div class="v-status present"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
				<div class="block-update-card status">
					<div class="v-status away"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
				<div class="block-update-card status">
					<div class="v-status disturb"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
				<div class="block-update-card status">
					<div class="v-status away"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people.png" alt="...">
					<div class="update-card-body">
						<div class="col-sm-8">
							<h4>Vinothbabu K</h4>
							<p>
								Voici mon statut.
							</p>
						</div>
						<div class="col-sm-1">
							<span class="glyphicon glyphicon-comment"></span>
							<span class="glyphicon glyphicon-earphone" style="margin-top:10px"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top : 1%">
	<div class="col-sm-6 col-sm-offset-3 text-center">
		<a class="btn btn-lg btn-default" href="index.php">
			Retour à l'accueil
		</a>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>