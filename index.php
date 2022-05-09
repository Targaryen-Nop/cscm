<?php
include "header.php";
$localHost = "../cscm/"; // Local
$webHost1  = "../app1.ts2337.com/"; // FastComet
$webHost2  = ""; // Cloudways

$_SESSION['hostPath'] = $localHost;
?>

<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./public/images/banforWeb1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./public/images/CMD1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./public/images/bannerCS.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container overflow-hidden p-5">
        <div class="row">
            <div class="col-8">
                <iframe width="800" height="500" src="https://www.youtube.com/embed/fV2fuPaRdqg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-4">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCSCM.CPU&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>

        <div class="my-5">
            <div id="newsCarousel" class="carousel slide d-flex flex-row" data-bs-ride="carousel">
                <?php
                $sql = "SELECT * from news";
                $query = mysqli_query($connection, $sql);
                $no = 0;
                $number_carousel = 1;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="carousel-indicators ">
                        <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="<?php echo $no; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $number_carouse; ?>"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="card carousel-item <?php if($no == 0){ echo "active";} ?>" style="width: 20rem; height:23rem;">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php
                    $no += 1;
                    $number_carousel += 1;
                }
                ?>
            </div>
        </div>
    </div>






</body>

<?php include "footer.php"; ?>