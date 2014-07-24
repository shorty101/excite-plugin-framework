<?php

$img_name = "testimage3";
if (!function_exists("PutImage")) {
    /**
     * This is the upload script, you would supply it an image and it would add the original image
     * to the OriginalImages folder and the Same image to the Applied Images Folder, it would also
     * populate an empty effects list for the image.
     *
     * Currently the script is unfinished as an image uploader.
     */
    function PutImage($img_name) {
        include "AllowedPlugins.php";

        /*TODO: Image upload here */
        copy("test/" . $img_name . ".jpg", "OriginalImages/" . $img_name . ".jpg");
        copy("test/" . $img_name . ".jpg", "AppliedImages/" . $img_name . ".jpg");

        $temp_array = array();

        foreach($plugins as $plugin => $active) {
            if ($active) {
                $temp_array[$plugin] = $default_vals[$plugin_type[$plugin]];
            }
        }

        file_put_contents("AppliedImages/" . $img_name. ".txt", json_encode($temp_array));
    }
}

PutImage($img_name);

?>
