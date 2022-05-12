<?php
include "header.php";
?>
<div class="container">
    <div class="row my-5 p-5">
        <?php
        $sql = "SELECT * from news";
        $query = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            
            <div class="col-4 my-2" onclick="javascript:location.href='news_single.php?page=<?php echo $row['caption']; ?>'">
                <div class="card" style="width: 20rem; height:23rem;">
                    <img src="./upload/document/news<?php echo $row['caption'] . $row['image']; ?>" class="card-img-top" alt="..." style="width: 20rem; height:200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['caption']; ?></h5>
                        <p class="card-text text-truncate"><?php echo $row['content']; ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

        <?php  } ?>
    </div>
</div>

<?php include "footer.php"; ?>