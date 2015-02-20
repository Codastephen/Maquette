<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('header.php'); ?>
	<title><?= $titre ?></title>
</head>
<body>
	<div class="container-fluid">
		<?php 
		if(isset($_SESSION['infomsg']) && isset($_SESSION['infotype'])){
			echo '<div class="row"><div id="alertbox" class="alert alert-'.$_SESSION['infotype'].' alert-dismissible fade in col-xs-10 col-xs-offset-2" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'
			.$_SESSION['infomsg'].'</div>
			</div>';
			unset($_SESSION['infomsg']);
			unset($_SESSION['infotype']);
		}	
		?>
		<div class="row">
			<div class="col-sm-2 no-padding border-white" role="tabpanel">
				<ul id="myTab" class="nav nav-stacked" role="tablist">
					<li role="presentation" class="active">
						<a href="#list" aria-controls="list" role="tab" data-toggle="tab">
							<div class="col-xs-12 wrapper-img text-center active">
								<img src="./img/id.png" class="img-responsive">
								<h3>Liste des visiteurs</h3>
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#visite" aria-controls="visite" role="tab" data-toggle="tab">
							<div class="col-xs-12 wrapper-img text-center">
								<img src="./img/id.png" class="img-responsive">
								<h3>Liste des visites</h3>
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#msg" aria-controls="msg" role="tab" data-toggle="tab">
							<div class="col-xs-12 wrapper-img text-center">
								<img src="./img/log.png" class="img-responsive">
								<h3>Messages</h3>
							</div>
						</a>
					</li>
					<li>
						<a href="admin.php?deco=true">
							<div class="col-xs-12 wrapper-img danger text-center">
								<img src="./img/leave.png" class="img-responsive">
								<h3>Déconnexion</h3>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10 borderer">
				<div id="rowlogo2" class="row" style="margin-top:50px">
					<div class="col-xs-8 col-xs-offset-2">
						<img src="./img/designal.png" class="img-responsive"/>
					</div>
				</div>
				<div class="tab-content">
					<div class="row text-center">
						<h1>Interface d'administration</h1>
					</div>
					<div role="tabpanel" class="tab-pane fade in active" id="list">
						<div class="text-center">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-primary active" onclick="filterTable('present')">
									<input type="radio" name="options" id="option1" autocomplete="off" checked ><i class="fa fa-taxi"></i> Présent sur les lieux
								</label>
								<label class="btn btn-primary" onclick="filterTable('nonpresent')">
									<input type="radio" name="options" id="option2" autocomplete="off"><i class="fa fa-bed"></i> Non-présent
								</label>
								<label class="btn btn-primary" onclick="filterTable('all')">
									<input type="radio" name="options" id="option3" autocomplete="off" ><i class="fa fa-cutlery"></i> Tous
								</label>
							</div>
							<div class="tableresize" style="overflow-y:auto">
								<table id="tableVisiteur" class="table tablevisitor table-striped">
									<thead>
										<th class="text-center">Code</th>
										<th class="text-center">Nom</th>
										<th class="text-center">Société</th>
									</thead>
									<?php echo $liste ?>
								</table>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade text-center" id="visite">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-primary active" onclick="filterTableVisite('present')">
								<input type="radio" name="options" id="option1" autocomplete="off" checked ><i class="fa fa-taxi"></i> Présent sur les lieux
							</label>
							<label class="btn btn-primary" onclick="filterTableVisite('nonpresent')">
								<input type="radio" name="options" id="option2" autocomplete="off"><i class="fa fa-bed"></i> Non-présent
							</label>
							<label class="btn btn-primary" onclick="filterTableVisite('all')">
								<input type="radio" name="options" id="option3" autocomplete="off" ><i class="fa fa-cutlery"></i> Tous
							</label>
						</div>
						<div class="tableresize" style="overflow-y:auto">
							<table id="tableVisite" class="table table-striped">
								<thead>
									<th class="text-center">Code</th>
									<th class="text-center">Nom</th>
									<th class="text-center">Société</th>
									<th class="text-center">Jour d'arrivée</th>
									<th class="text-center">Jour de départ</th>
									<th class="text-center">Personne contactée</th>
									<th class="text-center">Heure du contact</th>
								</thead>
								<?php echo $listevisite ?>
							</table>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="msg">
						<div class="tableresize" style="overflow-y:auto">
							<div class="tableresize" style="overflow-y:auto">
								<table id="tableMessage" class="table table-striped">
									<thead>
										<th class="text-center">Nom</th>
										<th class="text-center">Message</th>
										<th class="text-center">Date de début</th>
										<th class="text-center">Date de fin</th>
									</thead>
									<?php echo $msg ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- <script src="./js/jquery.mobile-1.4.5.min.js"></script> -->
	<script src="./js/bootstrap.js"></script>
	<script src="./js/layout.js"></script>
	<script src="./js/menu.js"></script>
	<script src="./js/table.js"></script>
	<script type="text/javascript">
	$("#tableVisiteur tbody tr").each(function(){
		if($(this).find('td.code').html()==0)
			$(this).hide();
	});
	</script>
	<script type="text/javascript">
	$("#tableVisite tbody tr").each(function(){
		if($(this).hasClass('absent'))
			$(this).hide();
	});
	</script>
</body>
</html>