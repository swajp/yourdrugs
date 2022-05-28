<?php
include_once 'header.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>reg</title>
    </head>
    <body>
    <section>
        <form action="includes/signup.inc.php" method="post">
            Username: <input type="text" name="name">
            Email: <input type="email" name="email">
            Password: <input type="password" name="pwd">
            Password again: <input type="password" name="pwdrepeat">
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "invalidemail"){
                echo "<p>Choose a proper email!</p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords doesnt match!</p>";
            }
            else if ($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong!</p>";
            }
            else if ($_GET["error"] == "emailtaken"){
                echo "<p>Email already taken!</p>";
            }
            else if ($_GET["error"] == "none"){
                echo "<p>You have signed up!</p>";
            }
        }
        ?>
    </section>
    </body>
    </html>
