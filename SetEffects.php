<?php

$file_name = "testimage1";
$effects_list = array(
    "Effect1" => true
);

if (!function_exists("SetEffects")) {
    /**
     * Function call to set the effects for a given image.
     *
     * <pre>
     * Input:
     * $file_name = name of the file you wish to update without extension
     * $effects_list = array of effects and their values
     * </pre>
     */
    function SetEffects($file_name, $effect_list) {
        include "classes/image.php";
        include "AllowedPlugins.php";
        foreach ($plugins as $plugin => $active) {
            if ($active === true) {
                include "Plugins/" . $plugin . ".php";
            }
            if (!in_array($plugin, array_keys($effects_list))) {
                $effects_list[$plugin] = $default_vals[$plugin_type[$plugin]];
            }
        }

        copy("OriginalImages/" . $file_name . ".jpg", "AppliedImages/" . $file_name . ".jpg");

        foreach ($effects_list as $effect => $val) {
            $effect("AppliedImages/" . $file_name . ".jpg", $val);
        }

        $imageNames = array();
        $allImages = array();

        $path = dirname(__FILE__) . "/AppliedImages";
        $dir = new DirectoryIterator($path);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                if (substr($fileinfo->getFileName(), -4) === ".txt") {
                    if (substr($fileinfo->getFileName(), 0, -4) === $file_name) {
                        file_put_contents("AppliedImages/" . $fileinfo->getFileName(), json_encode($effects_list));
                    }
                }
            }
        }
    }
}

SetEffects($file_name, $effects_list);

?>
