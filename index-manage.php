<?php

$isAdminPage = true;

include_once "./includes/header.php";
require "./includes/isAuthenticated.php";

if (isset($_POST['update-index-columns'])) {
    $string = file_get_contents("./1-home.json");
    $homeObj = json_decode($string, true);

    $colAName = $_POST["columnA"];
    $colADesc = $_POST["columnADesc"];
    $colAObj = array("title" => $colAName, "content" => $colADesc);

    $colBName = $_POST["columnB"];
    $colBDesc = $_POST["columnBDesc"];
    $colBObj = array("title" => $colBName, "content" => $colBDesc);

    $colCName = $_POST["columnC"];
    $colCDesc = $_POST["columnCDesc"];
    $colCObj = array("title" => $colCName, "content" => $colCDesc);

    $columnsArray = array($colAObj, $colBObj, $colCObj);
    $carouselArray = "";

    $updatedObj = array("columns" => $columnsArray, "carousel" => $carouselArray);
    $updatedObjEncoded = json_encode($updatedObj);

    $file = fopen('./1-home.json', 'w+');
    // fwrite($file,);
    // fclose($file);
};

if (isset($_POST['add-carousel-item'])) {
    $string = file_get_contents("./1-home.json");
    $homeObj = json_decode($string, true);

    $newTitle = $_POST['newCarouselTitle'];
    $newDesc = $_POST["newCarouselDesc"];
    $newImg = $_POST['newCarouselImg'];
    $newAlt = $_POST['newCarouselImgAlt'];

    $newCarouselItem = array("title" => $newTitle, "content" => $newDesc, "img" => array("path" => $newImg, "alt" => $newAlt));

    array_push($homeObj["carousel"], $newCarouselItem);

    $updatedObjEncoded = json_encode($homeObj);

    $file = fopen('./1-home.json', 'w+');
    fwrite($file, $updatedObjEncoded);
    fclose($file);
}

$string = file_get_contents("./1-home.json");
$homeObj = json_decode($string, true);

$columnOne = $homeObj["columns"][0];
$columnTwo = $homeObj["columns"][1];
$columnThree = $homeObj["columns"][2];

$carouselItems = $homeObj["carousel"];

?>

<main class="main-container">
    <h2 class="page-header mb-4">Manage Index</h2>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <h4 class="text-center">Columns</h4>
        <div class="row w-75 mx-auto">
            <div class="col-4">
                <div class="form-group">
                    <label for="columnA">A Name</label>
                    <input type="text" name="columnA" class="form-control" value="<?php echo $columnOne['title']; ?>">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="columnADesc">A Desc</label>
                    <textarea rows="3" style="resize: none;" name="columnADesc" class="form-control"><?php echo $columnOne['content']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row w-75 mx-auto">
            <div class="col-4">
                <div class="form-group">
                    <label for="columnB">B Name</label>
                    <input type="text" name="columnB" class="form-control" value="<?php echo $columnTwo['title']; ?>">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="columnBDesc">B Desc</label>
                    <textarea rows="3" style="resize: none;" name="columnBDesc" class="form-control"><?php echo $columnTwo['content']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="row w-75 mx-auto">
            <div class="col-4">
                <div class="form-group">
                    <label for="columnC">C Name</label>
                    <input type="text" name="columnC" class="form-control" value="<?php echo $columnThree['title']; ?>">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="columnCDesc">C Desc</label>
                    <textarea rows="3" style="resize: none;" name="columnCDesc" class="form-control"><?php echo $columnThree['content']; ?></textarea>
                </div>
            </div>
        </div>
        <div class="w-25 mx-auto mt-4">
            <button type="submit" name="update-index-columns" class="btn btn-site-main btn-block">Update</button>
        </div>

        <hr>

        <h4 class="text-center">Carousel</h4>
        <div class="row w-75 mx-auto">
            <div class="col-4">
                <div class="form-group">
                    <label for="newCarouselTitle">Title</label>
                    <input type="text" name="newCarouselTitle" class="form-control">
                </div>
                <div class="form-group">
                    <label for="newCarouselDesc">Content</label>
                    <input type="text" name="newCarouselDesc" class="form-control">
                </div>
                <div class="form-group">
                    <label for="newCarouselImg">Img Path</label>
                    <input type="text" name="newCarouselImg" class="form-control">
                </div>
                <div class="form-group">
                    <label for="newCarouselImgAlt">Img Alt</label>
                    <input type="text" name="newCarouselImgAlt" class="form-control">
                </div>
                <button type="submit" class="btn btn-site-main btn-block" name="add-carousel-item">Add Carousel Item</button>
            </div>
            <div class="col-8">
                <?php
                foreach ($carouselItems as $key => $value) {
                    echo "<div class='card w-100 mb-3'>
                    <div class='card-header'>
                        {$value['title']}
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>{$value['content']}</li>
                        <li class='list-group-item'>{$value['img']['path']}</li>
                        <li class='list-group-item'>{$value['img']['alt']}</li>
                    </ul>
                </div>";
                }
                ?>
            </div>
        </div>
    </form>
</main>

<?php
include_once "./includes/footer.php";
?>