<?php
if ( !class_exists( 'ImageRotationRepair' ) ) {
	class ImageRotationRepair {
		var $orientation_fixed = array();
		public function __construct() {
			add_filter( 'wp_handle_upload_prefilter', array( $this, 'filter_wp_handle_upload_prefilter' ), 10, 1 );
			add_filter( 'wp_handle_upload', array( $this, 'filter_wp_handle_upload' ), 1, 3 );
		}
		public function filter_wp_handle_upload( $file ) {
			$this->fixImageOrientation( $file['file'], $file['type'] );
			return $file;
		}
		public function filter_wp_handle_upload_prefilter( $file ) {
			$suffix = substr( $file['name'], strrpos( $file['name'], '.' ) + 1 );
			switch ( strtolower($suffix) ) {
				case 'jpg':
				case 'jpeg':
					$type = 'image/jpeg';
					break;
				case 'png':
					$type = 'image/png';
					break;
				case 'gif':
					$type = 'image/gif';
					break;
			}
			if ( isset( $type ) ) {
				$this->fixImageOrientation( $file['tmp_name'], $type );
			}
			return $file;
		}
		public function fixImageOrientation( $file, $type ) {
			if ( is_callable('exif_read_data') && !isset( $this->oreintation_fixed[$file] ) ) {
				$exif = @exif_read_data( $file );
				if ( isset($exif) && isset($exif['Orientation']) && $exif['Orientation'] > 1 ) { 
					include_once( ABSPATH . 'wp-admin/includes/image-edit.php' );
					switch ( $exif['Orientation'] ) {
						case 3:
							$orientation = -180;
							break;
						case 6:
							$orientation = -90;
							break;
						case 8:
						case 9:
							$orientation = -270;
							break;
						default:
							$orientation = 0;
							break;
					}
					switch ( $type ) {
						case 'image/jpeg':
							$image = imagecreatefromjpeg( $file );
							break;
						case 'image/png':
							$image = imagecreatefrompng( $file );
							break;
						case 'image/gif':
							$image = imagecreatefromgif( $file );
							break;
						default:
							$image = false;
							break;
					}
					if ($image) { 
						$image = _rotate_image_resource( $image, $orientation );
						switch ( $type ) {
							case 'image/jpeg':
								imagejpeg( $image, $file, apply_filters( 'jpeg_quality', 90, 'edit_image' ) );
								break;
							case 'image/png':
								imagepng($image, $file );
								break;
							case 'image/gif':
								imagegif($image, $file );
								break;
						}
					}
				}
			}
			$this->orientation_fixed[$file] = true;
		}
	}
	new ImageRotationRepair();
}
?>