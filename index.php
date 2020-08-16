<?php
include_once "./includes/header.php";


$string = file_get_contents("./1-home.json");
$homeObj = json_decode($string, true);

$columnOne = $homeObj["columns"][0];
$columnTwo = $homeObj["columns"][1];
$columnThree = $homeObj["columns"][2];

$carouselItems = $homeObj["carousel"];

?>

<main class="main-container">
    <div id="mainCarousel" class="carousel slide mb-3" data-ride="carousel">
        <div class="carousel-inner">
            <?php

            foreach ($carouselItems as $k => $v) {
                $active = $k === 0 ? 'active' : '';

                $title = $v['title'];
                $content = $v['content'];
                $imgPath = $v['img']["path"];
                $imgAlt = $v["img"]["alt"];

                echo
                    "<div class='carousel-item carousel-image $active'>
                    <img src='$imgPath' class='d-block w-100' alt='$imgAlt'>
                    <div class='carousel-caption d-none d-md-block'>
                        <h5>$title</h5>
                        <p>$content</p>
                    </div>
                </div>";
            }

            ?>
        </div>
        <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h2 class="text-center lower-weight"><?php echo $columnOne['title'] ?></h2>
            <p class="home-info">
                <?php
                echo $columnOne['content'];
                ?>
            </p>
        </div>
        <div class="col-md-4">
            <h2 class="text-center lower-weight"><?php echo $columnTwo['title'] ?></h2>
            <p class="home-info">
                <?php
                echo $columnTwo["content"];
                ?>
            </p>
        </div>
        <div class="col-md-4">
            <h2 class="text-center lower-weight"><?php echo $columnThree['title'] ?></h2>
            <p class="home-info">
                <?php
                echo $columnThree["content"];
                ?>
            </p>
        </div>
    </div>

</main>

<?php
include_once "./includes/footer.php";
?>