<?php

use function PHPSTORM_META\elementType;

$hostname = 'localhost';
$user = "root";
$password = "";
$db_name = "car";

$conn = mysqli_connect($hostname, $user, $password, $db_name);
if (!$conn) {
    echo "Connection failed baby";
    exit();
}
