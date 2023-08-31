<?php
$servername = "localhost";
$username = "89607Admin";
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
$datum = $_POST['datum'];
$bericht = $_POST['bericht'];

// Insert data into the database
$sql = "INSERT INTO portfolio (voornaam, achternaam, email, telefoonnummer, datum, bericht)
        VALUES ('$voornaam', '$achternaam', '$email', '$telefoonnummer', '$datum', '$bericht')";

if ($conn->query($sql) === TRUE) {
    echo "Bericht succesvol ingediend!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>