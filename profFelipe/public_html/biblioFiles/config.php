<?php
$servername = "localhost";
$username = "id8623036_felipe";
$password = "23860000FasNik*";
$database = "id8623036_dbbiblio";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
