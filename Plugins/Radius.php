<?php 
if (!function_exists("Radius")) {
    function Radius($img_name, $pixels = 0) {
        include "AllowedPlugins.php";
        if (getType($pixels) === $plugin_type["Radius"]) {
            print_r("Enacting Radius of " . $pixels . " length on " . $img_name);
        }
    }
}
?>
