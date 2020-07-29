<?php

function outputSession()
{
    echo "<h3>Session Variable</h3>";
    echo "<ul>";
    foreach ($_SESSION as $key => $value) {
        echo "<li class='ml-5'>{$key} | {$value}</li>";
    }
    echo "</ul>";
}
