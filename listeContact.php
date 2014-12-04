<?php 
$titre="Liste contact";
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once("autoload.php");

$client = unserialize($_SESSION['client']);
?>
<?php ob_start(); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Notification importante!</h4>
			</div>
			<div class="modal-body text-center">
				<p>Votre code est :</p>
				<h1><?php echo $client->_code ?></h1><br/>
				<p>Notez le bien!<br/>Il vous sera demandé lors de votre départ de notre établissement</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Je l'ai bien noté</button>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-2 no-padding border-white">
		<div class="text-center">
			<a class="btn btn-lg btn-danger" href="index.php" style="width:100%;height:100px;padding-top:30px">
				Retour à l'accueil
			</a>
		</div>
		<p style="margin-left:5px">
			<blockquote>
                <p><?php echo  $client->_nomprenom ?></p>
                <small><cite title="Source Title"><?php echo date('H:i d/m/Y',strtotime($client->_hArrive))?>  <i class="glyphicon glyphicon-calendar"></i></cite></small>
            </blockquote>
			Bienvenue<br/>
			<b><?php echo  $client->_nomprenom ?></b> <?php echo $client->_code ?><br/>
			arrivé à <i><?php echo $client->_hArrive?></i>
		</p>
		<ul class="nav nav-pills nav-stacked padded" role="tablist">
			<li role="presentation" class="active">
				<a href="#informatique" aria-controls="home" role="tab" data-toggle="tab">
					<span class="badge pull-right">14</span>
					Informatique
				</a>
			</li>
			<li role="presentation">
				<a href="#comptabilite" aria-controls="profile" role="tab" data-toggle="tab">
					<span class="badge pull-right">4</span>
					Comptabilité
				</a>
			</li>
			<li role="presentation">
				<a href="#direction" aria-controls="messages" role="tab" data-toggle="tab">
					<span class="badge pull-right">1</span>
					Direction
				</a>
			</li>
			<li role="presentation">
				<a href="#atelier" aria-controls="settings" role="tab" data-toggle="tab">
					<span class="badge pull-right">10</span>
					Atelier
				</a>
			</li>
		</ul>
	</div>
	<div class="col-sm-10">
		<div id="rowlogo" class="row" style="margin-top:50px">
			<div class="col-xs-8 col-xs-offset-2">
				<a href="index.php">
					<img src="./img/designal.png" class="img-responsive"/>								
				</a>	

			</div>
		</div>
		<div id="listing" class="tab-content" style="overflow-y:auto">
			<div role="tabpanel" class="tab-pane active col-xs-12" id="informatique">
				<div class="row">
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 1</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
				<div class="row">
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 1</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
				<div class="row">
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 1</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
				<div class="row">
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 1</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
				<div class="row">
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 1</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
				<div class="row">
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 1</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
				<div class="row">
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 1</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
					<div class="block-update-card status col-sm-4">
						<div class="v-status present"></div>
						<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
						<div class="update-card-body">
							<div class="col-sm-8">
								<h4>Informatique 2</h4>
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
			<div role="tabpanel" class="tab-pane" id="comptabilite">

			</div>
			<div role="tabpanel" class="tab-pane" id="direction">

			</div>
			<div role="tabpanel" class="tab-pane" id="atelier">

			</div>
		</div>
	</div>

</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>