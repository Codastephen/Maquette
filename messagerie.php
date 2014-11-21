<?php require_once("autoload.php"); ?>
<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
} 


function validateDate($date, $format = 'd-m-Y H:i')
{
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

$titre = "Messagerie interne";
if(!isset($_SESSION['user'])){
	header('Location: connexionmessagerie.php');
	exit();
}
$user = unserialize($_SESSION['user']);
if(isset($_POST['message']) && isset($_POST['date']) && isset($_POST['heuredebut']) && isset($_POST['heurefin'])){
	if(empty($_POST['message']) && !isset($_SESSION['infomsg']) && !isset($_SESSION['infotype']) ){ 
		$_SESSION['infomsg'] = "Erreur, champs incomplet";
		$_SESSION['infotype'] = "danger";
		header('Location: messagerie.php');
		exit();
	}
	if(!validateDate($_POST['date']." ".$_POST['heuredebut']) || !validateDate($_POST['date']." ".$_POST['heurefin']) ){
		$_SESSION['infomsg'] = "Erreur dans les dates";
		$_SESSION['infotype'] = "danger";
		header('Location: messagerie.php');
		exit();
	}

	$msg = new Message($user->_id,$_POST['message'],
		date('Y-m-d H:i',strtotime($_POST['date']." ".$_POST['heuredebut'])),
		date('Y-m-d H:i',strtotime($_POST['date']." ".$_POST['heurefin'])));
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
		$mymsg .= "<tr id='tr".$donnees['id']."'>
	<td>".$donnees['message']."</td>
	<td>Le ".date('d-m-Y',strtotime($donnees['datedebut']))." de ".date('H:i',strtotime($donnees['datedebut']))." à ".date('H:i',strtotime($donnees['datefin']))."</td>
	<td>
	<a class='btn btn-success' role='group' onclick='prepareModal(\"tr".$donnees['id']."\")'>Modifier</a>
	<a class='btn btn-danger' role='group' onclick='prepareDelModal(\"".$donnees['id']."\")'>Supprimer</a>
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
	<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Supprimer un message</h4>
				</div>
				<div class="modal-body">
					Etes-vous sur?
					<input type="hidden" id="modaldeleteid" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
					<button type="button" class="btn btn-danger" onclick="deletemessage()">Supprimer</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Modifier un message</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="modalid" value="">
					<div class="row">
						<div class="form-group col-xs-12">
							<label for="message">Message :</label>
							<input type="text" class="form-control" id="modalmessage" name ="message" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-12">
							<p><b>Sélectionner l'horaire d'affichage</b></p>
							<div id="modaldivdate" class="input-group">
								<span class="input-group-addon">Le</span>
								<input required class="inputdate form-control" id="modaldate" style="min-width:60px" name="date" type="text" onfocus="this.className ='inputdate form-control' "/>
								<span class="input-group-addon">de</span>
								<input required class="inputdate form-control" id="modaldebut" style="min-width:110px" name="heuredebut" type="text" onfocus="this.className ='inputdate form-control' "/>
								<span class="input-group-addon">à</span>
								<input required class="inputdate form-control" id="modalfin" style="min-width:110px" name="heurefin" type="text" onfocus="this.className ='inputdate form-control' "/>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
					<button type="button" class="btn btn-success" onclick="if(validateInputDateTime('#modaldivdate')){savedata()}else{return false;}">Enregistrer</button>
				</div>
			</div>
		</div>
	</div>
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
					<div class="col-xs-12" style="margin-top:10px">
						<form Action ="messagerie.php" method ="post" role="form" act>
							<div class="form-group col-xs-5">
								<p><b>Rentrez ici votre message</b></p>
								<input type="text" class="form-control" id="message" name ="message" placeholder="Votre message" required>
							</div>
							<div class="form-group col-xs-7">
								<p><b>Sélectionner l'horaire d'affichage</b></p>
								<div id="divDate" class="input-group">
									<span class="input-group-addon">Le</span>
									<input id="newdate" required class="inputdate form-control" value="<?php echo date('d-m-Y')?>" style="min-width:150px" name="date" type="text" onfocus="this.className ='inputdate form-control' "/>
									<span class="input-group-addon">de</span>
									<input id="newtimedebut" required class="inputdate form-control" value="<?php echo date('H:i')?>" style="min-width:100px" name="heuredebut"type="text" onfocus="this.className ='inputdate form-control' "/>
									<span class="input-group-addon">à</span>
									<input id="newtimefin" required class="inputdate form-control" value="<?php echo date('H:i')?>" style="min-width:100px" name="heurefin" type="text" onfocus="this.className ='inputdate form-control' "/>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="col-xs-4 col-xs-offset-4">
									<button type='submit' class='btn btn-success btn-lg ' style="width:100%" onclick="return validateInputDateTime('#divDate');">Valider</button>
								</div>
							</div>
						</form>
					</div>
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
	<script src="js/input.js"></script>
	<script src="js/mask.js"></script>
</body>
</html>