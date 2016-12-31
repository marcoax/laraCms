<?php

/*

ImgHelper - Paolo Bonacina
Fast image manipulator based on  Intervention Image

Accepted params:
w - Width (integer)
h - Height (integer)
c - Crop type (string: 'fill', 'cover', 'contain' or 'best')
p - Crop position (string: 'top-left', 'top', 'top-right', 'left', 'center', 'right', 'bottom-left', 'bottom', 'bottom-right')
format - encoding format (string: 'jpg', 'png', 'gif', 'bmp', 'dara-url')
q - Quality of jpg and gif files (integer),
e - Wether to echo or not (bool),
a - Wether the supplied path is absolute (bool)
filter - Filters that will be applied to the image after resizing and before encoding
	(Array of key-value pairs. Key is always a string. Values are mixed. Allowed values are as follows
	blur - Integer starting from 0
	brightness - Integer ranging from -100 to +100
	colorize - Array of three integers ranging from -100 to +100
	contrast - Integer ranging from -100 to +100
	gamma - Float (default 1.6)
	greyscale - Anything. This doesn't require a value.
	invert - Anything. This doesn't require a value.
	opacity - Float
	pixelate - Integer starting from 0
	sharpen - Integer starting from 0
	)
*/

namespace App\LaraCms\Tools;

use Image;

/**
 * imgHelper
 */
class ImgHelper
{
	protected $path_repository;
	protected $path_save;
	protected $image_matte;
	protected $cache_time;
	protected $defaults;

	function __construct() {
		$this->path_repository = config('laraCms.admin.path.img_repository');
		$this->path_save = config('laraCms.admin.path.img_save');
		$this->image_matte = config('laraCms.image.image_matte');
		$this->cache_time = config('laraCms.image.cache_time');
		$this->defaults = config('laraCms.image.defaults');
	}

	public static function getInstance() {
		return new self;
	}

	// receives filename
	// returns absolute path to image or placeholder if missing
	private function resolve_path ($file_name, $absolute) {
		if ($absolute) {
			if (@getimagesize($file_name))
		  		return $file_name;
			else
				return $this->path_repository.'placeholder.png';
		}
		else {
			if (file_exists($this->path_repository.$file_name))
				return $this->path_repository.$file_name;
			else
				return $this->path_repository.'placeholder.png';
		}
	}

	// returns default value for argument if missing
	private function arg ($args, $arg_name) {
		return (isset($args[$arg_name]))? $args[$arg_name]: $this->defaults[$arg_name];
	}

	private function open($file_name, $args) {
		return Image::make($this->resolve_path($file_name, $this->arg($args, 'a')));
	}

	// constructs a new filename based on args
	private function make_new_name($src, $args) {
		$new_name = str_replace('.', '_', basename($src));
		$new_name .= (isset($args['w']))? '_'.$args['w']: '_0';
		$new_name .= (isset($args['h']))? '_'.$args['h']: '_0';
		$new_name .= '_'.$this->arg($args, 'c');
		$new_name .= '_'.$this->arg($args, 'q');
		$new_name .= '.'.$this->arg($args, 'format');
		return $new_name;
	}

	// returns the resampled image object
	// if one dimension is missing, the other is calculated automatically, keeping aspect ratio
	private function resample ($obj, $args) {
		$c = $this->arg($args, 'c');
		$p = $this->arg($args, 'p');

		//determine original and final width, height and ratio
		$w_original = $obj->width();
		$h_original = $obj->height();
		$r_original = $w_original/$h_original;
		$w_final = isset($args['w'])? preg_replace('/([A-Za-z])+/', '', $args['w']): null;
		$h_final = isset($args['h'])? preg_replace('/([A-Za-z])+/', '', $args['h']): null;

		if (!$w_final || !$h_final)
			$r_final = $r_original;
		else
			$r_final = $w_final/$h_final;

		if (!$h_final) $h_final = round($w_final/$r_final);
		if (!$w_final) $w_final = round($h_final*$r_final);

		switch ($c) {
			case 'fill':
				$obj->resize($w_final, $h_final);
				break;
			case 'best':
				if ($r_original >= $r_final)
					$obj->resize($w_final, null, function ($constraint) {$constraint->aspectRatio(); });
				else
					$obj->resize(null, $h_final, function ($constraint) {$constraint->aspectRatio(); });
				break;
			case 'contain':
				if ($r_original >= $r_final)
					$obj->resize($w_final, null, function ($constraint) {$constraint->aspectRatio(); });
				else
					$obj->resize(null, $h_final, function ($constraint) {$constraint->aspectRatio(); });
				$obj->resizeCanvas($w_final, $h_final);
				break;
			default:
				$obj->fit($w_final, $h_final, function () {}, $p);
				break;
		}
		return $obj;
	}

	// changes color modes depending on format
	private function setColors($obj, $format, $matte) {
		switch ($format) {
			case 'png': $obj->limitColors(null, 'rgba(0,0,0,0)'); break;
			case 'gif':	$obj->limitColors(256, $matte); break;
			case 'bmp':	$obj->limitColors(256, $matte);	break;
			default: $obj->limitColors(null, $matte); break;
		}
		return $obj;
	}

	// apply filters in sequential order
	private function setFilter($obj, $filter) {
		foreach ($filter as $_filter => $_strenght) {
			switch ($_filter) {
				case 'blur': $obj->blur($_strenght); break;
				case 'brightness': $obj->brightness($_strenght); break;
				case 'colorize': $obj->colorize($_strenght[0], $_strenght[1], $_strenght[2]); break;
				case 'contrast': $obj->contrast($_strenght); break;
				case 'gamma': $obj->gamma($_strenght); break;
				case 'greyscale': $obj->greyscale(); break;
				case 'invert': $obj->invert(); break;
				case 'opacity': $obj->opacity($_strenght); break;
				case 'pixelate': $obj->pixelate($_strenght); break;
				case 'sharpen': $obj->sharpen($_strenght); break;
			}
		}
		return $obj;
	}

	// calculates a new image and returns the path to it
	public function get ($src, $args = array()) {
		$new_name = $this->make_new_name($src, $args);

		// create image object from source
		$obj = $this->open($src, $args);

		// if we are given width or height, resample the image accordingly
		if (isset($args['w']) || isset($args['h']))
			$obj = $this->resample($obj, $args);

		// fiters
		if (isset($args['filter']))
		$obj = $this->setFilter($obj, $args['filter']);

		// manual color conversion
		$obj = $this->setColors($obj, $this->arg($args, 'format'), $this->image_matte);

		// encode by format and quality
		$q = $this->arg($args, 'q');
		$format = $this->arg($args, 'format');

		$obj->encode($format, $q);

		if ($this->arg($args, 'format') == 'data-url') {
			return $obj;
		}
		else {
			// save the generated image;
			$obj->save($this->path_save.$new_name);

			if ($this->arg($args, 'e'))
				echo '/'.$this->path_save.$new_name;
			else
				return '/'.$this->path_save.$new_name;
		}
	}

	// checks if image exists and returns the path to it. creates it anew if not.
	public function get_cached($src, $args = array()) {
		$new_name = $this->make_new_name($src, $args);

		if (file_exists($this->path_save.$new_name))
			return '/'.$this->path_save.$new_name;
		else
			return $this->get($src, $args);
	}
}
