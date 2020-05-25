<?php
include("includes/init.php");
$title = "Gallery";
$image_id = $_GET['image_id'];
$db = open_or_init_sqlite_db("secure/site.sqlite", "secure/init.sql");
$sql = "SELECT * FROM image_tags LEFT OUTER JOIN tags, images ON image_tags.tag_id = tags.id AND image_tags.image_id = images.id WHERE image_tags.image_id = :image_id";
$params = array(
    ':image_id' => $image_id,
);
$elements = exec_sql_query($db, $sql, $params)->fetchAll();

function getfileext($element)
{
    return htmlspecialchars($element["file_ext"]);
}
function gettagid($element)
{
    return htmlspecialchars($element["id"]);
}

if (isset($_POST['deleteimage'])) {
    $sql = "SELECT * FROM images WHERE (id = :image_id);";
    $params = array(
        ':image_id' => $image_id,
    );
    $result = exec_sql_query($db, $sql, $params);
    $records = $result->fetchAll();
    foreach ($records as $record) {
        $imageext = getfileext($record);
    }
    $sql = "DELETE FROM images WHERE (id=:image_id);";
    exec_sql_query($db, $sql, array(
        ':image_id' => $image_id
    ));
    unlink('uploads/images/' . $image_id . "." . $imageext);
}

function showimage($element)
{ ?>
    <figure class="figure1">

        <img class="img1" src="uploads/images/<?php echo htmlspecialchars($_GET['image_id']) . "." . htmlspecialchars($element['file_ext']); ?>" alt="<?php echo htmlspecialchars($element['tag']); ?>" />
        <form class="delete" id="tag_id" action="imagedetails2.php?<?php echo http_build_query(array('image_id' => strtolower($element['id']))); ?>" method="post">
            <input class="delete" type="hidden" name="image_id" value="<?php echo $element['image_id']; ?>">
            <input class="delete" type="submit" name="deleteimage" value="Delete Image">
        </form>
    </figure>

<?php
}

function showtag($element)
{
?>
    <tr>
        <td><?php echo htmlspecialchars($element["tag"]); ?>
            <form id="tag_id" action="imagedetails2.php?<?php echo http_build_query(array('image_id' => strtolower($element['id']))); ?>" method="post">
                <input type="hidden" name="tag_id" value="<?php echo $element['tag_id']; ?>">
                <input type="submit" name="deletetag" value="Delete">
            </form>
        </td>
    </tr>
<?php
}

//delete a tag
if (isset($_POST['deletetag'])) {
    $tag_id = $_POST['tag_id'];
    $sql = "DELETE FROM image_tags WHERE (image_id = :image_id AND tag_id = :tag_id);";
    $params = array(
        ':image_id' => $image_id,
        ':tag_id' => $tag_id
    );
    exec_sql_query($db, $sql, $params);
}

//add a tag
if (isset($_POST['addtag'])) {
    $newtag = trim(filter_input(INPUT_POST, 'newtag', FILTER_SANITIZE_STRING));
    $newtag = ucfirst($newtag);
    if (!empty($newtag)) {
        $sql = "SELECT * FROM tags WHERE (tag = :newtag)";
        $params = array(
            ':newtag' => $newtag
        );
        $result = exec_sql_query($db, $sql, $params);
        $records = $result->fetchAll();
        if (empty($records)) {
            $sql = "INSERT INTO tags (tag) VALUES (:newtag)";
            $params = array(
                ':newtag' => $newtag
            );
            exec_sql_query($db, $sql, $params);
            $tag_id = $db->lastInsertId('id');
        } else {
            $sql = "SELECT * FROM tags WHERE (tag = :newtag)";
            $params = array(
                ':newtag' => $newtag
            );
            $newresult = exec_sql_query($db, $sql, $params);
            $newrecords = $newresult->fetchAll();

            foreach ($newrecords as $record) {
                $tag_id = gettagid($record);
            }
        }
    } else {
        $notag = TRUE;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
    <div id="window">
        <?php include("includes/header.php"); ?>
        <h1>Gallery</h1>
        <h3><a href="gallery.php">Back</a></h3>
        <main>

            <table>

                <h3>Tags:</h3>
                <?php
                $sql = "SELECT tag FROM image_tags LEFT OUTER JOIN tags ON image_tags.tag_id = tags.id WHERE image_tags.image_id = :image_id";
                $params = array(
                    ':image_id' => $image_id,
                );
                $elements = exec_sql_query($db, $sql, $params)->fetchAll();
                if (count($elements) > 0) {
                    foreach ($elements as $a) {
                        showtag($a);
                    }
                ?>
            </table>
        <?php
                } else { ?>
            <p>No existing tags.</p>
        <?php } ?>

        <?php
        $sql = "SELECT * FROM images WHERE id = :image_id";
        $params = array(
            ':image_id' => $image_id,
        );
        $elements = exec_sql_query($db, $sql, $params)->fetchAll();
        if (count($elements) > 0) {
            foreach ($elements as $element1) {
                showimage($element1);
            }
        }
        ?>
        <h3>Add Tag:</h3>
        <form id="newtag" action="imagedetails2.php?<?php echo http_build_query(array('image_id' => strtolower($_GET['image_id']))); ?>" method="post">
            <input type="hidden" name="newtag" value="<?php echo $element['tag']; ?>" />

            <div class="label">
                <label for="newtag">New Tag:</label>
                <textarea id="newtag" name="newtag" cols="40" rows="5"></textarea>
            </div>

            <div class="label">
                <span></span>
                <button name="addtag" type="submit">Add Tag</button>
            </div>
        </form>
    </div>


    </main>


    <?php include("includes/footer.php"); ?>
    </div>
</body>

</html>
