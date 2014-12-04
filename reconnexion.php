<div class="row">
	<div class="col-xs-10 col-xs-offset-1">
		<h1 class="text-center">Déjà sur place?</h1>
		<p class="text-center"><i>Rentrez votre code dans le champ ci-dessous pour vous reconnecter :</i></p>
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
					<button type='submit' class='btn btn-primary btn-lg ' style="width:100%">Se reconnecter</button>
				</div>
			</div>
		</form>
	</div>

</div>