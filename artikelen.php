<?php
// Database configuratie
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "winkel";

// Maak verbinding
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $voorraad = $_POST['voorraad'];

    $sql = "INSERT INTO artikelen (naam, beschrijving, prijs, voorraad) VALUES ('$naam', '$beschrijving', '$prijs', '$voorraad')";

    if ($conn->query($sql) === TRUE) {
        echo "Nieuw artikel succesvol toegevoegd";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Artikel Aanmaken</title>
</head>
<body>
    <h2>Nieuw Artikel</h2>
    <form method="post" action="">
        Naam: <input type="text" name="naam" required><br>
        Beschrijving: <input type="text" name="beschrijving" required><br>
        Prijs: <input type="number" step="0.01" name="prijs" required><br>
        Voorraad: <input type="number" name="voorraad" required><br>
        <input type="submit" value="Opslaan">
    </form>
</body>
</html>