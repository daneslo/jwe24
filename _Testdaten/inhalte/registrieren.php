<?php

$succes = false;
$fehlermeldungen = array();

if (!empty($_POST))
{
	if(empty($_POST["benutzername"])){
		$fehlermeldungen[] ="Bitte geben Sie Ihre Benutzername an";
	} else if (!preg_match('/^[a-zA-Z0-9.]+$/', $_POST["benutzername"])) {
		$fehlermeldungen[] ="Ungültige Zeichen im Benutzernamen gefunden!";
	} else if (strlen($_POST["benutzername"]) <= 4){
		$fehlermeldungen[] = "Ihre Benutzername ist bestimmt länger.";
	}

	if(empty($_POST["passwort"])) {
        $fehlermeldungen[] = "Bitte geben Sie Ihren Passwort an";
    } elseif (preg_match('/^[!*%&]+[a-zA-Z0-9.]+$/', $_POST["passwort"] ) ) {
		$fehlermeldungen[] = "";
	}else if (strlen($_POST["passwort"]) <= 6){
		$fehlermeldungen[] = "Ihre Passwort ist zu kurz.";
    } 

	if(empty($_POST["email"])) {
        $fehlermeldungen[] = "Bitte geben Sie Ihren E-mail Adresse an";
    } else if (! preg_match("/^[a-z0-9]+@[a-z0-9]+\.[a-z]{2,15}$/", $_POST["email"] ) ) {
        $fehlermeldungen[] = "Bitte geben Sie Ihren E-mail Adresse";
    }

	if (empty ($_POST["agb"])) {
        $fehlermeldungen[] = "Bitte das AGB gehack an.";
    }

	//wenn keine fehler aufgetreten sind
	if (empty($fehlermeldungen)) {
        $succes = true;

			$inhalt = "Registrierung:

			Benutzername: {$_POST["benutzername"]}
			Email: {$_POST["email"]}
			Passwort: {$_POST["passwort"]}
			";


			//Anfrage in Datein am Server Speichern (als backup)
			$dateiname = "registrierung".date("Y-m-d_H-i-s"); //(TIMESTEMP) 
			file_put_contents("registrierungen/{$dateiname}.txt", $inhalt);

		}
}


?>

<div class='wrapper'>
	<div class='row'>
		<div class='col-xs-12'>
			<h1>Registrierung</h1>
		</div>
	</div>
	<?php
	//aufgetrentene fehler der reihe nach ausgeben
	if(!empty($fehlermeldungen)) {
		echo "<strong>Folgende Fehler sind aufgetreten: </strong></br>"; 
		echo "<ul>";
		foreach ($fehlermeldungen as $fehlermeldung){
			echo "<li>.$fehlermeldung.</li>";
		}
		echo "</ul>";
	}
	//erfolgsmeldung ausgeben
	if($succes) {
		echo "<h3>Vielen Dank für Ihre Anfrage!</h3>";
	} else {
		?>
</div>


<form id='register-form' method="post" action="index.php?seite=registrieren">
	<div class="wrapper">
		<div class='row'>
			<div class='col-xs-12 col-sm-12'>
				<label for='username'>Benutzername</label>
				<input type='text' id='username' name='benutzername' value="<?php 
				if (!empty($_POST["benutzername"])) {
					echo htmlspecialchars($_POST["benutzername"]);
				}
				?>" placeholder= "Benutzername" />
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='password'>Passwort</label>
				<input type='password' id='password' name='passwort' value= "<?php
				if (!empty($_POST["passwort"])) {
					echo htmlspecialchars($_POST["passwort"]);
				}
				?>" placeholder= "Passwort"/>
			</div>
			<div class='col-xs-12 col-sm-12'>
				<label for='email'>E-Mail</label>
				<input type='text' id='email' name='email' value= "<?php
				if (!empty($_POST["email"])) {
					echo htmlspecialchars($_POST["email"]);
				}
				?>" placeholder="Email"/>
			</div>
			<div class='col-xs-12 col-sm-12'>
				<input type='checkbox' id='toc' name='agb' />
				<label for='toc'>Ich akzeptiere die AGB.</label>
			</div>
			<div class='col-xs-12'>
				<input type='submit' value='Registrieren' />
			</div>
		</div>
	</div>
</form>
<?php
    } //schließende klammer von der Erfolgsmeldung 
?>
