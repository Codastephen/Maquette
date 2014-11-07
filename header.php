
  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
	<?php
		session_start();
		require('listeClient.php');
		$_SESSION['liste'] = new ListeClient();
	?>
 
