<?php
    include 'inc/header.php';
    include 'lib/config.php';
    include 'lib/Database.php';
    $db = new Database();
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
    <form action="show_image2.php" method="post" enctype="multipart/form-data">
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
