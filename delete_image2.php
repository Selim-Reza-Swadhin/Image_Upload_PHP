<?php
include 'inc/header.php';
//include 'lib/config.php';
//include 'lib/Database.php';
//$db = new Database();

// Delete Data
/*public function delete($data){
    $delete_row = $this->link->query($data) or die($this->link->error.__LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
}*/

if (isset($_GET['del'])) {
    $id = base64_decode($_GET['del']);

    $getquery = "select * from insert_image3 where id='$id'";
    //$getImg = $db->select($getquery);
    $link = mysqli_connect('localhost', 'root', '', 'image_fileupload');
    $getImg = mysqli_query($link, $getquery);
    //image delete from folder
    if ($getImg) {
        while ($imgdata = mysqli_fetch_assoc($getImg)) {
            $delimg = $imgdata['image'];
            //unlink($delimg);
            @unlink($delimg);//@ is error control symbol
        }
    }

    $query = "delete from insert_image3 where id='$id'";
    //$delImage = $db->delete($query);
    $link = mysqli_connect('localhost', 'root', '', 'image_fileupload');
    $delImage = mysqli_query($link, $query);
    if ($delImage) {
        echo "<span class='success'>Image Deleted Successfully.
     </span>";
    } else {
        echo "<span class='error'>Image Not Deleted !</span>";
    }
}
?>
<a href="index.php">Back</a>

<?php include 'inc/footer.php'; ?>
