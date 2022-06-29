<?php 
include 'connectdb.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Card Slider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <div class="container">
        <div class="swiper-container mySwiper my-5 py-5">
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
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <!--  for left and right navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- swiper-bundle -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
        spaceBetween: 30,
        slidesPerGroup: 1,
        breakpoints: {
            768: {
                slidesPerView: 2,
            },

            991: {
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

</html>