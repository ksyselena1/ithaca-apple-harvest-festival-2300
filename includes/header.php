<header>
    <div class="heading">
        <img src="images/apples.png" alt="Background Image">
        <div class="text">
            <h1 class="centered">Ithaca Apple Harvest Festival</h1>
            <p class="line">One of Ithaca's Treasures!</p>
        </div>
    </div>
    <nav>
        <ul>
            <li class="<?php echo ($title == 'Home') ? 'current_page' : '' ?>"><a href="index.php">Home</a></li>
            <li class="<?php echo ($title == 'Activities') ? 'current_page' : '' ?>"><a href="activities.php">Activities</a></li>
            <li class="<?php echo ($title == 'Getting Here') ? 'current_page' : '' ?>"><a href="arrival.php">Getting Here</a></li>
            <li class="<?php echo ($title == 'Gallery') ? 'current_page' : '' ?>"><a href="gallery.php">Gallery</a></li>
            <li class="<?php echo ($title == 'Frequently Asked Questions') ? 'current_page' : '' ?>"><a href="faq.php">FAQ</a></li>
            <li class="<?php echo ($title == 'Contacts') ? 'current_page' : '' ?>"><a href="contacts.php">Contacts</a></li>
        </ul>
    </nav>
</header>
