<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "eshop";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn)
{
    die("Connection failed: " . mysqlite_connect_error());
}