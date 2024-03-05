<?php

$servername = "localhost";
$dbname = "booking";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$servername; dbname=$dbname;",
                    $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo 'connect success!';
}catch(PDOException $e){
    error_log("Connecttion failed: " . $e->getMessage());
    echo "Unable to connect!";
}
