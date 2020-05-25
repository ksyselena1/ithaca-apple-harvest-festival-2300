<?php
include("includes/init.php");
$title = "Activities";
?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
    <div id="window">
        <?php include("includes/header.php"); ?>
        <h1><?php echo $title; ?></h1>
        <div class="box">
            <div class="act1">
                <h3>Activity #1: Local Produce & Drinks</h3>
                <p>Most students like to go for the good food and drinks at the festivl. Colorful apples from your local farmers, freshly made apple cider, apple cider donuts, delicious food from food vendors, wines, wine tasting, are only some of the food and drinks you will see at the festival! Please be prepared to pay in <em>cash</em> and be aware of the <em>lineups</em>! </p>
            </div>
            <div class="images">
                <!-- Source: (original work) Selena Kang -->
                <img src="images/food.jpg" alt="Activity 1">
            </div>
        </div>



        <div class="box">
            <div class="act1">
                <h3>Activity #2: Photo Opportunities</h3>
                <p>Take pictures around the streets of Downtown Ithaca! Some Cornell students like to use murals to take good pictures for Instagram or for a fun photoshoot. There are lots of pretty backgrounds and <em>murals on walls</em> where you can take pictures with your family and friends!</p>
            </div>
            <div class="images">
                <!-- Source: (original work) Selena Kang -->
                <img src="images/mural.jpg" alt="Photoshoot">
            </div>
        </div>

        <div class="box">
            <div class="act1">
                <h3>Activity #3: Games</h3>
                <p>Even though most students don't play games at the festival, many like to <em>take pictures</em> in front of it for a cute background! </p>
            </div>
            <div class="images">
                <!-- Source: (original work) Selena Kang -->
                <img src="images/game.jpg" alt="Games">
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </div>
</body>

</html>
