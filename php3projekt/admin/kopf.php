<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Fahrzeug-DB</title>

</head>
<style>
    body {
        background-color: beige;
    }
    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        background-color: lightblue;
       
    }
    nav ul li {
        display: inline;
        margin: 10px;
    }
    a {
        text-decoration: none;
        color: purple;
    }
    form {
    background-color: lightpink;
    width: 50%;
    padding: 20px;
    margin: 20px;
    border: 5px solid grey;
    border-radius: 5px;
    
    }
    table {
        border: 5px solid white;
        background-color:rgb(15 177 175) ;
        width: 60%;
        text-align: left;
        color: yellow;
    }
    h1 {
        color: darkblue;
    }
    button {
        background-color: lightblue;
        padding: 10px;
        border: 1px solid grey;
        border-radius: 5px;
    }
    input {
        padding: 10px;
        border: 1px solid grey;
        border-radius: 5px;
    }

</style>
<body>
    <nav>
        <ul>
            <li><a href="index.php">
                Start 
            </a></li>
            
             <li> <a  href="logout.php">Ausloggen</a> (Eingeloggt als: <?php echo $_SESSION["benutzername"]?>)</li>
            
        </ul>
    </nav>
</body>

</html>