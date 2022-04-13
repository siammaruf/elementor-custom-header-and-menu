<?php
namespace ELCHM\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;

class ELCHM_Header extends Widget_Base {
	/**
	 * @return string
	 * Define Widget Name
	 */
	public function get_name(): string {
		return 'elementor-custom-header';
	}

	/**
	 * @return string
	 * Define Widget Title
	 */
	public function get_title(): string {
		return esc_html__( 'CA:Elementor Custom Header', 'ELCHM' );
	}

	/**
	 * @return string
	 * Define Widget Icon
	 */
	public function get_icon(): string {
		return 'eicon-site-title';
	}

	/**
	 * @return string[]
	 * Define widget Category
	 */
	public function get_categories(): array {
		return [ 'general' ];
	}

	/**
	 * Define Widget Controllers
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html( 'content', 'ELCHM' ),
				'tab' => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'ca-header-logo',
			[
				'label' => esc_html__('Upload Logo','ELCHM'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src()
				]
			]
		);

		$this->add_control(
			'ca-header-logo-height',
			[
				'label' => esc_html__('Logo max height','ELCHM'),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( 'Auto' , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'ca-header-logo-width',
			[
				'label' => esc_html__('Logo max width','ELCHM'),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( 'Auto' , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'ca-header-logo-padding-top',
			[
				'label' => esc_html__('Padding top','ELCHM'),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( 0 , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'ca-header-lang',
			[
				'label' => esc_html__('Lang Plugin Shortcode','ELCHM'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '' , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'ca-search-placeholder',
			[
				'label' => esc_html__('Search Placeholder','ELCHM'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Search placeholder' , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Define frontend render html
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		load_template( ELCHM_PLUGIN_PATH.'templates/ELCHM-header-part.php',true, array('ELCHM_settings'=>$settings) );
	}
}

