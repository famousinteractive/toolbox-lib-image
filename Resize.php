<?php
namespace App\Libraries\Famous\Image;

use Intervention\Image\Facades\Image;

class Resize
{
	public static $format = ['jpg','png'];

	public static function resize($path, $width = null, $height = null, $keepRatio = true, $preventUpsize = true, $format = null, $cache = true) {

		$fileInfo = self::getFileName($path);

		if(is_null($format)) {
			$fileName = $fileInfo['filename'];
		} else {
			$fileName = $fileInfo['name'] . '.' . $format;
		}

		$finalPath = storage_path('app/public/resized/' . $fileName);

		if( file_exists($finalPath) && time()-filemtime($finalPath) < 3600) {
			return asset('storage/resized/' . $fileName);
		} else {


			$img = Image::make($path);

			$img->resize($width, $height, function ($constraint) use ($keepRatio, $preventUpsize) {

				if ($keepRatio) {
					$constraint->aspectRatio();
				}

				if ($preventUpsize) {
					$constraint->upsize();
				}

			});

			$img->save($finalPath);

			return asset('storage/resized/' . $fileName);
		}

	}

	protected static function getFileName($path) {

		$explodedPath = explode('/', $path);

		$fileName = end($explodedPath);

		$name = substr( $fileName, 0, strpos('.', $fileName));
		$extension = substr($fileName, strpos('.', $fileName));

		return [
			'filename' => $fileName,
			'name'		=> $name,
			'extension'	=> $extension,
		];
	}
}
