
<?php 
if(isset($_SESSION['infomsg']) && isset($_SESSION['infotype'])){
	echo '<br/><div id="alertbox" class="alert alert-'.$_SESSION['infotype'].' alert-dismissible fade in col-xs-6 col-xs-offset-3" role="alert">'
	.$_SESSION['infomsg'].'
	</div>';
	unset($_SESSION['infomsg']);
	unset($_SESSION['infotype']);
}	
?>