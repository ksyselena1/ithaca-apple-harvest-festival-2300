<?php
include("includes/init.php");
$title = "Getting Here";
?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
    <div id="window">
        <?php include("includes/header.php"); ?>
        <h1><?php echo $title; ?></h1>
        <div class="box">
            <div class="act2">
                <h3>Method #1: Bus</h3>
                <p>Bussing, in my opinion, is the <em>cheapest option</em>. As Cornell students, it is free to take the TCAT bus on weekends! On weekdays, it is <em>free after 6PM or else there is a fee of $1.50</em>. Here are some of my suggestions:</p>
                <p><strong>From Collegetown:</strong> Take #30 or #70 from Schwartz Performing Arts Center to Ithaca Commons Seneca Street (~10 minutes).</p>
                <p><strong>From West campus:</strong> Take #70 or #72 from Baker Flagpole to Ithaca Commons Seneca Street (~15 minutes)</p>
                <p><strong>From North campus:</strong> Take #70 or #72 from RPCC to Ithaca Commons Seneca Street (~20 minutes)</p>
                <p>For more bus routes click <a href="https://www.tcatbus.com">here</a>.</p>
            </div>
        </div>
        <div class="box">
            <div class="act2">
                <h3>Method #2: Drive</h3>
                <p>If you have a car or are going with someone who has a car, <em>park in one of Green, Seneca, and Cayuga Street garages and walk</em> to the Apple Harvest Festival. There is a flat fee festival rate inside garages of <em>$5.00 all day</em>. There is no re-entry. The garages are equipped with accessible parking and elevators. Street parking is also available. <em>Free on Saturday and Sunday</em>. <a href="https://www.cityofithaca.org/243/Parking-Operations">Click here for parking information.</a></p>
            </div>
        </div>
        <div class="box">
            <div class="act2">
                <h3>Method #3: Uber/Lyft</h3>
                <p>I frequently use this option when I have a group of <em>4-6 friends</em> going. Take Uber X or Lyft if there are 4 of you. Take Uber XL if there are 6 of you. The fee depends on what time of the day you go. This is the <em>most expensive option</em>. It may cost around $1-5 for each person, totaling around $10-15 for one group.</p>
            </div>
        </div>

        <div class="box">
            <div class="act2">
                <h3>Parking Information</h3>
                <p>You should park either in the Green, Seneca, and Cayuga Street garages and walk to the Apple Harvest Festival. There is a flat fee festival rate inside garages, $5.00 all day. There is also street parking available, which is free on Saturday and Sunday. <a href="https://www.cityofithaca.org/243/Parking-Operations">Click here for more information!</a></p>
                <p>
                    <!-- Source: https://www.downtownithaca.com/apple-harvest-festival/ -->
                    Source: <cite><a href="https://www.downtownithaca.com/apple-harvest-festival/">Downtown Ithaca Alliance</a></cite></p>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </div>
</body>

</html>
