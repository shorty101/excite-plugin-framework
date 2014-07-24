<?php 
if (!function_exists("Size")) {
    function Size($img_name, $size = "") {
        include "AllowedPlugins.php";
        if (getType($size) === $plugin_type["Size"]) {
            print_r("Enacting Size to " . $size . " on " . $img_name);
        }
    }
}
?>
