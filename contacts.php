<?php
include("includes/init.php");
$title = "Contacts";
?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
    <div id="window">
        <?php include("includes/header.php"); ?>
        <h1><?php echo $title; ?></h1>
        <div class="box2">
            <main>
                <div class="contactslist">
                    <h3>Website Developer: Selena Kang</h3>
                    <p>Email me <a href="mailto:sk2426@cornell.edu">Here</a>!</p>
                    <h3>Event Organizers: Downtown Ithaca Alliance</h3>
                    <p>Email the organizers <a href="mailto:info@downtownithaca.com">Here</a>!</p>
                    <p></p>
                    <p>Hours are <em>Monday – Friday: 9:00 – 5:00pm</em> </p>
                    <p><strong>Address:</strong> 171 E. State St. PMB #136
                        Center Ithaca, Ithaca, NY 14850 USA</p>
                    <p><strong>Phone number:</strong> (607) 277-8679</p>
                    <p><strong>Official Website: </strong><a href="https://www.downtownithaca.com/contact-us/">Click Here</a></p>
                    <!-- Source: https://www.downtownithaca.com/apple-harvest-festival/ -->
                    Source: <cite><a href="https://www.downtownithaca.com/apple-harvest-festival/">Downtown Ithaca Alliance</a></cite>
                </div>
            </main>
        </div>
        <?php include("includes/footer.php"); ?>
    </div>
</body>

</html>
