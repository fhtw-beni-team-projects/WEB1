<!-- TODO: Layout for signup or login paralell-->

<form method="post" action="?signup" class="popup" id="signup">
  <div class="formcontent">

    <p class="descr formleft">Anrede</p><select class="popup_input formright forminput" name="gender">
		<option value="male">Herr</option>
		<option value="female">Frau</option>
		<option value="divers">[diverse]</option>
	</select>

    <p class="descr formleft">Vorname</p><input class="popup_input formright forminput" type="text" name="firstname" />
    <p class="descr formleft">Nachname</p><input class="popup_input formright forminput" type="text" name="lastname" />

    <p class="descr formleft">E-Mail</p><input class="popup_input formright forminput" type="email" name="email" />

    <p class="descr formleft">Nutzername</p><input class="popup_input formright forminput" type="text" name="username" />

    <p class="descr formleft">Passwort</p><input class="popup_input formright forminput" type="password" name="pwd" placeholder="Gib ein Passwort ein" />

    <!-- TODO: make second password a dummy-->

    <p class="descr formleft">Nochmal Passwort</p><input class="popup_input formright forminput" type="password" name="pwd" placeholder="Wiederhole dein Passwort" />

    <button type="button" class="btn formleft" onclick="closeForm('login')"><i class="far fa-window-close"></i>&nbsp;Cancel</button>
    <button type="submit" class="btn formright" name="formaction"><i class="fas fa-sign-in-alt"></i>&nbsp;Signup</button>
    <input type="hidden" name="url" value=".$url." />


  </div>
</form>