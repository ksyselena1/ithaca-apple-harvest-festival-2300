<?php
include("includes/init.php");
$title = "Home";

$show_form = TRUE;

// no feedback
$show_name_feedback = FALSE;
$show_age_feedback = FALSE;
$show_numattend_feedback = FALSE;
$show_comment_feedback = FALSE;

$form_name ='';
$form_age = 1;
$form_numattend=1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$is_form_valid = TRUE;

$form_name = filter_input(INPUT_POST, "form_name", FILTER_SANITIZE_STRING);
$form_name = trim($form_name);
$form_name = trim($_POST['form_name']);
if (empty($form_name)) {
$is_form_valid = FALSE;
$show_name_feedback = TRUE;
}

$form_age = filter_input(INPUT_POST, 'form_age', FILTER_VALIDATE_INT);
$form_age = trim($_POST['form_age']);
if ($form_age < 1) { $is_form_valid=FALSE; $show_age_feedback=TRUE; } $form_numattend=filter_input(INPUT_POST, 'form_numattend' , FILTER_VALIDATE_INT); $form_numattend=trim($_POST['form_numattend']); if ($form_numattend < 1) { $is_form_valid=FALSE; $show_numattend_feedback=TRUE; } $form_comment=filter_input(INPUT_POST, "form_comment" , FILTER_SANITIZE_STRING); $form_comment=trim($form_comment); $form_comment=trim($_POST['form_comment']); if (empty($form_comment)) { $is_form_valid=FALSE; $show_comment_feedback=TRUE; } $show_form=!$is_form_valid; } ?>
  <!DOCTYPE html>
  <html lang="en">

  <?php include("includes/head.php"); ?>

  <body>
    <div id="window">
      <?php include("includes/header.php"); ?>
      <h1>Join Us!</h1>
      <div class="box">
        <main>
          <div class="middle">
            <p><strong>What:</strong> Ithaca Apple Harvest Festival</p>
            <p>The 38th Annual Downtown Ithaca Apple Harvest Festival presented by Tompkins Trust Company is coming up Fall of 2020.
              Every year, the festival hosts <em>local produce</em> from local apple farmers, <em>fresh baked goods, live performances, and games for all-ages</em>. Many Cornell students come to this <em>free</em> event every year! </p>
            <p>Click <a href="activities.html">here</a> to find out what most students have suggested to do there.</p>
            <br>

            <p><strong>When:</strong> Friday, Sept. 27 - Sun, Sept. 29 </p>
            <p><em>Friday: 12:00PM - 6:00PM</em></p>
            <p><em>Saturday & Sunday: 10:00AM - 6:00PM</em></p>
            <p><strong>Where:</strong> Downtown Ithaca</p>
            <p>Click <a href="arrival.html">here</a> to find out how to get there.</p>
            <br>
            <!-- Source: https://www.downtownithaca.com/apple-harvest-festival/ -->
            Source: <cite><a href="https://www.downtownithaca.com/apple-harvest-festival/">Downtown Ithaca Alliance</a></cite>
          </div>
        </main>
        <div class="images">
          <!-- Source: (original work) Selena Kang -->
          <img src="images/main.jpg" alt="Home Page Image">
        </div>
      </div>

      <div class="testimonials">
        <h3>What other Cornell students say about the festival</h3>
        <blockquote cite="Jonathan Gao">
          It was my first time going as a Sophomore transfer. I went with the people I met at O-Week! It was so fun! There were so many bees though. - Jonathan Gao
        </blockquote>
        <blockquote cite="Teddy Park">
          I went with my girlfriend in my freshman year at Cornell and had a really nice time. We walked through the streets and had their famous mac and cheese. - Teddy Park
        </blockquote>
        <blockquote cite="Haley Kim">
          I love getting apples and apple donuts. The food is delicious and is worth the wait! I am a junior student now but I have been going since my Freshman year. - Haley Kim
        </blockquote>
        <blockquote cite="Kelly Foo">
          I actually did not go in my freshman year. I went in my sophomore year and I wonder why I never went in my freshman year! It's so much fun! Dress pretty! Take lots of pictures! Eat good food! - Kelly Foo
        </blockquote>
      </div>

      <!-- form  -->
      <div class="flex">
        <section class="interestform">
          <?php
          if ($show_form) { ?>
            <h3>Submit Your Review</h3>
            <form id="interestform" method="post" action="index.php" novalidate>
              <p class="form_feedback <?php if ($show_name_feedback == FALSE) {
                                        echo 'hidden';
                                      } ?>">*Please write your name.</p>

              <div class="q">
                <label for="name_field">Full Name:</label>
                <input id="name_field" type="text" name="form_name" value="<?php echo htmlspecialchars($form_name); ?>" />
              </div>
              <?php $form_name = $POST["form_name"]; ?>
              <p class="form_feedback <?php if ($show_age_feedback == FALSE) {
                                        echo 'hidden';
                                      } ?>">*Please write your valid numerical age.</p>
              <div class="q">
                <label for="age_field">Ages:</label>
                <input type="number" id="age_field" name="form_age" min="1" value="<?php echo $form_age; ?>" />
              </div>

              <?php $form_age = $_POST["form_age"]; ?>


              <p class="form_feedback <?php if ($show_numattend_feedback == FALSE) {
                                        echo 'hidden';
                                      } ?>">*Please put at least 1 to count yourself.</p>
              <div class="q">
                <label for="numattend_field">Number of People Attended/Attending:</label>
                <input type="number" id="numattend_field" name="form_numattend" min="1" value="<?php echo $form_numattend; ?>" />
              </div>

              <?php $form_numattend = $_POST["form_numattend"]; ?>

              <p class="form_feedback <?php if ($show_comment_feedback == FALSE) {
                                        echo 'hidden';
                                      } ?>">*Please feel free to write any questions or reviews about the event.</p>
              <div class="q">
                <label for="comment_field">Questions/Review on the event:</label>
                <input type='text' id="comment_field" class="textarea" name="form_comment" value="<?php echo htmlspecialchars($form_comment); ?>">

              </div>
              <?php $form_comment = $POST["form_comment"]; ?>

              <div class="button">
                <span></span>
                <input type="submit" value="Submit Form" />
              </div>

            </form>


          <?php } else { ?>
            <h3>Thank you for your response, <?php echo htmlspecialchars($form_name); ?></h3>
            <p>Your form has been submitted successfully.</p>
            <p><a href="index.php">New Form</a></p>
          <?php } ?>
        </section>
      </div>
      <?php include("includes/footer.php"); ?>
    </div>
  </body>

  </html>
