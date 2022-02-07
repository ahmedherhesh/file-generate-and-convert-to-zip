<?php
function write_in_files($files_and_files_details = [])
{
    foreach ($files_and_files_details as $file => $details) {
        if (isset($details['path']) && !file_exists($details['path'])) {
            mkdir($details['path']);
            $file = fopen("{$details['path']}/$file", 'w+');
        }else{
            $file = fopen("{$details['path']}/$file", 'w+');
        }
        if ($file) {
            fwrite($file, $details['content']);
            fclose($file);
        }
    }
}
function to_zip($path)
{
    $zip = new ZipArchive;
    $zip_name = time() . '.zip';

    if ($zip->open("uploads/zip/".$zip_name, ZIPARCHIVE::CREATE)) {
        if (is_dir($path)) {
            $zip->addEmptyDir($path);
            foreach (array_diff(scandir($path), ['.', '..']) as $file) {
                if (is_file("$path/$file")) {
                    $zip->addFile("$path/$file", "$path/$file");
                } else {
                    $zip->addEmptyDir("$path/$file");
                    $_path = "$path/$file";
                    foreach (array_diff(scandir($_path), ['.', '..']) as $file) {
                        if (is_file("$_path/$file")) {
                            $zip->addFile("$_path/$file", "$_path/$file");
                        }
                    }
                }
            }
        } else {
        }
        $zip->close();
    }
}
function theme_generate($theme_name, $files_and_files_details = [])
{
    if (!file_exists($theme_name)) {
        mkdir($theme_name);
        write_in_files($files_and_files_details);
        to_zip($theme_name);
    }
}
