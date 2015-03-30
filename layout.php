<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('header.php'); ?>
	<title><?= $titre ?></title>
</head>
<body>
	<div class="container-fluid">
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
            <li class="letter firstitem">A</li>
            <li class="letter">Z</li>
            <li class="letter">E</li>
            <li class="letter">R</li>
            <li class="letter">T</li>
            <li class="letter">Y</li>
            <li class="letter">U</li>
            <li class="letter">I</li>
            <li class="letter">O</li>
            <li class="letter">P</li>
            <li class="letter firstitem">Q</li>
            <li class="letter">S</li>
            <li class="letter">D</li>
            <li class="letter">F</li>
            <li class="letter">G</li>
            <li class="letter">H</li>
            <li class="letter">J</li>
            <li class="letter">K</li>
            <li class="letter">L</li>
            <li class="letter lastitem">M</li>
            <li class="letter firstitem">W</li>
            <li class="letter">X</li>
            <li class="letter">C</li>
            <li class="letter">V</li>
            <li class="letter">B</li>
            <li class="letter">N</li>
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