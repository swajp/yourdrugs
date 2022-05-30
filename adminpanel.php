<?php
include_once 'header.php';

if ($_SESSION['role'] != 'admin'){
    header("location: ./index.php");
    exit();
}
?>
<h1>Administration</h1>
<?php require_once 'includes/adminpanel.inc.php';?>
<?php
include_once 'footer.php';
?>
