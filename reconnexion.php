<div class="row">
	<div class="col-xs-10 col-xs-offset-1">
		<br/>
		<h1 class="text-center">Vous souhaitez recontacter un membre de notre entreprise?</h1>
		<h4 class="text-center">Merci de ressaisir votre code à 4 chiffres pour accéder à l'espace contact</h4>
		<br/><br/>
		<form Action ='connexion.php' method ='post' role='form' act>
			<input type='hidden' id='type' name='type' value='reco'>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<input type="number" class="form-control upperCase" id="code" name ="code" autocomplete="off" required>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4">
					<button type='submit' class='btn btn-primary btn-lg ' style="width:100%">Me reconnecter</button>
				</div>
			</div>
		</form>
	</div>

</div>