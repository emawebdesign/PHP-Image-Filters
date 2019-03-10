<?php
/**
  * @version 1.0.0
  * @author  EmaWebDesign <info@emawebdesign.com>
  * @license https://opensource.org/licenses/MIT MIT License
  */

class phpImageFilters {

    var $format = "jpg";
    var $im;

    public function output($filename = NULL) {

        if ($this->format=="png") imagepng($this->im, $filename .'.' .$this->format);
        elseif ($this->format=="jpg") imagejpeg($this->im, $filename .'.' .$this->format);
        elseif ($this->format=="gif") imagegif($this->im, $filename .'.' .$this->format);
        else throw new Exception("Invalid format!");
        imagedestroy($this->im);

    }

    public function setImage($image = NULL) {

        if (file_exists($image)) {

            $file = pathinfo($image);

            if ($file['extension']=="jpg") $this->im = imagecreatefromjpeg($image);
            elseif ($file['extension']=="png") $this->im = imagecreatefrompng($image);
            elseif ($file['extension']=="gif") $this->im = imagecreatefromgif($image);
            else return(false);

        }
        else throw new Exception("File not found!");

    }

    public function sepia() {

        imagefilter($this->im, IMG_FILTER_GRAYSCALE);
		imagefilter($this->im, IMG_FILTER_BRIGHTNESS, -15);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -25);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 50, 30, -10);

    }

    public function janus() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, 50);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -20);

    }

    public function oberon() {

        imagefilter($this->im, IMG_FILTER_CONTRAST, -30);

    }

    public function hydra() {

        $gaussian = array(
            array(1.0, 1.0, 1.0),
            array(1.0, -7.0, 1.0),
            array(1.0, 1.0, 1.0)
        );
        imageconvolution($this->im, $gaussian, 1, 4);

    }

    public function mimas() {

        $gaussian = array(
            array(-2.0, -2.0, 0.0),
            array(-1.0, 2.0, 1.0),
            array(0.0, 1.0, 2.0)
        );
    
        imageconvolution($this->im, $gaussian, 1, 5);

    }

    public function titan() {

        imagefilter($this->im, IMG_FILTER_MEAN_REMOVAL);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -40);

    }

    public function deimos() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, 15);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 100, 40, 0, 15);

    }

    public function draco() {

        imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 65, 0, 40);

    }

    public function hyperion() {

        imagefilter($this->im, IMG_FILTER_CONTRAST, -40);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 30, 25, 20);

    }

    public function gray() {

        imagefilter($this->im, IMG_FILTER_CONTRAST, -50);
		imagefilter($this->im, IMG_FILTER_GRAYSCALE);

    }

    public function sunburst() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, 0);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -35);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 70, 60, 30);

    }

    public function blackandwhite() {

        imagefilter($this->im, IMG_FILTER_GRAYSCALE);
		imagefilter($this->im, IMG_FILTER_BRIGHTNESS, 15);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -25);

    }

    public function blur() {

        imagefilter($this->im, IMG_FILTER_SELECTIVE_BLUR);
		imagefilter($this->im, IMG_FILTER_GAUSSIAN_BLUR);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -30);
		imagefilter($this->im, IMG_FILTER_SMOOTH, -5);

    }

    public function vintage() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, 15);
		imagefilter($this->im, IMG_FILTER_GRAYSCALE);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 55, 20, -10);

    }

    public function andromeda() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, -15);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -4);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 70, 0, 55);

    }

    public function tethys() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, -25);
		imagefilter($this->im, IMG_FILTER_CONTRAST, -7);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 40, 35, 0);

    }

    public function umbriel() {

        imagefilter($this->im, IMG_FILTER_CONTRAST, -6);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 25, 0, 70, 65);

    }

    public function moon() {

        imagefilter($this->im, IMG_FILTER_CONTRAST, 6);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 70, 25, 45, 55);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 50, 50, 90);
		imagefilter($this->im, IMG_FILTER_SELECTIVE_BLUR);

    }

    public function pinky() {

        imagefilter($this->im, IMG_FILTER_COLORIZE, 150, 0, 0, 60);
		imagefilter($this->im, IMG_FILTER_NEGATE);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 65, 0, 60);
		imagefilter($this->im, IMG_FILTER_NEGATE);
		imagefilter($this->im, IMG_FILTER_GAUSSIAN_BLUR);

    }

    public function frozen() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, -20);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 0, 110, 40);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 0, 110, 55);
		imagefilter($this->im, IMG_FILTER_GAUSSIAN_BLUR);

    }

    public function callisto() {

        imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 0, 140, 40);
		imagefilter($this->im, IMG_FILTER_NEGATE);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 0, 140, 40);
		imagefilter($this->im, IMG_FILTER_NEGATE);
		imagefilter($this->im, IMG_FILTER_SMOOTH, 20);

    }

    public function elara() {

        imagefilter($this->im, IMG_FILTER_GAUSSIAN_BLUR);
		imagefilter($this->im, IMG_FILTER_MEAN_REMOVAL);
		imagefilter($this->im, IMG_FILTER_NEGATE);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 0, 70, 60, 55);
		imagefilter($this->im, IMG_FILTER_NEGATE);
		imagefilter($this->im, IMG_FILTER_SMOOTH, 20);

    }

    public function triton() {

        imagefilter($this->im, IMG_FILTER_COLORIZE, 90, 25, -40, 25);
		imagefilter($this->im, IMG_FILTER_SMOOTH, 20);
		imagefilter($this->im, IMG_FILTER_BRIGHTNESS, -15);
		imagefilter($this->im, IMG_FILTER_CONTRAST, 15);
		imagegammacorrect($this->im, 1, 1.2 );

    }

    public function darken() {

        imagefilter($this->im, IMG_FILTER_GRAYSCALE);
		imagefilter($this->im, IMG_FILTER_BRIGHTNESS, -55);

    }

    public function retro() {

        imagefilter($this->im, IMG_FILTER_GRAYSCALE);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 100, 30, 30, 45);

    }

    public function thebe() {

        imagefilter($this->im, IMG_FILTER_BRIGHTNESS, -25);
		imagefilter($this->im, IMG_FILTER_COLORIZE, 40, 45, 40, 45);
		imagegammacorrect($this->im, 1, 0.3);

    }

}