<?php


define('DB_SERVER','127.0.0.1');
define('DB_USERNAME','root');
define('DB_PASSWORD','');


// try{
//     $conn = new PDO("mysql:host=".DB_SERVER,DB_USERNAME,DB_PASSWORD);
//     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     $sql = "CREATE DATABASE IF NOT EXISTS blogspots";
//     $conn->exec($sql);
//     echo "Database created successfully<br>";
// }catch(PDOException $e){
//     echo $sql."<br>".$e->getMessage();
// }

define('DB_NAME', 'blogspots');
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}




// $conn = null;

?>