<?php

$servername = "localhost";
$username = "rick";
$password = "Ameliejean17";
$dbname = "707auth";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

} catch (PDOException $e) {
    echo "SQL Error: " . $e->getMessage();
}
