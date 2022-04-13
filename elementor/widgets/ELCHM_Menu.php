<?php
namespace ELCHM\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

class ELCHM_Menu extends Widget_Base {
	/**
	 * @return string
	 * Define Widget Name
	 */
	public function get_name(): string {
		return 'elementor-custom-menu';
	}

	/**
	 * @return string
	 * Define Widget Title
	 */
	public function get_title(): string {
		return esc_html__( 'CA:Elementor Custom Menu', 'ELCHM' );
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
			'menu_content_section',
			[
				'label' => esc_html( 'Menu Content', 'ELCHM' ),
				'tab' => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'menu_title',
			[
				'label' => esc_html( 'Menu title', 'ELCHM' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'menu_min_height',
			[
				'label' => esc_html( 'Menu minimum height', 'ELCHM' ),
				'type' => Controls_Manager::NUMBER,
				'label_block' => true,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'ca_menu_label',
			[
				'label' => esc_html__('Menu label','ELCHM'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Label' , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'ca_menu_title',
			[
				'label' => esc_html__('Menu title','ELCHM'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'ca_menu_link',
			[
				'label' => esc_html__( 'Menu link', 'ELCHM' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'ELCHM' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'ca_nav_menus',
			[
				'label' => esc_html__( 'Select a nav menu', 'ELCHM' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'select-none',
				'options' => $this->get_nev_menus_arr(),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'ca_most_requested_title',
			[
				'label' => esc_html__('Most Requested title','ELCHM'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Most Requested title here' , 'ELCHM' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'ca_most_requested',
			[
				'label' => esc_html__('Most requested content','ELCHM'),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( '' , 'ELCHM' ),
				'show_label' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Nav List', 'ELCHM' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'ca_menu_label' => esc_html__( 'Menu label #1', 'ELCHM' ),
						'ca_menu_title' => esc_html__( 'Menu Title #1', 'ELCHM' ),
						'ca_most_requested' => esc_html__( 'Most requested content #1', 'ELCHM' ),
						'ca_most_requested_title' => esc_html__( 'Most requested', 'ELCHM' ),
						'ca_nav_menus' => 'select-none',
					],
					[
						'ca_menu_label' => esc_html__( 'Menu label #2', 'ELCHM' ),
						'ca_menu_title' => esc_html__( 'Menu Title #2', 'ELCHM' ),
						'ca_most_requested' => esc_html__( 'Most requested content #2', 'ELCHM' ),
						'ca_most_requested_title' => esc_html__( 'Most requested', 'ELCHM' ),
						'ca_nav_menus' => 'select-none',
					],
				],
				'title_field' => '{{{ ca_menu_label }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		load_template( ELCHM_PLUGIN_PATH.'templates/ELCHM-menu-part.php',true, array('ELCHM_settings'=>$settings) );
	}

	public function get_nev_menus_arr():array{
		$menus = wp_get_nav_menus();
		$nav['select-none'] = esc_html__( 'Select a menu', 'ELCHM' );
		foreach ($menus as $key => $menu){
			$nav[$menu->slug] = esc_html__( $menu->name, 'ELCHM' );
		}
		return $nav;
	}
}