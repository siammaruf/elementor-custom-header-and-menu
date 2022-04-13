<?php

namespace ELCHM\Includes;

class Admin {
	public function __construct() {
		add_filter( 'upload_mimes', [$this, 'enable_svg_upload'], 10, 1 );
		add_action('admin_head', [$this, 'fix_svg_thumb_display' ]);
	}

	function enable_svg_upload( $upload_mimes ) {
		$upload_mimes['svg'] = 'image/svg+xml';
		$upload_mimes['svgz'] = 'image/svg+xml';
		return $upload_mimes;
	}

	function fix_svg_thumb_display() {
		echo '<style type="text/css">
				td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
				width: 100% !important; 
				height: auto !important; 
				}
			</style>';
	}
}