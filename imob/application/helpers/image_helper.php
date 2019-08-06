<?php 

class Image {

	static public function resize($imgFile,$width,$height,$newFile=null) {
		$CI =& get_instance();

		if ($newFile == null) $newFile = $imgFile;
     	
   /* $config['image_library'] = 'gd2';
		$config['source_image']	= $imgFile;
		$config['new_image']	= $newFile;
		$config['width']	= $width;
		$config['height']	= $height;*/
		$CI->load->library('image_lib');
		$config['image_library'] = 'gd2';
    $config['source_image'] = $imgFile;
    $config['width'] = $width;
    $config['height'] = $height;

    $CI->image_lib->clear();
   	$CI->image_lib->initialize($config);
    $CI->image_lib->resize();
	}

	static public function watermark($imgFile,$logo,$newFile=null) {
		$CI =& get_instance();

		if ($newFile == null) $newFile = $imgFile;


		$config['source_image'] =  $imgFile;
		$config['wm_overlay_path'] = $logo;
		$config['wm_type'] = 'overlay';
		$config['wm_vrt_alignment'] = 'center';
		$config['wm_hor_alignment'] = 'bottom';
		$config['wm_padding'] = '50';

		 $CI->load->library('image_lib', $config);  	

		$CI->image_lib->watermark();

		$CI->image_lib->clear();
	}

	static public function circle($imgFile,$size=0) {
		# test source image
		if (file_exists($imgFile)) {
			$res = is_array($info = getimagesize($imgFile));
		} 
		else $res = false;

		# open image
		if ($res) {
			$w = $info[0];
			$h = $info[1];
			$radius = $w/2;
			switch ($info['mime']) {
				case 'image/jpeg': $src = imagecreatefromjpeg($imgFile);
					break;
				case 'image/gif': $src = imagecreatefromgif($imgFile);
					break;
				case 'image/png': $src = imagecreatefrompng($imgFile);
					break;
				default: 
					$res = false;
			}
		}

		# create corners
		if ($res) {

			/** Deixando a imagem quadrada **/
			if ($w > $h) $w = $h; else $h = $w;
			$radius = $w/2;
			if ($size == 0) $size = $w;

			$src = imagecrop($src, ['x' => 0, 'y' => 0, 'width' => $w, 'height' => $h]);

			$new_image = imagecreatetruecolor($size,$size);		

			imagecopyresized($new_image, $src, 0, 0, 0, 0, $size, $size, $w, $h);

			$h = $w = $size;
			$radius =  $w/2; 

			$src = $new_image;
			/*****/

			$q = 1; # change this if you want
			$radius *= $q;

			# find unique color
			do {
				$r = rand(0, 255);
				$g = rand(0, 255);
				$b = rand(0, 255);
			}
			while (imagecolorexact($src, $r, $g, $b) < 0);

			$nw = $w*$q;
			$nh = $h*$q;

			$img = imagecreatetruecolor($nw, $nh);
			$alphacolor = imagecolorallocatealpha($img, $r, $g, $b, 127);
			imagealphablending($img, false);
			imagesavealpha($img, true);
			imagefilledrectangle($img, 0, 0, $nw, $nh, $alphacolor);

			imagefill($img, 0, 0, $alphacolor);
			imagecopyresampled($img, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);

			imagearc($img, $radius-1, $radius-1, $radius*2, $radius*2, 180, 270, $alphacolor);
			imagefilltoborder($img, 0, 0, $alphacolor, $alphacolor);
			imagearc($img, $nw-$radius, $radius-1, $radius*2, $radius*2, 270, 0, $alphacolor);
			imagefilltoborder($img, $nw-1, 0, $alphacolor, $alphacolor);
			imagearc($img, $radius-1, $nh-$radius, $radius*2, $radius*2, 90, 180, $alphacolor);
			imagefilltoborder($img, 0, $nh-1, $alphacolor, $alphacolor);
			imagearc($img, $nw-$radius, $nh-$radius, $radius*2, $radius*2, 0, 90, $alphacolor);
			imagefilltoborder($img, $nw-1, $nh-1, $alphacolor, $alphacolor);
			imagealphablending($img, true);
			imagecolortransparent($img, $alphacolor);

			# resize image down
			$dest = imagecreatetruecolor($w, $h);
			imagealphablending($dest, false);
			imagesavealpha($dest, true);
			imagefilledrectangle($dest, 0, 0, $w, $h, $alphacolor);
			imagecopyresampled($dest, $img, 0, 0, 0, 0, $w, $h, $nw, $nh);

			# output image
			$res = $dest;
			imagedestroy($src);
			imagedestroy($img);
		}

		header("Content-type: image/png");
		imagepng($res);
	}

