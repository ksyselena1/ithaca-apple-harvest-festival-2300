<?php
include("includes/init.php");
$db = open_or_init_sqlite_db("secure/site.sqlite", "secure/init.sql");

$title = "Gallery";
$elements = exec_sql_query($db, "SELECT * FROM image_tags LEFT OUTER JOIN tags, images ON image_tags.tag_id = tags.id AND image_tags.image_id = images.id;", array())->fetchAll();
$ssearch = $_GET['search'];
if (isset($_GET['search'])) {
  $dosearch = TRUE;
  $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
  $search = trim($search);
} else {
  $dosearch = FALSE;
  $search = NULL;
}

function printtag($element)
{
?>
  <tr>

    <td><?php echo htmlspecialchars($element["tag"]); ?></td>
  </tr>
<?php
}

const MAX_FILE_SIZE = 1000000;
const BOX_UPLOADS_PATH = "uploads/images/";

if (isset($_POST["submit_upload"])) {
  $valid = TRUE;
  $uploadinfo = $_FILES["img"];

  if ($uploadinfo['error'] == UPLOAD_ERR_OK) {
    $uploadname = basename($uploadinfo["name"]);
    $uploadext = strtolower(pathinfo($uploadname, PATHINFO_EXTENSION));

    // reviewer and comment are optional; no filtering necessary
    $sql = "INSERT INTO images (file_name, file_ext) VALUES (:filename, :extension);";
    $params = array(
      ':filename' => $uploadname,
      ':extension' => $uploadext,
    );
    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
      $file_id = $db->lastInsertId("id");
      // $result = exec_sql_query($db, $sql, $params);
      // $sql = "INSERT INTO image_tags (image_id) VALUES (:file_id);";
      // $params = array(
      //   ':file_id' => $file_id,
      // );
      // $result = exec_sql_query($db, $sql, $params);
      if (move_uploaded_file($uploadinfo["tmp_name"], BOX_UPLOADS_PATH . "$file_id.$uploadext")) {
        array_push($messages, "Successfully uploaded imagey to galler.");
      } else {
        array_push($messages, "Failed to upload image to gallery.");
      }
    } else {
      array_push($messages, "Failed to upload image to gallery.");
    }
  }
}

function showimage($element)
{ ?>
  <div class="gallery1">
    <button class="gallery1" id="gallery" name="image_id" value="<?php echo htmlspecialchars($element['id']); ?>">
      <a href="imagedetails2.php?<?php echo http_build_query(array('image_id' => strtolower($element['id']))); ?>">
        <img class="gallery" src="uploads/images/<?php echo htmlspecialchars($element['id']) . "." . htmlspecialchars($element['file_ext']); ?>" />

      </a>
  </div>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
  <div id="window">
    <?php include("includes/header.php"); ?>
    <h1>Gallery</h1>

    <main>

      <div class="over">
        <div class="existtags">
          <h3>All existing tags:</h3>
          <?php
          $sql = "SELECT DISTINCT tag FROM tags;";
          $params = array();
          $result = exec_sql_query($db, $sql, $params)->fetchAll();
          ?>
          <table>
            <?php
            foreach ($result as $rec) {
              printtag($rec);
            }
            ?>
          </table>
          <?php

          ?>
        </div>
        <div class="searchtag">
          <h3>Search Using Tag: </h3>
          <form id="searchForm" action="gallery.php" method="get">
            <input type="text" name="search" />
            <button type="submit">Search</button>
          </form>
        </div>

        <div>
          <?php if ($ssearch) { ?>
            <form action="gallery.php" method="get">
              <button type="submit">Clear Search</button>
            </form>
          <?php } ?>
        </div>

      </div>
      <div>
        <?php
        if ($dosearch) {
        ?>
          <h3>Search Results</h3>
        <?php
          $sql = "SELECT * FROM image_tags LEFT OUTER JOIN tags, images ON image_tags.tag_id = tags.id WHERE tags.tag LIKE '%' || :search || '%' AND images.id = image_tags.image_id";
          $params = array(
            ':search' => $search
          );
        } else {
        ?>
          <h3>All Images:</h3>
          <div class="gallery">
          <?php
          $sql = "SELECT * FROM images";
          $params = array();
        }
        $records = exec_sql_query($db, $sql, $params)->fetchAll();
        if (count($records) > 0) {
          ?>
            <table>
              <?php
              foreach ($records as $record) {
                showimage($record);
              }
              ?>
            </table>
          <?php
        } else {
          echo "<p>No tags matched your search.</p>";
        }
          ?>
          </div>

          <div class="group">
            <h3>Upload New Image:</h3>

            <form id="uploadimage" action="gallery.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />

              <div class="label">
                <label for="img">Upload Image:</label>
                <input id="img" type="file" name="img" accept="image/*">
              </div>

              <div class="label">
                <span></span>
                <button name="submit_upload" type="submit">Upload File</button>
              </div>
            </form>
          </div>
      </div>
  </div>

  </main>


  <?php include("includes/footer.php"); ?>
  </div>
</body>

</html>
