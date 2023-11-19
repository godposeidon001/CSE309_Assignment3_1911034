<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "contact_form"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$message = $_POST['message'];


$sql = "INSERT INTO form_data (first_name, last_name, email, phone_number, message) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$message')";

if ($conn->query($sql) === TRUE) {
    
    header('Location: ver1.php?status=success');
} else {
    
    header('Location: ver1.php?status=error&message=' . urlencode($conn->error));
}

$conn->close();
?>
