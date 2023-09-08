<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="spacer layer1">
    </div>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Portfolio</a></li>
                <li><a href="contact.php">Contact Opnemen</a></li>
            </ul>
        </nav>

    </header>
    <main>
        <div class="contactforum">Contact Forum</div>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost";
$username = "89607admin";
$password = "89607Admin1";
$dbname = "89607portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$telefoonnummer = $_POST['telefoonnummer'];
$datum = date("Y-m-d");
$bericht = $_POST['bericht'];

// Insert data into the database
$sql = "INSERT INTO portfolio (voornaam, achternaam, email, telefoonnummer, datum, bericht)
        VALUES ('$voornaam', '$achternaam', '$email', '$telefoonnummer', '$datum', '$bericht')";

if ($conn->query($sql) === TRUE) {
    echo '<p class="echodb">Bericht succesvol ingediend!</p>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();}



?>

        <form action="" method="POST">
            <label for="voornaam">Voornaam:</label>
            <input type="text" name="voornaam" required><br>
    
            <label for="achternaam">Achternaam:</label>
            <input type="text" name="achternaam" required><br>
    
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>
    
            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="text" name="telefoonnummer"><br>
    
            <label for="bericht">Bericht:</label><br>
            <textarea name="bericht" rows="4" cols="50" required></textarea><br>
    
            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>