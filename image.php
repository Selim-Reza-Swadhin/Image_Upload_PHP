<!--Tutorial - 1-->
<!--header.php-->

<!doctype html>
<html>
<head>
    <title>Uploading Image File with PHP</title>
    <style>
        body{font-family: verdana}
        .phpcoding{width: 900px;margin: 0 auto; background: #ddd;}
        .headeroption, .footeroption{background: #444;color: #fff;
            text-align: center;padding: 20px;}
        .headeroption h2, .footeroption h2{margin: 0}
        .mainoption{min-height: 420px;padding: 20px}
        .myform{width: 500px;border: 1px solid  #999;margin: 0 auto;
            padding: 10px 20px 20px;}
        input[type="submit"],input[type="file"]{cursor: pointer}
    </style>
</head>
<body>
<div class="phpcoding">
    <section class="headeroption">
        <h2>Uploading Image File with PHP</h2>
    </section>

    <section class="mainoption">

<!--        index.php-->

        <?php include 'inc/header.php';?>
        <div class="myform">
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Select Image</td>
                        <td><input type="file" name="image"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Upload"/></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php include 'inc/footer.php';?>

<!--        footer.php-->

    </section>
    <section class="footeroption">
        <h2>www.trainingwithliveproject.com</h2>
    </section>
</div>
</body>
</html>

<!--Tutorial - 2-->
<!--config.php-->

<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'image_fileupload');
?>

//Database.php

<?php
/**
 * Database Class
 */
class Database{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = new mysqli($this->host, $this->user, $this->pass,
            $this->dbname);
        if (!$this->link) {
            $this->error = "Connection fail.".$this->link->connect_error;
        }
    }

    //Insert Data
    public function insert($data){
        $insert_row = $this->link->query($data) or
        die($this->link->error.__LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }

    // Select Data
    public function select($data){
        $result = $this->link->query($data) or
        die($this->link->error.__LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
?>

<!--Include the below code in index.php-->

<?php
    include 'lib/config.php';
    include 'lib/Database.php';
    $db = new Database();
?>

<!--Tutorial - 3-->
<!--Related Code:-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $folder = "uploads/";
    move_uploaded_file($file_temp, $folder.$file_name);
    $query = "INSERT INTO tbl_image(image) VALUES('$file_name')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
        echo "<span class='success'>Image Inserted Successfully.
          </span>";
    }else {
        echo "<span class='error'>Image Not Inserted !</span>";
    }
}
?>

<!--Tutorial - 4-->
<!--Related Code:-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_image(image) VALUES('$uploaded_image')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
        echo "<span class='success'>Image Inserted Successfully.
     </span>";
    }else {
        echo "<span class='error'>Image Not Inserted !</span>";
    }
}
?>

<!--Tutorial - 5-->
<!--Related Code:-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    if (empty($file_name)) {
        echo "<span class='error'>Please Select any Image !</span>";
    }elseif ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "INSERT INTO tbl_image(image) 
    VALUES('$uploaded_image')";
        $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
            echo "<span class='success'>Image Inserted Successfully.
     </span>";
        }else {
            echo "<span class='error'>Image Not Inserted !</span>";
        }
    }
}
?>

<!--Tutorial - 6-->
<!--Related Code:-->

<?php
$query = "select * from tbl_image order by id desc limit 1";
$getImage = $db->select($query);
if ($getImage) {
    while ($result = $getImage->fetch_assoc()) { ?>

        <img src="<?php echo $result['image']; ?>" height="100px"
             width="200px"/>
<?php } } ?>


<!--Tutorial - 7-->

<?php
//Database.php
// Delete Data
    public function delete($data){
    $delete_row = $this->link->query($data) or die($this->link->error.__LINE__);
        if ($delete_row) {
        return $delete_row;
        } else {
        return false;
        }
    }
?>

<!--Show Data:-->

<?php
$query = "select * from tbl_image";
$getImage = $db->select($query);
if ($getImage) {
    $i=0;
    while ($result = $getImage->fetch_assoc()) {
        $i++;
        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><img src="<?php echo $result['image']; ?>" height="40px"
                     width="50px"/></td>
            <td><a href="?del=<?php echo $result['id']; ?>">Delete</a></td>
        </tr>
    <?php } } ?>

<!--Delete Data:-->

<?php
if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $getquery = "select * from tbl_image where id='$id'";
    $getImg = $db->select($getquery);
    if ($getImg) {
        while ($imgdata = $getImg->fetch_assoc()) {
            $delimg = $imgdata['image'];
            unlink($delimg);
        }
    }

    $query = "delete from tbl_image where id='$id'";
    $delImage = $db->delete($query);
    if ($delImage) {
        echo "<span class='success'>Image Deleted Successfully.
     </span>";
    }else {
        echo "<span class='error'>Image Not Deleted !</span>";
    }
}
?>

