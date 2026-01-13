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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $membership_type = $_POST['membership'];

    $sql = "INSERT INTO members (name, email, number, address, membership_type) VALUES ('$name', '$email', '$number', '$address', '$membership_type')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
