<?php

$warenkorbscript = "<script>
					var array = [];
					var count = 0;
					
							document.getElementsByClassName(\"warenkorb\")[0].style.visibility = \"hidden\";
							document.getElementsByClassName(\"button\")[0].style.visibility = \"visible\";
					
		
					

					function jsfunc(code, name, prize) {
						array[count] = {code:code, name:name, prize:prize};
					
					document.getElementById(\"warenkorbhere\").innerHTML = document.getElementById(\"warenkorbhere\").innerHTML + \"<p style='float:left'>\" + array[count].name + \"</p><p style='float:right'>\" + array[count].prize + \"</p><br><br>\";
					document.getElementById(\"kk\").value = JSON.stringify(array);
						count = count + 1;
						
						document.getElementsByClassName(\"button\")[0].style.animation = \"shake 0.5s\";
						setTimeout(function(){
								document.getElementsByClassName(\"button\")[0].style.animation = \"none\";
							}, 500);
						
					}
					
					function expand() {
						if (document.getElementsByClassName(\"warenkorb\")[0].style.visibility == \"hidden\") {
							document.getElementsByClassName(\"warenkorb\")[0].style.visibility = \"visible\";
							document.getElementsByClassName(\"button\")[0].style.visibility = \"hidden\";
						} else {
							document.getElementsByClassName(\"warenkorb\")[0].style.visibility = \"hidden\";
							document.getElementsByClassName(\"button\")[0].style.visibility = \"visible\";
							
						}
					} 
					
				</script>";
				
				
$css = "<style>
.warenkorb {
	background: #2EAE9B;
	right: 1em;
	position: fixed; 
	border: 2px solid green;
    border-radius: 5px;
	overflow-y:scroll;
	height: 40%;
}
.button {
	background: #2EAE9B;
	right: 1em;
	position: fixed; 
	border: 2px solid green;
    border-radius: 5px;
	height: 5%;
	color: #fff;
}

.warenkorb h1 {
    font-size: 2rem;
    margin: 0;
    padding: 1em 1em 1em 1em;
	color: #fff;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}

</style>";


$warenkorb = "<div class=\"button\">
<p><button onclick=\"expand()\">+</button></p>
</div>
<div class=\"warenkorb\">
				<button onclick=\"expand()\">-</button>
				<h1>Warenkorb</h1>
				<hr>
				<p id=\"warenkorbhere\"></p>
				<form method=\"post\">
					<input type=\"text\" style=\"display:none\" name=\"kassensenden\" id=\"kk\" value=\"here\"> <!-- -->
					<input style=\"float:right\" type=\"submit\" value=\"Submit\">
				</form>
			</div>
			<div class=\"lefty\">";
			
$contactformone = "<form method='post'>
<input type='hidden' name='meta_subject' value='Lieferdienst Bestellung'>
<input type='hidden' name='meta_success' value='Deine Bestellung wurde erfolgreich übermittelt. Bitte bezahle jetzt über https://www.paypal.me oder Bar bei Lieferung'>
<input type='hidden' name='meta_failed' value='Deine Bestellung ist fehlgeschlagen. Bitte rufe uns stattdessen an.'>
<div class='form-group'>
   <label for='userdata_e-mail_addresse'>E-Mail Addresse</label>
   <input class='form-control' type='text' name='userdata_e-mail_addresse' required>
</div>
<input type='hidden' name='meta_mail' value='e-mail_addresse'>
<div class='form-group'>
   <label for='userdata_vorname'>Vorname</label>
   <input class='form-control' type='text' name='userdata_vorname' required>
</div>
<input type='hidden' name='meta_firstname' value='vorname'>
<div class='form-group'>
   <label for='userdata_nachname'>Nachname</label>
   <input class='form-control' type='text' name='userdata_nachname' required>
</div>
<input type='hidden' name='meta_lastname' value='nachname'>
<div class='form-group'>
   <label for='userdata_deine_adresse'>Deine Adresse</label>
   <input class='form-control' type='text' name='userdata_deine_adresse' required>
</div>
<div class='form-group'>
   <label for='userdata_telefonnummer'>Telefonnummer</label>
   <input class='form-control' type='text' name='userdata_telefonnummer' required>
</div>
<div class='form-group'>
   <label for='userdata_dein_paypalname'>Dein Paypalname</label>
   <input class='form-control' type='text' name='userdata_dein_paypalname'>
</div>
<div class='form-group'>
   <label for='userdata_besonderheiten'>Besonderheiten</label>
   <input class='form-control' type='text' name='userdata_besonderheiten'>
</div>
<div class='form-group' style=\"display:none\">
   <label for='userdata_bestellung'>Bestellung</label>
   <textarea class='form-control' rows='5' name='userdata_bestellung' required>";

$contactformtwo =   "</textarea>
</div>
<input type='hidden' name='meta_picomailsend' value='true'>
<input type='submit' class='btn btn-primary'>
</form>";


?>
