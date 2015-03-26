<div class="col-xs-10 col-xs-offset-1">
	<br/>
	<h1 class="text-center">Bienvenue</h1>
	<h4 class="text-center">Afin de mieux vous aider, merci de bien vouloir remplir les champs ci-dessous</h4>
	<br/><br/>
	<form Action ="connexion.php" method ="post" role="form" act>
		<div class="form-group">
			<label for="exampleInputPassword1">Société :</label>
			<input maxlength="30" type="text" class="form-control borne" id="societe" name ="societe" placeholder="Entrer votre société" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="nomprenom">Nom et prénom :</label>
			<input maxlength="30" type="text" class="form-control borne" id="nomprenom" name ="nomprenom" placeholder="Entrer votre nom prénom" autocomplete="off" required>
		</div>
		<input type="hidden" name="type" value="newvisitor">

		<div class="row">
			<div class="col-xs-4 col-xs-offset-4">
				<button type='submit' class='btn btn-success btn-lg ' style="width:100%">Me connecter</button>
			</div>
		</div>
	</form>
</div>