	static public function round($imgFile,$radius,$color) {
		/*
		 * Apply Round Corner PHP-GD
		 * http://salman-w.blogspot.com/2009/05/generate-images-with-round-corners-on.html
		 *
		 * Adds rounded corners to the specified image
		 */

		/*
		 * source: path or url of a gif/jpeg/png image -- php fopen url wrapper must be enabled if using url
		 * radius: corner radius in pixels -- default value is 10
		 * colour: corner colour in rgb hex format -- default value is FFFFFF
		 */

		$source = $imgFile;
		//$radius = isset($_GET["radius"]) ? $_GET["radius"] : 10;
		$colour = $color;

		/*
		 * open source image and calculate properties
		 */

		list($source_width, $source_height, $source_type) = getimagesize($source);
		switch ($source_type) {
		    case IMAGETYPE_GIF:
		        $source_image = imagecreatefromgif($source);
		        break;
		    case IMAGETYPE_JPEG:
		        $source_image = imagecreatefromjpeg($source);
		        break;
		    case IMAGETYPE_PNG:
		        $source_image = imagecreatefrompng($source);
		        break;
		}

		/*
		 * create mask for top-left corner in memory
		 */

		$source_image = imagecrop($source_image, ['x' => 0, 'y' => 0, 'width' => $source_width, 'height' => $source_height]);

		$corner_image = imagecreatetruecolor(
		    $radius,
		    $radius
		);

		$clear_colour = imagecolorallocate(
		    $corner_image,
		    0,
		    0,
		    0
		);

		$solid_colour = imagecolorallocate(
		    $corner_image,
		    hexdec(substr($colour, 0, 2)),
		    hexdec(substr($colour, 2, 2)),
		    hexdec(substr($colour, 4, 2))
		);

		imagecolortransparent(
		    $corner_image,
		    $clear_colour
		);

		imagefill(
		    $corner_image,
		    0,
		    0,
		    $solid_colour
		);

		imagefilledellipse(
		    $corner_image,
		    $radius,
		    $radius,
		    $radius * 2,
		    $radius * 2,
		    $clear_colour
		);

		/*
		 * render the top-left, bottom-left, bottom-right, top-right corners by rotating and copying the mask
		 */

		imagecopymerge(
		    $source_image,
		    $corner_image,
		    0,
		    0,
		    0,
		    0,
		    $radius,
		    $radius,
		    100
		);

		$corner_image = imagerotate($corner_image, 90, 0);

		imagecopymerge(
		    $source_image,
		    $corner_image,
		    0,
		    $source_height - $radius,
		    0,
		    0,
		    $radius,
		    $radius,
		    100
		);

		$corner_image = imagerotate($corner_image, 90, 0);

		imagecopymerge(
		    $source_image,
		    $corner_image,
		    $source_width - $radius,
		    $source_height - $radius,
		    0,
		    0,
		    $radius,
		    $radius,
		    100
		);

		$corner_image = imagerotate($corner_image, 90, 0);

		imagecopymerge(
		    $source_image,
		    $corner_image,
		    $source_width - $radius,
		    0,
		    0,
		    0,
		    $radius,
		    $radius,
		    100
		);

		imagecolortransparent(
		    $source_image,
		    $clear_colour
		);

		/*
		 * output the image -- revise this step according to your needs
		 */

		header("Content-type: image/png");
		imagesavealpha($source_image, true); 
		imagepng($source_image);		
	}

}


?>