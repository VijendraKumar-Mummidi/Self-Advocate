<?php
$host = "localhost";// since the database is installed in the same ec2 instance host = "local host " otherwise Host="IP adress"
$user = "root"; // Change this if you have a different MySQL user
$pass = "mypassword"; // Change this if you have set a MySQL password
$dbname = "user_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
