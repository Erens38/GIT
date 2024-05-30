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

$sql = "SELECT * FROM verkooporders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verkooporders Inzien</title>
</head>
<body>
    <h2>Verkooporders</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Klantnaam</th>
            <th>Datum</th>
            <th>Totaalbedrag</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["orderID"]. "</td><td>" . $row["klantnaam"]. "</td><td>" . $row["datum"]. "</td><td>" . $row["totaalbedrag"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Geen verkooporders gevonden</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>