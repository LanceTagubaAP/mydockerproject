<?php
$servername = "db";
$username = "webuser";
$password = "password";
$dbname = "mywebsite";

// Maak verbinding
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Voeg bezoekdatum in
$sql = "INSERT INTO visits (visit_date) VALUES (NOW())";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Selecteer bezoekdatums
$sql = "SELECT visit_date FROM visits";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Visit date: " . $row["visit_date"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
