<?php
include_once 'header.php';

if (!isset($_SESSION['userid'])){
    header("location: ./index.php");
    exit();
}
?>
