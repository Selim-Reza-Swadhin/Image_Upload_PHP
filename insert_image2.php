<?php
include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
$db = new Database();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "uploads/" . $unique_image;

    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO insert_image2(image) VALUES('$uploaded_image')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
        echo "<span class='success'>Image Inserted Successfully.
     </span>";
    } else {
        echo "<span class='error'>Image Not Inserted !</span>";
    }
}
?>

<?php include 'inc/footer.php'; ?>
