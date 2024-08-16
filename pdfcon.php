<?php
// Database credentials
define("HOSTNAME", "localhost:4306");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "login_system");
// Create connection
$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Get the selected ID from a request (e.g., GET or POST)
if(isset($_POST['select_intern'])) {
    $fname= $_POST['f_name'];
    $lname= $_POST['l_name'];
    $age= $_POST['age'];
// Prepare and execute the SQL query

$stmt = $mysqli->prepare("SELECT * FROM `interns` WHERE `first_name`= '$fname', `last_name`= '$lname' and `age`='$age' ");
$stmt->bind_param('issi', $id, $fname, $lname, $age);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data
$data = $result->fetch_assoc();

// Close the statement and connection
$stmt->close();
$mysqli->close();
}