<?php
require_once "core/init.php";

$theme_name = isset($_REQUEST['theme_name']) && !empty($_REQUEST['theme_name']) ? strip_tags(str_replace(' ','-',$_REQUEST['theme_name'])) : '';
$files_and_files_details = [
    "functions.php" => [
        "path"      => "themes/$theme_name",
        "content"   => "<?php echo 'functions';"
    ],
    "style.css"     => [
        "path"      => "themes/$theme_name",
        "content"   => "h1{color:red;}"
    ],
    "main.css"     => [
        "path"      => "themes/$theme_name/assets",
        "content"   => "h1{color:red;}"
    ],
    "main.js"       => [
        "path"      => "themes/$theme_name/assets",
        "content"   => "jQuery(function($){})"
    ],
];
if($theme_name && $files_and_files_details){
    theme_generate("themes/$theme_name", $files_and_files_details);
}

// $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme_name), RecursiveIteratorIterator::SELF_FIRST); 
// print_r($files);