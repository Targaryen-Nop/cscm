<?php
include "header.php";
$sql = "SELECT * from news WHERE caption = '" . $_GET['page'] . "'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
?>
<div class="container">
    <h1 class="mx-5 p-5 text-center"><?php echo $row['caption']; ?></h1>
    <div class="d-flex justify-content-center">
        <img src="./upload/document/news<?php echo $row['caption'] . $row['image']; ?>" width="700px" height="400px" />

    
    </div>
    <div class="text-wrap mx-5 p-5" style="margin:0 auto; text-align:center; ">
        <p><?php echo $row['content']; ?></p>
    </div>

</div>
<?php include "footer.php"; ?>