<?php
//function scandir_rec($root, $old_string, $new_string)
//{
//    if (!is_dir($root)) {
//        return;
//    }
//
//    $dirs = scandir($root);
//
//    foreach ($dirs as $dir) {
//        if ($dir == '.' || $dir == '..') {
//            continue;
//        }
//        $path = $root . '/' . $dir;
//        if (is_file($path)) {
//
//            $newFile = str_replace($old_string, $new_string, $path);
//            if ($path != $newFile) {
//                rename($path, $newFile);
//            }
//        } else if (is_dir($path)) {
//
//            $newFile = str_replace($old_string, $new_string, $path);
//            if ($path != $newFile) {
//                rename($path, $newFile);
//            }
//            scandir_rec($path, $old_string, $new_string);
//        }
//    }
//}
//
//$old_string = "Offer";
//$new_string = "Permission";
//
//// Presenters
//$root = "./app/Adapters/Presenters/{$new_string}";
//$dir = scandir_rec($root, $old_string, $new_string);
//
//// UseCases
//$root = "./app/Domain/UseCases/{$new_string}";
//$dir = scandir_rec($root, $old_string, $new_string);
//
//// Controllers
//$root = "./app/Http/Controllers/Backend/{$new_string}";
//$dir = scandir_rec($root, $old_string, $new_string);

function recursive_copy($src, $new_string, $old_string, $replaceStrings)
{
    $dir = opendir($src);
    while (($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            $new_name = str_replace($old_string, $new_string, $src . '/' . $file);
            $old_name = $src . '/' . $file;
            if (is_dir($src . '/' . $file)) {
                if (strpos($old_name, $old_string) !== false) {
                    @mkdir($new_name);
                }
                recursive_copy($src . '/' . $file, $new_string, $old_string);
            } else {
                if (strpos($old_name, $old_string) !== false) {
                    copy($src . '/' . $file, $new_name);

                    //read the entire string
                    $str = file_get_contents($new_name);

                    //replace something in the file string - this is a VERY simple example
                    $str = str_replace($replaceStrings[0], $replaceStrings[1], $str);

                    //write the entire string
                    file_put_contents($new_name, $str);
                }
            }

        }
    }
    closedir($dir);
}

$replaceStrings = [
    ['Category', 'Categories', 'category', 'categories'],
    ['Subcategory', 'Subcategories', 'subcategory', 'subcategories']
];
$old_string = "Category";
$new_string = "Subcategory";
$root = "./app";
recursive_copy($root, $new_string, $old_string, $replaceStrings);

$old_string = "Category";
$new_string = "Subcategory";
$root = "./routes";
recursive_copy($root, $new_string, $old_string, $replaceStrings);

$old_string = "categories";
$new_string = "subcategories";
$root = "./resources/views";
recursive_copy($root, $new_string, $old_string, $replaceStrings);
