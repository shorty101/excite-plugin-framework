<?php 
if (!function_exists("Effect3")) {
    function Effect3($img_name, $torf = false) {
        include "AllowedPlugins.php";
        if (getType($torf) === $plugin_type["Effect3"]) {
            print_r("Enacting Effect3 on " . $img_name);
        }
    }
}
?>
