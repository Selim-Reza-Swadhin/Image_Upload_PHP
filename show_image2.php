<?php
include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
$db = new Database();
?>


<table width="100%" border="1" bgcolor="aqua">
    <tr align="center">
        <th width="10%">No.</th>
        <th width="25%">Image</th>
        <th width="30%">Image Path</th>
        <th width="15%">Edit</th>
        <th width="20%">Delete</th>
    </tr>
    <?php
    $query = "select * from insert_image3 order by id desc";
    $getImage = $db->select($query);
    if ($getImage) {
        $i = 0;
        while ($result = $getImage->fetch_assoc()) {
            $i++;
            ?>
            <tr align="center">
                <td><?= $i; ?></td>
                <td><img style="padding: 5px;" src="<?= $result['image']; ?>" height="80px"
                                     width="90px"/></td>
                <td><?= $result['image']; ?></td>
<!--                <td><a style="text-decoration:none ;" href="edit_image.php?edit=--><?//= $result['id']; ?><!--">Edit</a></td>-->
                <td><a style="text-decoration:none ;" href="edit_image.php?edit=<?= base64_encode($result['id']); ?>">Edit</a></td>
                <td><a style="text-decoration:none ;" href="delete_image2.php?del=<?= base64_encode($result['id']); ?>">Delete</a></td>
                <td><?= '<br>'; ?></td>
            </tr>
        <?php }
    } ?>
</table>
<a style="text-decoration:none ;" href="index.php">Back</a>


<?php include 'inc/footer.php'; ?>
