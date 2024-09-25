<?php 
// Database Host name
$host = "localhost";
// Database Username
$username = "root";
// Database Password
$password = "";
// Database Name
$dbname = "dummy_db";

try{
    // Connect Database
    $conn= new MySQLi($host, $username, $password, $dbname);
}catch (Exception $e){
    // Display Error if Database Conenction Failed
    throw new ErrorException($e->getMessage());
    exit;
}
