<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wildguardians";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adopterName= $_POST['adopterName'];
     $adopterEmail = $_POST['adopterEmail'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO adoption (adopterName, adopterEmail) VALUES (?, ?)");
    $stmt->bind_param("ss", $adopterName, $adopterEmail);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Adoption request submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>