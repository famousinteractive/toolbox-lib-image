<?php

if( !function_exists('resize')) {
	/**
	 * @param $imagePath
	 * @param null $width
	 * @param null $height
	 * @param bool $keepRatio
	 * @param bool $preventUpsize
	 * @param null $format
	 * @param bool $cache
	 * @return string
	 */
	function resize($imagePath, $width = null, $height = null, $keepRatio = true, $preventUpsize = true, $format = null, $cache = true) {
		return \App\Libraries\Image\Resize::resize($imagePath, $width, $height, $keepRatio, $preventUpsize, $format, $cache);
	}
}
