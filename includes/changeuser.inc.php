<?php
if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $username = $_POST["username"];
    $userid = $_POST["id"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    changeUser($conn, $email, $username, $userid);
}

else {
    header("location: ../profile.php");
    exit();
}