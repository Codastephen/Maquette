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
		<?php echo $contenu ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- <script src="./js/jquery.mobile-1.4.5.min.js"></script> -->
	<script src="./js/bootstrap.js"></script>
	<script src="./js/layout.js"></script>
	<script src="./js/menu.js"></script>
	<script src="./js/table.js"></script>
</body>
</html>