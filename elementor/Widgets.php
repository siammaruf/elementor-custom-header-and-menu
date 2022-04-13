<?php
namespace ELCHM\Elementor;

use ELCHM\Elementor\Widgets\ELCHM_Header;
use ELCHM\Elementor\Widgets\ELCHM_Menu;

class Widgets {
	public function __construct() {
		add_action('elementor/init',[ $this,'load_elementor_widgets' ]);
	}

	public function load_elementor_widgets(){
		add_action( 'elementor/widgets/register' , [ $this, 'elementor_widgets_register' ]);
	}

	public function elementor_widgets_register($widgets){
		$widgets->register( new ELCHM_Header() );
		$widgets->register( new ELCHM_Menu() );
	}
}