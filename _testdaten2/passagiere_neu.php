<style>
form {
    background-color: lightpink;
    padding: 20px;
    margin: 20px;
    border: 1px solid grey;
    border-radius: 10px;
}
</style>

<?php
include "funktionen.php";


$errors = array ();
$erfolg = false;
?>
<?php
if( !empty ($_POST)) {

$sql_firstName = escape($_POST["firstName"]);
$sql_lastName = escape($_POST["lastName"]);
$sql_birthdate = escape($_POST["birthdate"]);
$sql_flightAnxiety = escape($_POST["flightAnxiety"]);




if(empty($sql_firstName)) {
    $errors[]= "Bitte geben Sie einen Vornamen an.";
}

if(empty($errors)) {
    if($sql_firstName == "") {
        $sql_firstName = "NULL";
    }
    if($sql_lastName == "") {
        $sql_lastName = "NULL";
    }
    if($sql_birthdate == "") {
        $sql_birthdate = "NULL";
    }
    if($sql_flightAnxiety == "") {
        $sql_flightAnxiety = "NULL";
    }
    
    
    query("INSERT INTO `passagiere` SET
    Vorname = '$sql_firstName', 
    Nachname = '{$sql_lastName}', 
    Geburtsdatums = {$sql_birthdate}, 
    Flungangst = '{$sql_flightAnxiety}'
   
    ");
     $neue_passagiere_id = mysqli_insert_id($db);

    
}


   query("INSERT INTO `passagiere` SET
   
   fluege_id = '$neue_fluege_id'");
}


include "kopf.php";
?>

<h1>Passagiere Anlegen</h1>

<?php
if(!empty($errors)) {
    foreach($errors as $key => $error) {
        echo "<li>". $error."</li>";
    }
    echo "</ul>";
    
}
if ($erfolg) {
    echo "<p>Die Passagiere wurde erfolgreich angelegt<br>
    <a href='passagiere.php'>Zurück zur Liste</a></p>";
    
}


?>
 
    <form action="passagiere_neu.php?id=<?php echo $row["id"]?>" method="post">
        <div>
            <label for="passagiere_id">ID</label>
            <select name="passagiere_id" id="passagiere_id">
            <?php 
                    $user_result = query("SELECT * FROM passagiere ORDER BY ID ASC");
                    while ($user = mysqli_fetch_assoc($user_result)) {
                       echo "<option value='{$user["id"]}'";
                       if(!empty($_POST["passagiere_id"]) && !$erfolg && $_POST["passagiere_id"] == $user["id"]) {
                           echo "selected";
                       } 
                        echo  ">{$user[""]}</option>";
                    }
                ?>
            </select>
            <label for="fluege_id">Flüg_id</label>
            <select name="fluege_id" id="fluege_id">
            <?php 
                    $user_result = query("SELECT * FROM passagiere ORDER BY fluege_id ASC");
                    while ($user = mysqli_fetch_assoc($user_result)) {
                       echo "<option value='{$user["fluege_id"]}'";
                       if(!empty($_POST["fluege_id"]) && !$erfolg && $_POST["fluege_id"] == $user["id"]) {
                           echo "selected";
                       } 
                        echo  ">{$user[""]}</option>";
                    }
                ?>
            </select>
        </div>
        
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required value= "<?php 
            if(!empty($_POST["firstName"]) && !$erfolg) {
                echo htmlspecialchars($_POST["firstName"]);
            }
            ?>"/><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required value="<?php
            if(!empty($_POST["lastName"]) && !$erfolg) {
                echo htmlspecialchars($_POST["lastName"]);
            }
            ?>"><br><br>
        
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required value="<?php
            if(!empty($_POST["birthdate"]) && !$erfolg) {
                echo htmlspecialchars($_POST["birthdate"]);
            }
            ?>"><br><br>
        
        <label for="flightAnxiety">Flight Anxiety:</label>
        <input type="radio" id="flightAnxietyYes" name="flightAnxiety" value="yes" required value= " <?php
            if(!empty($_POST["flightAnxiety"]) && !$erfolg) {
                echo htmlspecialchars($_POST["flightAnxiety"]);
            }
            ?>">
        <label for="flightAnxietyYes">Yes</label>
        <input type="radio" id="flightAnxietyNo" name="flightAnxiety" value="no" required>
        <label for="flightAnxietyNo">No</label><br><br>
        
        <input type="submit" value="Passagiere anlegen">
    </form>
    <label for="flight">Flight:</label>
<select id="flight" name="flight" required>
    <?php
    $flights = getFlights($connection);
    foreach ($flights as $flight) {
        echo "<option value='{$flight['id']}'>{$flight['name']}</option>";
    }
    ?>
</select><br><br>
<?php
include "fuss.php";
?>
</body>
</html>