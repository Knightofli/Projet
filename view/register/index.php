
		<form action="/register" method="post" name="formulaire">
			<table >
				<tr>
					<td align="right">
					<label for="pseudo"> Pseudo : </label> 
					</td>
					<td>
					<input type="text" placeholder = "Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>" required  maxlength="20">
					</td>
				</tr>
				<tr> 
					<td align="right">
					<label for="mail"> Adresse mail : </label>
					</td>
					<td>
					<input type="email" placeholder ="Votre adresse mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;} ?>" required>
				</tr>
				<tr> 
					<td align="right">
					<label for="mail2"> Confirmation du mail : </label>
					</td>
					<td>
					<input type="email" placeholder ="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) {echo $mail2;} ?>" required>
				</tr>
				<tr> 
					<td align="right">
					<label for="password"> Mot de passe : </label>
					</td>
					<td>
					<input type="password" placeholder ="Votre mot de passe" id="password" name="password" value="" required>
				</tr>
				<tr> 
					<td align="right">
					<label for="password2"> Confirmation du mot de passe : </label>
					</td>
					<td>
					<input type="password" placeholder ="Confirmez votre mot de passe" id="password2" name="password2" value="" required>
				</tr>
			</table>
			<input class="button primary" type="submit" name="forminscription" value="Envoyer">
			
		</form>

