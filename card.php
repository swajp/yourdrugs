<?php
include_once 'header.php';

if (!isset($_SESSION['userid']) || $_SESSION['role'] == "admin"){
    header("location: ./index.php");
    exit();
}
?>
