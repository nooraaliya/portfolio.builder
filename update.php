<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "profile");
$email = $_SESSION['email'];

$result = mysqli_query($conn, "SELECT * FROM details WHERE email = '$email'");
$data = mysqli_fetch_assoc($result);

echo json_encode($data);
?>
