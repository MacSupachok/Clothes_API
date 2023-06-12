<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'flutter_clothes_store';

$conn = new mysqli($host, $username, $password, $database);

// Check if the conn was successful
if ($conn->connect_error) {
    die("conn failed: " . $conn->connect_error);
}

//token API
$token = "fXuauEclTQWZdqmSU3l9ys0jqIWeVb5fVG8pbvd8FUFTiD0WDB1euNkO1rn4INL0";




