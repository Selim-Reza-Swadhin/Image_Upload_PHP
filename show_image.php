<?php
include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
$db = new Database();

$query = "select * from insert_image3 order by id desc limit 1";
$getImage = $db->select($query);
if ($getImage) {
    while ($result = $getImage->fetch_assoc()) {?>

        <img src="<?php echo $result['image']; ?>" height="100px"  width="200px"/>
<?php }} ?>


<?php include 'inc/footer.php'; ?>
