<?php
    $host = $_SERVER['DB1_HOST'];
    $port = $_SERVER['DB1_PORT'];
    $name = $_SERVER['DB1_NAME'];
    $user = $_SERVER['DB1_USER'];
    $pass = $_SERVER['DB1_PASS'];
    
    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>
