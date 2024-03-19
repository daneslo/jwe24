		<div id='journal'>
			<div class='wrapper'>
					<div class='row'>
						<div class='col-xs-12'>
								<h1>Zufallspasswort</h1>
						</div>
					</div>

					<div class='row'>
						<div class='col-xs-12'>
							Hier sollen die Passwörter ausgegeben werden.
						</div>
						<?php
                          include "Passwort_generator.php";

                          function Hauptleitung() {
                            for ($i = 0; $i < 10; $i++) {
                                echo zufallspasswort() . "<br>";
                              }
                        }

                        Hauptleitung();
                        ?>
					</div>

			</div>
		</div>
