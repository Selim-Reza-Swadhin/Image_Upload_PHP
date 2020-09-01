<?php
include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
$db = new Database();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $folder = "uploads/";
    move_uploaded_file($file_temp, $folder.$file_name);
    $query = "INSERT INTO insert_image(image) VALUES('$file_name')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
        echo "<span class='success'>Image Inserted Successfully.
          </span>";
    }else {
        echo "<span class='error'>Image Not Inserted !</span>";
    }
}
?>

<?php include 'inc/footer.php';?>
