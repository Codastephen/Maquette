<?php 
$titre = "Accueil";

require_once("autoload.php");
session_start();

// $linkdepart = '<div class="wrapper-img" style="background-image :url(\'./img/depart-gray.png\')"></div>';
$linkdepart = '<a href="#depart" aria-controls="depart" role="tab" data-toggle="tab">
<div class="col-xs-12 wrapper-img text-center">
<img src="./img/depart-logo.PNG" class="img-responsive">
<h3>Partir</h3>
</div>
</a>';
?>

<?php ob_start(); ?>
<div class="row">
	<div class="col-sm-2 no-padding border-white" role="tabpanel">
		<ul id="myTab" class="nav nav-stacked" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center active">
						<img src="./img/people_white.PNG" class="img-responsive">
						<h3>Accueil</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<a href="#signal" aria-controls="signal" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/people_white.PNG" class="img-responsive">
						<h3>Déjà sur place</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<?php echo $linkdepart ?>
			</li>
			<li role="presentation">
				<a href="#map" aria-controls="map" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/map-logo.PNG" class="img-responsive">
						<h3>Plan du site</h3>
					</div>
				</a>
			</li>
		</ul>

		<!-- Tab panes -->


	</div>
	<div class="col-sm-10 borderer">
		<div id="rowlogo" class="row" style="margin-top:50px">
			<div class="col-xs-8 col-xs-offset-2">
				<a href="index.php">
					<img src="./img/designal.png" class="img-responsive"/>
				</a>
			</div>
		</div>
		<!-- <video xmlns="http://www.w3.org/1999/xhtml" id="video" autoplay="autoplay" src=""></video>
		<p xmlns="http://www.w3.org/1999/xhtml">
<input type="button" id="buttonStart" value="Démarrer" onclick="start()" />
<input type="button" id="buttonStop" value="Arrêter" onclick="stop()" disabled="" />
</p> -->
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="home">
		<?php include 'home.php';?>
	</div>
	<div role="tabpanel" class="tab-pane" id="signal">
		<?php include 'connexion.php';?>
	</div>
	<div role="tabpanel" class="tab-pane" id="depart">
		<?php include 'deconnexion.php';?>
	</div>
	<div role="tabpanel" class="tab-pane" id="map">
		<?php include 'plan.php';?>
	</div>
</div>
</div>
</div>

<!-- <script xmlns="http://www.w3.org/1999/xhtml" type="text/javascript">//<![CDATA[
// "use strict";
// var video = document.getElementById('video');
// var canvas = document.getElementById('canvas');
// var videoStream = null;
// var preLog = document.getElementById('preLog');

// function log(text)
// {
// 	if (preLog) preLog.textContent += ('\n' + text);
// 	else alert(text);
// }

// function snapshot()
// {
// 	canvas.width = video.videoWidth;
// 	canvas.height = video.videoHeight;
// 	canvas.getContext('2d').drawImage(video, 0, 0);
// }

// function noStream()
// {
// 	log('L’accès à la caméra a été refusé !');
// }

// function stop()
// {
// 	var myButton = document.getElementById('buttonStop');
// 	if (myButton) myButton.disabled = true;
// 	myButton = document.getElementById('buttonSnap');
// 	if (myButton) myButton.disabled = true;
// 	if (videoStream)
// 	{
// 		if (videoStream.stop) videoStream.stop();
// 		else if (videoStream.msStop) videoStream.msStop();
// 		videoStream.onended = null;
// 		videoStream = null;
// 	}
// 	if (video)
// 	{
// 		video.onerror = null;
// 		video.pause();
// 		if (video.mozSrcObject)
// 			video.mozSrcObject = null;
// 		video.src = "";
// 	}
// 	myButton = document.getElementById('buttonStart');
// 	if (myButton) myButton.disabled = false;
// }

// function gotStream(stream)
// {
// 	var myButton = document.getElementById('buttonStart');
// 	if (myButton) myButton.disabled = true;
// 	videoStream = stream;
// 	log('Flux vidéo reçu.');
// 	video.onerror = function ()
// 	{
// 		log('video.onerror');
// 		if (video) stop();
// 	};
// 	stream.onended = noStream;
// 	if (window.webkitURL) video.src = window.webkitURL.createObjectURL(stream);
// 	else if (video.mozSrcObject !== undefined)
// 	{//FF18a
// 		video.mozSrcObject = stream;
// 		video.play();
// 	}
// 	else if (navigator.mozGetUserMedia)
// 	{//FF16a, 17a
// 		video.src = stream;
// 		video.play();
// 	}
// 	else if (window.URL) video.src = window.URL.createObjectURL(stream);
// 	else video.src = stream;
// 	myButton = document.getElementById('buttonSnap');
// 	if (myButton) myButton.disabled = false;
// 	myButton = document.getElementById('buttonStop');
// 	if (myButton) myButton.disabled = false;
// }

// function start()
// {
// 	if ((typeof window === 'undefined') || (typeof navigator === 'undefined')) log('Cette page requiert un navigateur Web avec les objets window.* et navigator.* !');
// 	else if (!(video)) log('Erreur de contexte HTML !');
// 	else
// 	{
// 		log('Demande d’accès au flux vidéo…');
// 		if (navigator.getUserMedia) navigator.getUserMedia({audio:true}, gotStream, noStream);
// 		else if (navigator.oGetUserMedia) navigator.oGetUserMedia({audio:true}, gotStream, noStream);
// 		else if (navigator.mozGetUserMedia) navigator.mozGetUserMedia({audio:true}, gotStream, noStream);
// 		else if (navigator.webkitGetUserMedia) navigator.webkitGetUserMedia({audio:true}, gotStream, noStream);
// 		else if (navigator.msGetUserMedia) navigator.msGetUserMedia({video:true, audio:false}, gotStream, noStream);
// 		else log('getUserMedia() n’est pas disponible depuis votre navigateur !');
// 	}
// }

// start();
// //]]></script>-->
<?php $contenu = ob_get_clean(); ?>


<?php require 'layout.php'; ?>