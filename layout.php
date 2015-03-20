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
		<?php echo $contenu ?>
	</div>
	<div id="keyboard-container">
		<ul id="keyboard_text" hidden>
            <li class="symbol"><span class="off">1</span></li>
            <li class="symbol"><span class="off">2</span></li>
            <li class="symbol"><span class="off">3</span></li>
            <li class="symbol"><span class="off">4</span></li>
            <li class="symbol"><span class="off">5</span></li>
            <li class="symbol"><span class="off">6</span></li>
            <li class="symbol"><span class="off">7</span></li>
            <li class="symbol"><span class="off">8</span></li>
            <li class="symbol"><span class="off">9</span></li>
            <li class="symbol lastitem"><span class="off">0</span></li>
            <li class="letter firstitem">a</li>
            <li class="letter">z</li>
            <li class="letter">e</li>
            <li class="letter">r</li>
            <li class="letter">t</li>
            <li class="letter">y</li>
            <li class="letter">u</li>
            <li class="letter">i</li>
            <li class="letter">o</li>
            <li class="letter">p</li>
            <li class="letter firstitem">q</li>
            <li class="letter">s</li>
            <li class="letter">d</li>
            <li class="letter">f</li>
            <li class="letter">g</li>
            <li class="letter">h</li>
            <li class="letter">j</li>
            <li class="letter">k</li>
            <li class="letter">l</li>
            <li class="letter lastitem">m</li>
            <li class="letter firstitem">w</li>
            <li class="letter">x</li>
            <li class="letter">c</li>
            <li class="letter">v</li>
            <li class="letter">b</li>
            <li class="letter">n</li>
            <li class="delete lastitem">Effacer</li>
            <li class="space lastitem">Espace</li>
        </ul>
        <ul id="keyboard_number" hidden>
            <li class="symbol"><span class="off">1</span></li>
            <li class="symbol"><span class="off">2</span></li>
            <li class="symbol lastitem"><span class="off">3</span></li>
            <li class="symbol firstitem"><span class="off">4</span></li>
            <li class="symbol"><span class="off">5</span></li>
            <li class="symbol lastitem"><span class="off">6</span></li>
            <li class="symbol firstitem"><span class="off">7</span></li>
            <li class="symbol"><span class="off">8</span></li>
            <li class="symbol lastitem"><span class="off">9</span></li>
            <li class="symbol firstitem center"><span class="off">0</span></li>
            <li class="delete firstitem">Effacer</li>
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- <script src="./js/jquery.mobile-1.4.5.min.js"></script> -->
    <script src="./js/bootstrap.js"></script>
    <script src="./js/layout.js"></script>
    <script src="./js/menu.js"></script>
    <script src="./js/table.js"></script>
    <script src="./js/timer.js"></script>
    <script src="./js/keyboard.js"></script>
    <script type='text/javascript' src='//cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js'></script>
    <script> </script>
</body>
</html>