<?php
include_once 'header.php';
?>

<?php
if (isset($_SESSION["userid"])) {
    echo "Role: " . $_SESSION['role'];
}
?>
<form action="includes/" method="post">
    Jméno a Příjmení: <input type="text" name="name" value=<?php echo $_SESSION['name']; ?>>
    Email: <input type="text" name="email" value=<?php echo $_SESSION['email']; ?>>
    <button type="submit" name="submit">Změnit</button>
</form>

<?php
include_once 'footer.php';
?>
