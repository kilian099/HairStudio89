<?php
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$host = 'localhost';
$dbname = 'hair_db';
$username = 'hair_user';
$password = 'KobuSmart@123';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO subscribers (name, email)
        VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'ss', $name, $email);
mysqli_stmt_execute($stmt); 

//  To redirect form on a particular page
header("Location:http://127.0.0.1:5500/content/thankyou.html");
?>
