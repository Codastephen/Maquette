<div class="col-xs-10 col-xs-offset-1">
	<h1 class="text-center">Nouvel arrivant</h1>
	<p class="text-center"><i>Merci de bien vouloir renseigner les champs ci-dessous :</i></p>
	<form Action ="connexion.php" method ="post" role="form" act>
		<div class="form-group">
			<label for="exampleInputPassword1">Société :</label>
			<input type="text" class="form-control" id="societe" name ="societe" placeholder="Entrer votre société" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="nomprenom">Nom et prénom :</label>
			<input type="text" class="form-control" id="nomprenom" name ="nomprenom" placeholder="Entrer votre nom prénom" autocomplete="off" required>
		</div>
		<input type="hidden" name="type" value="newvisitor">

		<div class="row">
			<div class="col-xs-4 col-xs-offset-4">
				<button type='submit' class='btn btn-success btn-lg ' style="width:100%">Me connecter</button>
			</div>
		</div>
	</form>
</div>