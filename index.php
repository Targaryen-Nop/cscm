<?php
include "header.php";
$localHost = "../cscm/"; // Local
$webHost1  = "../app1.ts2337.com/"; // FastComet
$webHost2  = ""; // Cloudways

$_SESSION['hostPath'] = $localHost;

include 'bannder.php';
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

        <div class="mt-5">
            <h3 class="">ข่าวประชาสัมพันธ์</h3>
        </div>

    </div>
    <div class="container">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                <?php
                $sql = "SELECT * from news";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="swiper-slide d-flex justify-content-center">
                        <div class="card">
                            <figure>
                                <img src="./upload/document/news<?php echo $row['caption'] . $row['image']; ?>" alt="Hotel">
                            </figure>

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['caption']; ?></h5>
                                <p class="card-text"><?php echo $row['content']; ?></p>
                                <p class="card-text"><small class="text-muted"><?php $date = date_create(substr($row['date'],0,10)); echo date_format($date,"d/F/Y"); ?></small></p>
                            </div>
                        </div>
                    </div>
             

                <?php } ?>
               
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>



</body>

<style type="text/css">
    .card {
        width: 18rem;
        border-radius: 10px;
        border: none;
        box-shadow: 10px 4px 10px rgba(0, 0, 0, 0.6);

    }

    img {
        width: 100%;
        border-radius: 10px 10px 0 0;
    }
</style>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 25,
        slidesPerGroup: 1,
        breakpoints: {
            700: {
                slidesPerView: 2,
            },

            970: {
                slidesPerView: 3,
            },
        },
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }


    });
</script>

<?php include "footer.php"; ?>