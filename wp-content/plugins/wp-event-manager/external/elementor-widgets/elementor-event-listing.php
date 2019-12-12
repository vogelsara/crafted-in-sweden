<?php
namespace WPEventManager\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Event Listing
 *
 * Elementor widget for event lising.
 *
 */
class Elementor_Event_Listing extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'event-listing';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Event Listing', 'wp-event-manager' );
	}
	/**	
	 * Get widget icon.
	 *
	 * Retrieve shortcode widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-list';
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'event-listing', 'code' ];
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'wp-event-manager-categories' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_shortcode',
			[
				'label' => __( 'Event Listing', 'wp-event-manager' ),
			]
		);
	
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Show Pagination', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'false' => __( 'False', 'wp-event-manager' ),
					'true' => __( 'True', 'wp-event-manager' ),
				],
			]
		);

		$this->add_control(
			'per_page',
			[
				'label'       => __( 'Post Per Page', 'wp-event-manager' ),
				'type'        => Controls_Manager::NUMBER,
				'dynamic'     => [
								'active' => true,
				],
				'default'     => '10',
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => __( 'Ascending (ASC)', 'wp-event-manager' ),
					'DESC' => __( 'Descending  (DESC)', 'wp-event-manager' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'event_start_date',
				'options' => [
					'title' => __( 'Title', 'wp-event-manager' ),
					'ID' => __( 'ID', 'wp-event-manager' ),
					'name' => __( 'Name', 'wp-event-manager' ),
					'modified' => __( 'Modified', 'wp-event-manager' ),
					'parent' => __( 'Parent', 'wp-event-manager' ),
					'event_start_date' => __( 'Event Start Date', 'wp-event-manager' ),
					'rand' => __( 'Rand', 'wp-event-manager' ),
				],
			]
		);

		$this->add_control(
			'featured',
			[
				'label' => __( 'Show Featured', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'All Events', 'wp-event-manager' ),
					'false' => __( 'False', 'wp-event-manager' ),
					'true' => __( 'True', 'wp-event-manager' ),
				],
			]
		);
		

		$this->add_control(
			'cancelled',
			[
				'label' => __( 'Show Cancelled', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'All Events', 'wp-event-manager' ),
					'false' => __( 'False', 'wp-event-manager' ),
					'true' => __( 'True', 'wp-event-manager' ),
				],
			]
		);

		$this->add_control(
			'show_filters',
			[
				'label' => __( 'Show Filter', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager' ),
					'true' => __( 'True', 'wp-event-manager' ),
				],
			]
		);
		
		$this->add_control(
			'show_categories',
			[
				'label' => __( 'Category Filter', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager' ),
					'true' => __( 'True', 'wp-event-manager' ),
				],
			]
		);
		
		$this->add_control(
			'show_event_types',
			[
				'label' => __( 'Event Types Filter', 'wp-event-manager' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'false' => __( 'False', 'wp-event-manager' ),
					'true' => __( 'True', 'wp-event-manager' ),
				],
			]
		);

		$this->add_control(
			'location',
			[
				'label'       => __( 'Location', 'wp-event-manager' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Location', 'wp-event-manager' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'keywords',
			[
				'label'       => __( 'Keywords ', 'wp-event-manager' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Keywords ', 'wp-event-manager' ),
				'default'     => '',
			]
		);
		
		$this->add_control(
			'categories',
			[
				'label'       => __( 'Categories ', 'wp-event-manager' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Categories by comma separate', 'wp-event-manager' ),
				'default'     => '',
			]
		);

		$this->add_control(
			'event_types',
			[
				'label'       => __( 'Event Types ', 'wp-event-manager' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Event Types by comma separate', 'wp-event-manager' ),
				'default'     => '',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		
		if(strlen($settings['location'])>0)
		    $location = 'location='.$settings['location'];
	    else
	        $location = '';
	        
        if(strlen($settings['keywords'])>0)
            $keywords = 'keywords='.$settings['keywords'];
        else
            $keywords = '';
            
        if(strlen($settings['categories'])>0)
            $categories = 'categories='.$settings['categories'];
        else
            $categories = '';
            
        if(strlen($settings['event_types'])>0)
            $event_types = 'event_types='.$settings['event_types'];
        else
            $event_types = '';
            
        $shortcode = '[events show_pagination='.$settings["show_pagination"].' per_page='.$settings["per_page"].' order='.$settings["order"].' orderby='.$settings['orderby'].' featured='.$settings['featured'].' cancelled='.$settings['cancelled'].' show_filters='.$settings["show_filters"].' show_categories='.$settings["show_categories"].' show_event_types='.$settings["show_event_types"].' '.$location.' '.$keywords.' '.$categories.' '.$event_types.' ]';
        echo do_shortcode($shortcode);
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @access protected
	 */
	protected function _content_template() {}
}
