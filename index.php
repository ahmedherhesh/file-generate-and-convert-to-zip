<?php
require_once "core/init.php";
$theme_name = "themes/theme_1";
$files_and_files_details = [
    "functions.php" => [
        "path"      => $theme_name,
        "content"   => "<?php echo 'functions';"
    ],
    "style.css"     => [
        "path"      => $theme_name,
        "content"   => "h1{color:red;}"
    ],
    "main.css"     => [
        "path"      => "$theme_name/assets",
        "content"   => "h1{color:red;}"
    ],
    "main.js"       => [
        "path"      => "$theme_name/assets",
        "content"   => "jQuery(function($){})"
    ],
];
theme_generate($theme_name, $files_and_files_details);

// $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme_name), RecursiveIteratorIterator::SELF_FIRST); 
// print_r($files);