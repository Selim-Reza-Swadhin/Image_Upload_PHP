<?php
include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
$db = new Database();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $destination = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $filename = $_FILES['image']['tmp_name'];

    //$div = explode('.', $destination);
    $div = explode('.', str_replace(' ', '_', $destination));
    $file_ext = strtolower(end($div));
    //$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $unique_image = uniqid().date('Y-m-d-h-i-s'). '.' . $file_ext;
    //$uploaded_image = "uploads/".$unique_image;
    $uploaded_image = "delete_image/" . $unique_image;

    if (empty($destination)) {
        echo "<span class='error'>Please Select any Image !</span>";
    } elseif ($file_size > 1048567) {
        echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-"
            . implode(', ', $permited) . "</span>";
    } else {
        move_uploaded_file($filename, $uploaded_image);
        $query = "INSERT INTO insert_image3(image) VALUES('$uploaded_image')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
            echo "<span class='success'>Image Inserted Successfully.
     </span>";
        } else {
            echo "<span class='error'>Image Not Inserted !</span>";
        }
    }
}
?>
<a style="text-decoration:none ;" href="index.php">Back</a>

<?php include 'inc/footer.php'; ?>
