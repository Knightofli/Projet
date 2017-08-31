<form action="/profil/edit" method="post" name="edit_profil" enctype="multipart/form-data">
    <fieldset class="fieldset">
        <legend>Prénom :</legend>
            <input type="text" placeholder = "Votre prénom" name="membre_prenom" value="">
    </fieldset>
				
    <fieldset class="fieldset">
        <legend>Nom :</legend>
		<input type="text" placeholder ="Votre prenom" name="membre_nom" value="">
    </fieldset>

    <fieldset class="fieldset">
        <legend>Changer de mot de passe :</legend>
		<input type="password" placeholder ="Votre mot de passe" name="membre_password" value="">
    </fieldset>

    <fieldset class="fieldset">
        <legend>Confirmation du mot de passe :</legend>
		<input type="password" placeholder ="Votre mot de passe" name="password2" value="">
    </fieldset>

    <fieldset class="fieldset">
        <legend>Choisissez votre avatar :</legend>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        <input type="file" name="avatar" aria-describedby="passwordHelpText">
        <p class="help-text" id="passwordHelpText">(Taille max : 3Mo)</p>
	</fieldset>

    <fieldset class="fieldset">
        <legend>Signature :</legend>
		<textarea cols="40" rows="4" placeholder ="Signature" name="membre_signature" maxlength="150" aria-describedby="passwordHelpText"><?php echo $this->profil->membre_signature; ?></textarea>
        <p class="help-text" id="passwordHelpText">La signature apparaîtra après chacun de vos messages. 150 caractères maximun.</p>
    </fieldset>

	<input class="button primary" type="submit" name="edit_profil" value="Envoyer">
			
</form>