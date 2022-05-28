<?php
include_once 'header.php';
?>
<div class="container">
    <div class="arrow l" onclick="prev()">
        <img src="images/l.png" alt="l">
    </div>
    <div class="slide slide-1">
        <div class="caption">
            <h3>CHILD</h3><br>
            <h3>HOOD</h3>
            <p>For all who want to go to the second level. It combines the best of both worlds and is the middle thing you can’t go wrong with</p>
        </div>
        <form class="buyform" action="" name="childhood">
            <input type="number" value="1" name="amount">
            <h1>0.0012 BTC</h1>
            <button type="submit" name="buy">BUY NOW</button>
        </form>
    </div>
    <div class="slide slide-2">
        <div class="caption">
            <h3>SILVER</h3><br>
            <h3>SKULLS</h3>
            <p>For all who want to go to the second level. It combines the best of both worlds and is the middle thing you can’t go wrong with</p>
        </div>
        <form class="buyform" action="" name="childhood">
            <input type="number" value="1" name="amount">
            <h1>0.0024 BTC</h1>
            <button type="submit" name="buy">BUY NOW</button>
        </form>
    </div>
    <div class="slide slide-3">
        <div class="caption">
            <h3>CANDY</h3>
            <h3>PACK</h3>
            <p>For all who want to go to the second level. It combines the best of both worlds and is the middle thing you can’t go wrong with</p>
        </div>
        <form class="buyform" action="" name="childhood">
            <input type="number" value="1" name="amount">
            <h1>0.0120 BTC</h1>
            <button type="submit" name="buy">BUY NOW</button>
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
