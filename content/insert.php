<?php
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$host = 'localhost';
$dbname = 'hair_db';
$username = 'hair_user';
$password = 'KobuSmart@123';

$conn = mysqli_connect($host, $username, $password, $dbname);

//Check connection

if (mysqli_connect_errno()) {
    die("Connection error: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the combination of name and email already exists
    $checkQuery = "SELECT * FROM subscribers WHERE name = '$name' AND email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Value already exists in the table.";
    } else {
        // Value does not exist, insert it
        $insertQuery = "INSERT INTO subscribers (name. email) VALUES ('$name', '$email')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "Data inserted successfully";
            //  To redirect form on a particular page
            header("Location:http://127.0.0.1:5500/content/thankyou.html");
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
