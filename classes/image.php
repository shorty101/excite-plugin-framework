<?php

/**
 * This is the Image class, providing an image object for us to utilise.
 */
class Image {

    /**
     * Holds the address of the original image
     */
    private $originalImage;
    /**
     * Holds the address of the affected image
     */
    private $appliedImage;
    /**
     * Holds the effects on the affected image
     */
    private $effects;

    /**
     * Standard constructor allowing us to load values into the object.
     */
    public function __construct($image_name, $effect_list = null) {
        $this->_originalImage = "OriginalImages/" . $image_name . ".jpg";
        $this->_appliedImage = "AppliedImages/" . $image_name . ".jpg";
        if ($effect_list === null) {
            $this->_effects = array();
        } else {
            $this->_effects = $effect_list;
        }
    }

    /**
     * Standard Get Procedure, allowing us to retrieve object data.
     */
    public function getData() {
        return array(
            "original_image" => $this->_originalImage,
            "applied_image" => $this->_appliedImage,
            "effects" => $this->_effects
        );
    }

    /**
     * Standard Set Procedure, allowing us to change the objects effects.
     */
    public function setEffects($effect_list) {
        foreach ($effect_list as $effect => $value) {
            if ($value !== null) {
                $effect($this->_name, $value);
            }
        }
        $this->_effects = $effect_list;
    }
}

?>
