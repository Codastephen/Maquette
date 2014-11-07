<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
 <body>
    <h1><b><Center>Veuillez indiquer votre présence</Center></b></h1>

	<form role="form">
  <div class="form-group">
    <label for="nom">Nom :</label>
    <input type="text" class="form-control" id="nom" placeholder="Entrer votre nom">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom :</label>
    <input type="text" class="form-control" id="prenom" placeholder="Entrer votre prénom">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Société :</label>
    <input type="text" class="form-control" id="societe" placeholder="Entrer votre société">
  </div>
 
  <button type="submit" class="btn btn-default">Valider</button>
  <button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Retour</button> </br></br>
</form>
	
	
    <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

  </body>
</html>
