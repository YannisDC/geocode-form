<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

require("config.php");

// Create connection
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$latitude = $_POST["lat"];
$longitude = $_POST["lng"];
$email = $_POST["email"];
$street = $_POST["street"];
$city = $_POST["city"];
$postalcode = $_POST["postcode"];

echo $firstname.$lastname.$latitude.$longitude;

$sql = "INSERT INTO Customers (Firstname, Lastname, Email, Street, Postalcode, City, Latitude, Longitude)
VALUES ('$firstname', '$lastname', '$email', '$street', '$postalcode', '$city', '$latitude', '$longitude')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header( 'Location: http://www.somepage.com' ) ;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>