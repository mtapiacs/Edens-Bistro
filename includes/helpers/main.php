<?php

function outputSession()
{
    echo "<h2>Session Variable</h2>";

    echo "<hr><h3>Entire Session</h3>";
    var_dump($_SESSION);
    echo "<hr>";

    foreach ($_SESSION as $key => $value) {
        echo "<h4 class='my-3 color-primary '>{$key}</h4>";
        if ($key === "cart") {
            foreach ($value as $itemId => $itemData) {
                echo "<div class='mb-3'>";
                echo "<h5>Item Id: {$itemId}</h5>";
                var_dump($itemData);
                echo "</div>";
            }
        } else {
            var_dump($value);
        }
    }
}
