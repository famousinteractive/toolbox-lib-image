<?php

if( !function_exists('resize')) {
	function resize($imagePath, $width = null, $height = null, $cache = true) {
		\App\Libraries\Famous\Image\Resize::resize($imagePath, $width, $height, $cache);
	}
}
