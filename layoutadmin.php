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
							<div class="col-xs-12 wrapper-img-admin text-center active">
								<img src="./img/people_white.PNG" class="img-responsive">
								<h3>Liste des visiteurs</h3>
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#log" aria-controls="log" role="tab" data-toggle="tab">
							<div class="col-xs-12 wrapper-img-admin text-center">
								<img src="./img/people_white.PNG" class="img-responsive">
								<h3>Log</h3>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10 borderer">
				<div id="rowlogo" class="row" style="margin-top:50px">
					<div class="col-xs-8 col-xs-offset-2">
						<a href="index.php">
							<img src="./img/designal.png" class="img-responsive"/>
						</a>
					</div>
				</div>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="list">
						<?php echo $liste ?>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="log">
						<div class="tableresize" style="overflow-y:auto">
							<?php echo $log ?>
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
</body>
</html>