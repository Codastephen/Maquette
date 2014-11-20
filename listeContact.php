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
	<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
		<div id="rowlogo" class="row" style="margin-top:50px">
			<div class="col-xs-8 col-xs-offset-2">
				<a href="index.php">
					<img src="./img/designal.png" class="img-responsive"/>
				</a>
			</div>
		</div>
		<div class="row">
			<p>Connecté en tant que <b><?php echo  $client->_nomprenom ?></b>  arrivé à <i><?php echo $client->_hArrive?></i> avec le code <?php echo $client->_code ?></p>
			<div class="col-sm-6">
				<div class="block-update-card status">
					<div class="v-status present"></div>
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
					<img class="media-object update-card-MDimentions pull-left" src="./img/people_black.png" alt="...">
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
		<a class="btn btn-lg btn-danger" href="index.php">
			Retour à l'accueil
		</a>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>