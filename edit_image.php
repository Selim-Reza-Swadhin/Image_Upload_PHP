<?php
include 'inc/header.php';
//include 'lib/config.php';
//include 'lib/Database.php';
//$db = new Database();
?>


<style>
    .myform {
        width: 500px;
        border: 1px solid #999;
        margin: 0 auto;
        padding: 10px 20px 20px;
    }
</style>

<div class="myform">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Select Image</td>
                <td><input type="file" name="image"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Update"/></td>
            </tr>
        </table>
    </form>
</div>

<?php
// Delete Data
/*public function delete($data){
    $delete_row = $this->link->query($data) or die($this->link->error.__LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_GET['edit'])) {
    //$id = $_GET['edit'];
    $id = base64_decode($_GET['edit']);


    $getquery = "select * from insert_image3 where id='$id'";
    //$getImg = $db->select($getquery);
    $link = mysqli_connect('localhost', 'root', '', 'image_fileupload');
    $getImg = mysqli_query($link, $getquery);
    //image delete from folder
    if ($getImg) {
        while ($imgdata = mysqli_fetch_assoc($getImg)) {
            $updateimg = $imgdata['image'];
            //unlink($updateimg);
            @unlink($updateimg);//@ is error control symbol
        }
    }


//Image Update For Query

    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $destination = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $filename = $_FILES['image']['tmp_name'];

    //$div = explode('.', $destination);
    $div = explode('.', str_replace(' ', '_', $destination));
    $file_ext = strtolower(end($div));
    //$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $unique_image = uniqid().date('-Y-m-d-h-i-s'). '.' . $file_ext;
    $uploaded_image = "delete_image/" . $unique_image;

    if (move_uploaded_file($filename, $uploaded_image)) {
        $query = "UPDATE insert_image3
              SET
              image = '$uploaded_image'                                      
              WHERE id ='$id'";
        //$delImage = $db->delete($query);
        $link = mysqli_connect('localhost', 'root', '', 'image_fileupload');
        $upImage = mysqli_query($link, $query);
        if ($upImage) {
            echo "<span class='success'>Image Update Successfully.
     </span>";
        } else {
            echo "<span class='error'>Image Not Update !</span>";
        }
    }
}
}
?>
<a href="index.php">Back</a>


<?php include 'inc/footer.php'; ?>

