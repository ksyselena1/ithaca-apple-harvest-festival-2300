<?php
include("includes/init.php");
$title = "Frequently Asked Questions";
$show_form = TRUE;

// no feedback
$show_name_feedback = FALSE;
$show_age_feedback = FALSE;
$show_numattend_feedback = FALSE;
$show_comment_feedback = FALSE;

$form_name = '';
$form_age = 1;
$form_numattend = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $is_form_valid = TRUE;

  $form_name = filter_input(INPUT_POST, "form_name", FILTER_SANITIZE_STRING);
  $form_name = trim($form_name);
  $form_name = trim($_POST['form_name']);
  if (empty($form_name)) {
    $is_form_valid = FALSE;
    $show_name_feedback = TRUE;
  }

  $form_numattend = filter_input(INPUT_POST, 'form_numattend', FILTER_VALIDATE_INT);
  $form_numattend = trim($_POST['form_numattend']);
  if ($form_numattend < 1) {
    $is_form_valid = FALSE;
    $show_numattend_feedback = TRUE;
  }
  $form_comment = filter_input(INPUT_POST, "form_comment", FILTER_SANITIZE_STRING);
  $form_comment = trim($form_comment);
  $form_comment = trim($_POST['form_comment']);
  if (empty($form_comment)) {
    $is_form_valid = FALSE;
    $show_comment_feedback = TRUE;
  }
  $show_form = !$is_form_valid;
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
  <div id="window">
    <?php include("includes/header.php"); ?>
    <h1><?php echo $title; ?></h1>
    <div class="box">
      <main>
        <div class="q1">
          <h3>Q: Who should I go with?</h3>
          <p>A: Go with anyone! It is free for all to attend and it is all-ages friendly! I recommend you meet new Cornell friends to go with!</p>
        </div>
        <div class="q2">
          <h3>Q: What should I wear?</h3>
          <p>A: Check the weather before you go. Dress appropriately. I recommend wear something comfortable but also pretty if you are planning on taking pictures! </p>
        </div>
        <div class="q3">
          <h3>Q: What should I bring?</h3>
          <p>A: Cash! Most vendors will ask for cash. I recommend to bring at least $20. If you are legal, bring your ID for wine. </p>
        </div>
        <div class="q4">
          <h3>Q: Any warnings?</h3>
          <p>A: There will be many bees! Be careful. </p>

        </div>
        <div class="q5">
          <h3>Q: Who should I contact or ask if I have more questions?</h3>
          <p>A: Go check out the <a href="contacts.html">Contacts page</a>. </p>
        </div>
      </main>
    </div>

    <!-- Interest Form section -->
    <div class="flex">
      <section class="interestform">
        <?php
        if ($show_form) { ?>
          <h3>Ithaca Apple Harvest Festival Interest Form</h3>
          <form id="interestform" method="post" action="faq.php" novalidate>
            <p class="form_feedback <?php if ($show_name_feedback == FALSE) {
                                      echo 'hidden';
                                    } ?>">*Please write your name.</p>
            <div class="q">
              <label for="name_field">Student Name:</label>
              <input id="name_field" type="text" name="form_name" value="<?php echo htmlspecialchars($form_name); ?>" />
            </div>
            <?php $form_name = $POST["form_name"]; ?>

            <p class="form_feedback <?php if ($show_age_feedback == FALSE) {
                                      echo 'hidden';
                                    } ?>">* Please select one option!</p>
            <div class="q">
              <label for="year">* Graduating Year:</label>
              <select id="year" name="year">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="Other">Other</option>
              </select>
            </div>


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
      <input type="text" class="textarea" id="comment_field" name="form_comment" value="<?php echo htmlspecialchars($form_comment); ?>">

    </div>
    <?php $form_comment = $POST["form_comment"]; ?>

    <input type="submit" class="button" value="Submit">

    </form>


  <?php } else { ?>
    <h3>Thank you for your response, <?php echo htmlspecialchars($form_name); ?></h3>
    <p>Your form has been submitted successfully.</p>
    <p><a href="faq.php">New Form</a></p>
  <?php } ?>
  </section>
  </div>
  <?php include("includes/footer.php"); ?>
  </div>
</body>

</html>
