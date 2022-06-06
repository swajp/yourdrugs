<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="cz">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="images/yourdrugsmile.svg">
        <title>ydrugs</title>
    </head>
    <body>
<nav>
    <?php
    if (isset($_SESSION["userid"])) {
        echo "<ul>
        <li><a href=''>HOME</a></li>
        <li><a href='index.php'><img class='nav-logo' src='images/yourdrugs.svg' alt=''></a></li>
        <li><a href='aboutus.php'>ABOUT US</a></li>
    </ul>";
    } else{
        echo "<ul>
        <li><a href=''>HOME</a></li>
        <li><a href='index.php'><img class='nav-logo' src='images/yourdrugs.svg' alt=''></a></li>
        <li><a href='aboutus.php'>ABOUT US</a></li>
    </ul>";
    }
    ?>
    <?php
    if (isset($_SESSION["userid"])){
        if(($_SESSION['role']) == "admin"){
            echo "<div class='myicons'>
        <a href='includes/logout.inc.php' class='text-decoration-none'><p>LOG OUT</p></a>
        <a href='adminpanel.php'><img src='images/settings.svg'></a>
        <a href=profile.php?id=" . $_SESSION['userid'] ."><img src='images/bxs_user.svg'></a>
    </div>";
        } else{
            echo "<div class='myicons'>
        <a href='includes/logout.inc.php' class='text-decoration-none'><p>LOG OUT</p></a>
        <a href='card.php'><img src='images/fa-solid_shopping-basket.svg'></a>
        <a href=profile.php?id=" . $_SESSION['userid'] ."><img src='images/bxs_user.svg'></a>
    </div>";
        }

    } else{
        echo "<div class='myicons'>
        <a href='login.php'><img src='images/bxs_user.svg'></a>
    </div>";
    }
    ?>
</nav>
