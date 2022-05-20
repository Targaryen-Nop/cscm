<?php
include "header.php";
$localHost = "../cscm/"; // Local
$webHost1  = "../app1.ts2337.com/"; // FastComet
$webHost2  = ""; // Cloudways

$_SESSION['hostPath'] = $localHost;
?>

<body oncontextmenu="return false" class="snippet-body">
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

        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3">ข่าวประชาสัมพันธ์</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php 
                                $no = 0 ;
                                $sql = "SELECT * from news";
                                $query = mysqli_query($connection,$sql);
                                while($row = mysqli_fetch_array($query)){ ?>
                                <div class="carousel-item <?php if($no == 0){ echo "active"; } ?>">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="card" onclick="javascript:location.href='news_single.php?page=<?php echo $row['caption']; ?>'">
                                                <img class="img-fluid" alt="100%x280" src="./upload/document/news<?php echo $row['caption'].$row['image']?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $row['caption']; ?></h4>
                                                    <p class="card-text">
                                                    <?php echo $row['content']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    
                                        
                                    </div>
                                </div>
                                <?php $no++ ; }?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





</body>

<?php include "footer.php"; ?>