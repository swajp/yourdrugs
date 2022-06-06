<?php
include_once 'header.php';

include_once 'includes/dbh.inc.php';

?>
<script>
    function changePrice() {
        let price1 = document.getElementById("amountChildhood").value
        let price2 = document.getElementById("amountSilverSkulls").value
        let price3 = document.getElementById("amountCandyPack").value
        var newPrice1 = price1 * 0.0012;
        var newPrice2 = price2 * 0.0024;
        var newPrice3 = price3 * 0.0120;
        document.getElementById("currentPriceChildhood").innerHTML = newPrice1.toFixed(4) + " BTC";
        document.getElementById("currentSilverSkulls").innerHTML = newPrice2.toFixed(4) + " BTC";
        document.getElementById("currentCandyPack").innerHTML = newPrice3.toFixed(4) + " BTC";

    }
</script>
<div class="containers">
    <div class="arrow l" onclick="prev()">
        <img src="images/l.png" alt="l">
    </div>
    <div class="slide slide-1">
        <div class="caption">
            <h3>CHILD</h3><br>
            <h3>HOOD</h3>
            <p>For all who want to go to the second level. It combines the best of both worlds and is the middle thing
                you can’t go wrong with</p>
        </div>
        <form class="buyform" action="" name="childhood">
            <input type="number" min="1" value="1" onchange="changePrice()" id="amountChildhood">
            <h1 id="currentPriceChildhood">0.0012 BTC</h1>
            <?php
            $sql = "SELECT * FROM products WHERE id = 1";

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    if ($row = mysqli_fetch_array($result)) {
                        if ($row['productAvailable'] == 1) {

                            if (isset($_SESSION['userid']) && $_SESSION['role'] == "user") {
                                echo "<button type='submit' name='buy'>BUY NOW</button>";
                            } else if (isset($_SESSION['userid']) && $_SESSION['role'] == "admin") {
                                echo "<a href='includes/logout.inc.php' class='text-decoration-none'><p class='text-white' style='font-size: 20px'>SWITCH TO USER</p></a>";
                            } else {
                                echo "<button type='submit' name='buy'><a class='text-decoration-none' href='login.php'><p class='text-white'>BUY NOW</p></a></button>";
                            }
                        }
                        if ($row['productAvailable'] == 0) {
                            echo "<button type='submit' name='buy'>NOT AVAILABLE</button>";
                        }
                    }
                }
                mysqli_free_result($result);
            } else {
                echo "No rows in database.";
            }
            ?>
        </form>
    </div>
    <div class="slide slide-2">
        <div class="caption">
            <h3>SILVER</h3><br>
            <h3>SKULLS</h3>
            <p>For all who want to go to the second level. It combines the best of both worlds and is the middle thing
                you can’t go wrong with</p>
        </div>
        <form class="buyform" action="" name="childhood">
            <input type="number" min="1" value="1" onchange="changePrice()" id="amountSilverSkulls">
            <h1 id="currentSilverSkulls">0.0024 BTC</h1>
            <?php
            $sql = "SELECT * FROM products WHERE id = 2";

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    if ($row = mysqli_fetch_array($result)) {
                        if ($row['productAvailable'] == 1) {

                            if (isset($_SESSION['userid']) && $_SESSION['role'] == "user") {
                                echo "<button type='submit' name='buy'>BUY NOW</button>";
                            } else if (isset($_SESSION['userid']) && $_SESSION['role'] == "admin") {
                                echo "<a href='includes/logout.inc.php' class='text-decoration-none'><p class='text-white' style='font-size: 20px'>SWITCH TO USER</p></a>";
                            } else {
                                echo "<button type='submit' name='buy'><a class='text-decoration-none' href='login.php'><p class='text-white'>BUY NOW</p></a></button>";
                            }
                        }
                        if ($row['productAvailable'] == 0) {
                            echo "<button type='submit' name='buy'>NOT AVAILABLE</button>";
                        }
                    }
                }
                mysqli_free_result($result);
            } else {
                echo "No rows in database.";
            }
            ?>
        </form>
    </div>
    <div class="slide slide-3">
        <div class="caption">
            <h3>CANDY</h3>
            <h3>PACK</h3>
            <p>For all who want to go to the second level. It combines the best of both worlds and is the middle thing
                you can’t go wrong with</p>
        </div>
        <form class="buyform" action="" name="childhood">
            <input type="number" min="1" value="1" onchange="changePrice()" id="amountCandyPack">
            <h1 id="currentCandyPack">0.0012 BTC</h1>
            <?php
            $sql = "SELECT * FROM products WHERE id = 3";

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    if ($row = mysqli_fetch_array($result)) {
                        if ($row['productAvailable'] == 1) {

                            if (isset($_SESSION['userid']) && $_SESSION['role'] == "user") {
                                echo "<button type='submit' name='buy'>BUY NOW</button>";
                            } else if (isset($_SESSION['userid']) && $_SESSION['role'] == "admin") {
                                echo "<a href='includes/logout.inc.php' class='text-decoration-none'><p class='text-white' style='font-size: 20px'>SWITCH TO USER</p></a>";
                            } else {
                                echo "<button type='submit' name='buy'><a class='text-decoration-none' href='login.php'><p class='text-white'>BUY NOW</p></a></button>";
                            }
                        }
                        if ($row['productAvailable'] == 0) {
                            echo "<button type='submit' name='buy'>NOT AVAILABLE</button>";
                        }
                    }
                }
                mysqli_free_result($result);
            } else {
                echo "No rows in database.";
            }
            ?>
        </form>
    </div>
    <div class="arrow r" onclick="next()">
        <img src="images/r.png" alt="r">
    </div>
</div>
<script src="script.js"></script>
<?php
include_once 'footer.php';
?>
