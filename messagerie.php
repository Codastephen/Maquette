<?php require_once("autoload.php"); ?>
<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
} 

$titre = "Messagerie interne";
if(!isset($_SESSION['user'])){
	header('Location: connexionmessagerie.php');
	exit();
}
$user = unserialize($_SESSION['user']);
if(isset($_POST['message']) && isset($_POST['date']) && isset($_POST['heuredebut']) && isset($_POST['heurefin'])){
	if(empty($_POST['message'])){ 
			//Erreurs dans les champs
		$_SESSION['infomsg'] = "Erreur, champs incomplet";
		$_SESSION['infotype'] = "danger";
		header('Location: messagerie.php');
		exit();
	}
	$msg = new Message($user->_id,$_POST['message'],$_POST['date']." ".$_POST['heuredebut'],$_POST['date']." ".$_POST['heurefin']);
	$bdd= new ConnexionBDD();
	$bdd->addMsg($msg);
	if($bdd){
		$_SESSION['infomsg'] = "Message bien envoyé";
		$_SESSION['infotype'] = "success";
	}else{
		$_SESSION['infomsg'] = "Erreur lors de l'envoi";
		$_SESSION['infotype'] = "danger";
	}
	unset($_POST['message']);
}
$bdd = new connexionBDD();
$reponse = $bdd->getAllMsg();
$msgCurrent='<table class="table table-striped"><col width="20%"><col width="50%"><col width="30%">';
$msgOther='<table class="table table-striped"><col width="20%"><col width="50%"><col width="30%">';
$mymsg='<table class="table table-striped"><col width="50%"><col width="30%"><col width="20%">';
while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
{
	if(date('Y-m-d H:i:s')<$donnees['datedebut'])
		$msgOther .= "<tr><td>".$donnees['user_name']."</td><td>".$donnees['message']."</td><td>Le ".date('d-m-Y',strtotime($donnees['datedebut']))." de ".date('H:i',strtotime($donnees['datedebut']))." à ".date('H:i',strtotime($donnees['datefin']))."</td></tr>";
	else if( date('Y-m-d H:i:s')>$donnees['datefin'])
		continue;
	else
		$msgCurrent .= "<tr><td>".$donnees['user_name']."</td><td>".$donnees['message']."</td><td>Le ".date('d-m-Y',strtotime($donnees['datedebut']))." de ".date('H:i',strtotime($donnees['datedebut']))." à ".date('H:i',strtotime($donnees['datefin']))."</td></tr>";
	if($donnees['user_id']==$user->_id)
		$mymsg .= "<tr>
						<td><input class='texted' type='text' value='".$donnees['message']."' readonly='true' ondblclick='this.className = \"form-control\";this.readOnly=\"\";' onblur='this.className = \"texted\";this.readOnly=\"true\";savedata(".$donnees['id'].",this.value);'></td>
						<td>Le ".date('d-m-Y',strtotime($donnees['datedebut']))." de ".date('H:i',strtotime($donnees['datedebut']))." à ".date('H:i',strtotime($donnees['datefin']))."</td>
						<td>
							<a class='btn btn-success' role='group'>Modifier</a>
  							<a class='btn btn-danger' role='group'>Supprimer</a>
						</td>
					</tr>";
}
$msgCurrent.="</table>";
$msgOther.="</table>";
$mymsg.="</table>";
?>

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
			echo '<div class="row"><div id="alertbox" class="alert alert-'.$_SESSION['infotype'].' alert-dismissible fade in col-xs-12" role="alert">
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
						<a href="#listcurrent" aria-controls="list" role="tab" data-toggle="tab">
							<div class="col-xs-12 wrapper-img-user text-center active">
								<img src="./img/people_white.PNG" class="img-responsive">
								<h3>Messages en cours</h3>
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#listnext" aria-controls="log" role="tab" data-toggle="tab">
							<div class="col-xs-12 wrapper-img-user text-center">
								<img src="./img/people_white.PNG" class="img-responsive">
								<h3>Messages pour plus tard</h3>
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#mymsg" aria-controls="list" role="tab" data-toggle="tab">
							<div class="col-xs-12 wrapper-img-user text-center">
								<img src="./img/people_white.PNG" class="img-responsive">
								<h3>Gestion de vos messages</h3>
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
					<div class="col-xs-12">
						<form Action ="messagerie.php" method ="post" role="form" act>
							<div class="form-group col-xs-5">
								<label for="message">Message :</label>
								<input type="text" class="form-control" id="message" name ="message" required>
							</div>
							<div class="form-group col-xs-3">
								<label for="date">Date d'affichage :</label>
								<input class="inputdate" name="date" style="min-width:100%" type="date" value="<?php echo date('Y-m-d'); ?>"/>
							</div>
							<div class="form-group col-xs-2">
								<label for="heuredebut">Heure de début :</label>
								<input class="inputdate" name="heuredebut" style="min-width:100%" type="time" value="<?php echo date('H:i'); ?>"/>
							</div>
							<div class="form-group col-xs-2">
								<label for="heurefin">Heure de fin :</label>
								<input class="inputdate" name="heurefin" style="min-width:100%" type="time" value="<?php echo date('H:i'); ?>"/>
							</div>

							<input type="hidden" name="type" value="admin">
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 col-xs-offset-4">
								<button type='submit' class='btn btn-success btn-lg ' style="width:100%">Valider</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-content">
					<br/>
					<div role="tabpanel" class="tab-pane fade in active" id="listcurrent">
						<div class="tableresize" style="overflow-y:auto">
							<?php echo $msgCurrent ?>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="listnext">
						<div class="tableresize" style="overflow-y:auto">
							<?php echo $msgOther ?>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="mymsg">
						<div class="tableresize" style="overflow-y:auto">
							<?php echo $mymsg ?>
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