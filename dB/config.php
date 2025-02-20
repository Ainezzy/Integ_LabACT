<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "integ_labact";

$con = new mysqli($servername, $username, $password, $database);

if ($con){
    echo "You are connected!";
} else {
    echo "Could not connect!";
}

?>