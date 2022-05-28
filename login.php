<?php
include_once 'header.php';
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>log</title>
    </head>
    <body>
    <section>
        <form action="includes/login.inc.php" method="post">
            Email: <input type="text" name="email">
            Heslo: <input type="password" name="pwd" placeholder="Password..">
            <button type="submit" name="submit">Přihlásit se</button>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "wronglogin"){
                echo "<p>Wrong password or email!</p>";
            }
        }
        ?>
    </section>
    </body>
    </html>