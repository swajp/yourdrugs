<?php
include_once 'header.php';

if ($_SESSION['role'] != 'admin'){
    header("location: ./index.php");
    exit();
}
?>
<h1>Administration</h1>
<?php require_once 'includes/adminpanel.inc.php';?>
<form method="post">
    Product name: <input type="text" value="">
    Product price: <input type="number" value="">
    Is Available: <input type="number" min="0" max="1" value="">
</form>
<?php
include_once 'footer.php';
?>
