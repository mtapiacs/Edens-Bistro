<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    <div id="mainCarousel" class="carousel slide mb-3" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item carousel-image active">
                <img src="./img/food-1.jpg" class="d-block w-100" alt="Food close on plate">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item carousel-image">
                <img src="./img/food-2.jpg" class="d-block w-100" alt="More food on table">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
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
            <h2 class="text-center lower-weight">Events</h2>
            <p class="home-info">
                <?php

                //* This Would Be Something From DB
                echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lacus elit, sollicitudin id turpis at, bibendum mattis ex. Fusce mauris orci, luctus in nulla et, mattis eleifend tellus. Nullam odio odio, iaculis eu commodo quis, luctus nec massa. Cras auctor nibh vel vehicula viverra. In aliquet ipsum enim, eu porta sapien iaculis eu. Etiam pellentesque posuere lacus a mollis. Sed quam ante, aliquet vel convallis in, congue eu risus. Pellentesque ut ipsum est. Pellentesque porta enim ut arcu aliquam vehicula. Nunc placerat a arcu eu malesuada. Fusce eget vehicula neque. In et ante vitae ligula lobortis volutpat at eu arcu. Donec gravida arcu et nulla malesuada, a vulputate libero lacinia. Integer tristique, erat a maximus fermentum, massa erat feugiat tortor, in hendrerit velit ipsum tempus neque. Vestibulum sed elementum dolor. ";

                ?>
            </p>
        </div>
        <div class="col-md-4">
            <h2 class="text-center lower-weight">Specials</h2>
            <p class="home-info">
                <?php

                echo " Cras laoreet ullamcorper bibendum. Curabitur ut eros vestibulum, lobortis nunc nec, tristique lacus. Donec suscipit magna quis ipsum scelerisque, cursus suscipit metus commodo. Pellentesque dictum fermentum scelerisque. Fusce tempus mi nisl, non vestibulum eros eleifend in. In lobortis ligula non luctus placerat. Nam id massa euismod, ultrices lorem et, mattis augue. Mauris ut lobortis leo. Vestibulum eleifend bibendum mauris vitae dapibus. Fusce ornare sapien ut urna finibus ornare. Vivamus ac imperdiet lorem. Donec venenatis feugiat urna, at sollicitudin nulla facilisis nec. Nunc vel enim est. Sed non vulputate orci. Aenean elementum eros quis justo facilisis cursus. Vivamus dapibus turpis purus, quis dapibus turpis congue mollis.";

                ?>
            </p>
        </div>
        <div class="col-md-4">
            <h2 class="text-center lower-weight">Info</h2>
            <p class="home-info">
                <?php

                //? Social Platforms / Google Map To Location / Text 
                echo "Nulla iaculis, nulla vitae pretium placerat, purus ligula mattis enim, eget facilisis magna quam at odio. Sed et neque diam. Donec venenatis tortor sed massa gravida laoreet. Praesent at faucibus libero. Vivamus id porta ex. Curabitur condimentum urna quis mi cursus gravida eu et nisi. Nunc condimentum, nibh nec laoreet ultricies, lacus sapien fringilla erat, a pellentesque orci risus ut libero. Sed placerat, odio id ornare dictum, magna tortor pharetra urna, id dapibus quam nibh ut nisl. Sed aliquet lorem sed faucibus blandit. Nullam dolor ex, tincidunt eu consectetur non, pretium vel lorem. Ut mattis, turpis vitae finibus commodo, odio diam iaculis dolor, et feugiat leo lorem sed diam. Nullam quis risus ipsum. In condimentum sem dictum, consectetur ipsum sed, posuere nisi. Maecenas pulvinar ligula libero, ac maximus augue iaculis et.";

                ?>
            </p>
        </div>
    </div>
</main>

<?php
include_once "./includes/footer.php";
?>