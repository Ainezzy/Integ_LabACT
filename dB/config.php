<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "integgg";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn){
    echo "You are connected!";
} else {
    echo "Could not connect!";
}

?>