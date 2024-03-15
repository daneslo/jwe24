<?php
$db_passwort = "81jgfksadjgfksdjgfks";
$passwort= "abcd";
$salt = "köakkäkk";

if ($db_passwort == md5($passwort)) {
    echo "passwort ist richtig";
    echo "<br>";
}



echo $passwort;
echo "<br>";
echo md5($passwort);
echo "<br>";
echo md5($passwort.$salt);

echo "<br>";
$db_passwort =  password_hash($passwort, PASSWORD_DEFAULT); // 60 Zeichen
echo $db_passwort;
echo "<br>";
if (password_verify($passwort, $db_passwort))
{
    echo "passwort stimmt überein";
    echo "<br>";
};




?>