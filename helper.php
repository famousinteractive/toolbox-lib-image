<?php

if( !function_exists('resize')) {
	function resize($imagePath, $width = null, $height = null, $keepRatio = true, $preventUpsize = true, $format = null, $cache = true) {
		\App\Libraries\Famous\Image\Resize::resize($imagePath, $width, $height, $keepRatio, $preventUpsize, $format, $cache);
	}
}
