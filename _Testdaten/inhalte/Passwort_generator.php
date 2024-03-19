<?php
	function zufallspasswort($länge = 8) {
		$zeichen = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_+=';
		$passwort = '';
		$zeichenlänge = strlen($zeichen);
				for ($i = 0; $i < $länge; $i++) {
				$index = rand(0, $zeichenlänge - 1);
				$passwort .= $zeichen[$index];
				}
		return $passwort;
	}
?>