<?php

if (!function_exists("UpdatePlugins")) {

/**
 * This script removes or adds new plugins when they are added to, removed or deactived from the config file
 */
    function UpdatePlugins() {
        include "AllowedPlugins.php";
        $path = dirname(__FILE__) . "/AppliedImages";
        $dir = new DirectoryIterator($path);
        foreach ($dir as $fileinfo) {
            if (substr($fileinfo->getFileName(), -4) === ".txt") {
                $effects = file_get_contents("AppliedImages/" . $fileinfo->getFileName());
                $effects = json_decode($effects, true);
                if (is_array($effects)) {
                    print_r($effects);
                    foreach ($effects as $plugin => $value) {
                        if (!in_array($plugin, array_keys($plugins)) || $plugins[$plugin] === false) {
                            unset($effects[$plugin]);
                        }
                    }
                    foreach ($plugins as $plugin => $active) {
                        if ($active === true) {
                            if (!in_array($plugin, array_keys($effects))) {
                                $effects[$plugin] = $default_vals[$plugin_type[$plugin]];
                            }
                        }
                    }
                    file_put_contents("AppliedImages/" . $fileinfo->getFileName(), json_encode($effects));
                }
            }
        }
    }
}

UpdatePlugins();

?>
