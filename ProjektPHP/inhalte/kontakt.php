<?php
/*echo "<pre>"; print_r($_POST); echo "</pre>";*/
$erfolg = false;
$fehlermeldungen = array ();
//wurde das formular abgeschickt?
if (!empty($_POST))
 {
    //validierung- wurde das formular richtig ausgefullt?
    if(empty($_POST["name"])) {
        $fehlermeldungen[] = "Bitte geben Sie Ihren Namen an.";
    } elseif (strlen ($_POST["name"]) <= 2) {
        $fehlermeldungen[] = "Ihre Name ist bestimmt länger.";
    }

    if(empty($_POST["email"])) {
        $fehlermeldungen[] = "Bitte geben Sie Ihren E-mail Adresse an";
    } else if (! preg_match("/^[a-z0-9]+@[a-z0-9]+\.[a-z]{2,15}$/", $_POST["email"] ) ) {
        $fehlermeldungen[] = "Bitte geben Sie Ihren E-mail Adresse";
    }

    if (!empty ($_POST["pruffeld"])) {
        $fehlermeldungen[] = "Bitte das Pruffeld leer lassen.";
    }
    if (empty($_POST["message"])) {
        $fehlermeldungen[] = "Bitte geben Sie Ihre Mitteilung an.";
    } 
    //wenn keine Fehler aufgetreten sind 
    if (empty($fehlermeldungen)) {
        $erfolg = true;

        $mail_inhalt = "Anfrage über Kontaktformular:
            Name: {$_POST ["name"]}
            Email: {$_POST ["email"]}
            Nachricht: {$_POST ["message"]}
            ";
            //testweise inhalt im browser ausgeben
            //echo "<pre>"; print_r($_POST); echo "</pre>";

            //anfrage in datei am Server speichern (als backup)
            $dateiname = "mail_" .date("Y-m-d_H-i-s");
            file_put_contents("mailbackup/{$dateiname}.txt" , $mail_inhalt); 

            //email versenden
            mail("support@wifi.at", //Empfänger 
            "Webseiten Kontaktformular von {$_POST["name"]}"//betreff
            , $mail_inhalt);// email nachricht
    }
    
} 


?>
<div class="text">
                <h1>Kontakt</h1>
                <div class="left">
                    <h2>Wifi Salzburg</h2>
                    <p>
                        Musterhausstraße 13<br />
                        5020 Salzburg<br />
                        Österreich<br />
                        <br />
                        0043-662-12345<br />
                        <a href="mailto:rainer.christian@gmx.at">rainer.christian@gmx.at</a><br />
                        <a href="http://www.wifisalzburg.at" target="_blank">www.wifisalzburg.at</a><br />
                        <br />
                        <br />
                        Oder einfach Formular ausfüllen, abschicken, fertig!<br />
                        Wir werden uns umgehend um Ihr Anliegen bemühen.
                    </p>
                </div>
                <div class="contact right">
                    <?php 
                    //aufgetrentene Fehler der Reihe nach ausgeben
                    if(!empty($fehlermeldungen)) {
                        echo "<strong>Folgende Fehler sind aufgetreten: </strong></br>"; //echo $fehlermeldung
                        echo "<ul>";
                        foreach ($fehlermeldungen as $fehlermeldung){
                            echo "<li>.$fehlermeldung.</li>";
                        }
                        echo "</ul>";
                    }
                    //erfolgsmeldung ausgeben, wenn alles in Ordnung ist 
                    if($erfolg) {
                        echo "<h3>Vielen Dank für Ihre Anfrage!</h3>";
                    } else {
                    ?>
                    <form action="" method = "post">
                        <div>
                            <input type="text" id="name" name="name" value="<?php 
                            if (!empty($_POST["name"])) {
                                echo htmlspecialchars($_POST["name"]);
                            }
                            ?>" placeholder="Name"/>
                        </div>
                        <div>
                            <input type="text" id="email" name="email" value="<?php 
                            if (!empty($_POST["email"])) {
                                echo htmlspecialchars($_POST["email"]);
                            }
                            ?>" placeholder="Email"/>
                        </div>
                        <div>
                            <input type="text" id="pruffeld" name="pruffeld" value="" placeholder="Dieses Feld wird gepruft" />
                        </div>

                        <div>
                            <textarea id="message" name="message" placeholder= "Ihre Nachricht"><?php 
                            if (!empty($_POST["message"])) {
                                echo htmlspecialchars($_POST["message"]);
                            }
                            ?></textarea>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" id="submit" name="submit">Absenden</button>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>