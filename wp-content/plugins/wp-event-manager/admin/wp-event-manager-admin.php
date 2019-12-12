<?php
/*
* Main Admin functions class which responsible for the entire amdin functionality and scripts loaded and files.
*
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * WP_Event_Manager_Admin class.
 */

class WP_Event_Manager_Admin {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */

	public function __construct() {

		include_once( 'wp-event-manager-cpt.php' );

		include_once( 'wp-event-manager-settings.php' );

		include_once( 'wp-event-manager-writepanels.php' );

		include_once( 'wp-event-manager-setup.php' );
		
		include_once( 'wp-event-manager-field-editor.php' );

		$this->settings_page = new WP_Event_Manager_Settings();

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		
		add_action( 'admin_notices', array( $this,'rating_showcase_admin_notice') );
		
		add_action( 'admin_init', array( $this, 'admin_init' ) );

		add_action( 'current_screen', array( $this, 'conditional_includes' ) );
		//add_action( 'in_plugin_update_message-wp-event-manager/wp-event-manager.php', array($this,'wpem_plugin_update_message'), 10, 2 );
	}
	
	
	public function wpem_plugin_update_message( $data, $response ) {
		printf(
				'
<style>
#wp-event-manager-update p:last-child:before{ content:"" }
#wp-event-manager-update .update-message.notice{display: table !important;}
.wpem-plugin-update-notice{display:table-row;}
</style>
<div class="wpem-plugin-update-notice"><span><strong>%s</strong> %s 
<br/><br/>Before upgrading to new version, please do the following things.
				<br/><br/>Update new designed all templates from plugin to your theme side if you have overridden.
				<br/>
<br/>There is no any change in database so no worry about any database related settings or issue but we always recommend to take a backup of your database.
				<br/><br/>Once upgrade core plugin then upgrade all other add ons.</span>
				 </div>',
				__( 'Heads up!', 'wp-event-manager' ),
				__( 'We\'ve updated the plugins with the new design and new content (made huge changes in CSS and All Templates). ', 'wp-event-manager' )
				
				);
	}

	/**
	 * admin_enqueue_scripts function.
	 *
	 * @access public
	 * @return void
	 */

	public function admin_enqueue_scripts() {

		global $wp_scripts;

		$screen = get_current_screen();	

		//main frontend style 	
		wp_enqueue_style( 'event_manager_admin_css', EVENT_MANAGER_PLUGIN_URL . '/assets/css/backend.min.css' );	
	
		if ( in_array( $screen->id, apply_filters( 'event_manager_admin_screen_ids', array( 'edit-event_listing', 'event_listing', 'event_listing_page_event-manager-settings', 'event_listing_page_event-manager-addons' ) ) ) ) 
		{
			$jquery_version = isset( $wp_scripts->registered['jquery-ui-core']->ver ) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.9.2';
			
			wp_enqueue_style( 'jquery-ui-style',EVENT_MANAGER_PLUGIN_URL. '/assets/js/jquery-ui/jquery-ui.min.css', array(), $jquery_version );			

			wp_register_script( 'jquery-tiptip', EVENT_MANAGER_PLUGIN_URL. '/assets/js/jquery-tiptip/jquery.tipTip.min.js', array( 'jquery' ), EVENT_MANAGER_VERSION, true );	

			wp_register_script( 'wp-event-manager-admin-js', EVENT_MANAGER_PLUGIN_URL. '/assets/js/admin.min.js', array( 'jquery', 'jquery-tiptip','jquery-ui-core','jquery-ui-datepicker'), EVENT_MANAGER_VERSION, true );
			wp_localize_script( 'wp-event-manager-admin-js', 'wp_event_manager_admin_js', array(
			
				'i18n_datepicker_format' => WP_Event_Manager_Date_Time::get_datepicker_format(),
				
				'i18n_timepicker_format' => WP_Event_Manager_Date_Time::get_timepicker_format(),
				
				'i18n_timepicker_step' => WP_Event_Manager_Date_Time::get_timepicker_step(),
				
				) );
			wp_enqueue_script('wp-event-manager-admin-js');
			
		}	
		
		wp_register_script( 'wp-event-manager-admin-settings', EVENT_MANAGER_PLUGIN_URL. '/assets/js/admin-settings.min.js', array( 'jquery' ), EVENT_MANAGER_VERSION, true );
		wp_register_script( 'chosen', EVENT_MANAGER_PLUGIN_URL . '/assets/js/jquery-chosen/chosen.jquery.min.js', array( 'jquery' ), '1.1.0', true );
		wp_enqueue_script('chosen');
		wp_enqueue_style( 'chosen', EVENT_MANAGER_PLUGIN_URL . '/assets/css/chosen.css' );
		
		wp_enqueue_style( 'wp-event-manager-jquery-timepicker-css', EVENT_MANAGER_PLUGIN_URL . '/assets/js/jquery-timepicker/jquery.timepicker.min.css');
		wp_register_script( 'wp-event-manager-jquery-timepicker', EVENT_MANAGER_PLUGIN_URL. '/assets/js/jquery-timepicker/jquery.timepicker.min.js', array( 'jquery' ,'jquery-ui-core'), EVENT_MANAGER_VERSION, true );
		wp_enqueue_script( 'wp-event-manager-jquery-timepicker');
	}

	/**
	 * admin_menu function.
	 *
	 * @access public
	 * @return void
	 */

	public function admin_menu() {

		add_submenu_page( 'edit.php?post_type=event_listing', __( 'Settings', 'wp-event-manager' ), __( 'Settings', 'wp-event-manager' ), 'manage_options', 'event-manager-settings', array( $this->settings_page, 'output' ) );

		if ( apply_filters( 'event_manager_show_addons_page', true ) )

			add_submenu_page(  'edit.php?post_type=event_listing', __( 'WP Event Manager Add-ons', 'wp-event-manager' ),  __( 'Add-ons', 'wp-event-manager' ) , 'manage_options', 'event-manager-addons', array( $this, 'addons_page' ) );
	}

	/**
	 * Output addons page
	 */

	public function addons_page() {

		$addons = include( 'wp-event-manager-addons.php' );

		$addons->output();
	}
	
	/**
	 * Show showcase admin notice
	 */
	public function rating_showcase_admin_notice(){
	    
		$showcase = get_option('event_manager_rating_showcase_admin_notices_dismiss', 0);	
	
		if(! $showcase == true )
		{
    	 ?>
        <div class="notice wp-event-manager-notice">
		    <div class="wp-event-manager-notice-logo"><span></span></div>
		    <div class="wp-event-manager-notice-message wp-wp-event-manager-fresh"><?php _e( 'We\'ve noticed you\'ve been using <strong>WP Event Manager</strong> for some time now. we hope you love it! We\'d be thrilled if you could <strong><a href="https://wordpress.org/support/plugin/wp-event-manager/reviews/" target="_blank">give us a nice rating on WordPress.org!</a></strong> Don\'t forget to submit your site to <strong><a href="https://wp-eventmanager.com/showcase/" target="_blank">our showcase</a></strong> and generate more traffic from our site.', 'wp-event-manager' ); ?></div>
		    <div class="wp-event-manager-notice-cta">
		        <a href="https://wp-eventmanager.com/plugins/" target="_blank" class="wp-event-manager-notice-act button-primary"><?php _e('Try Great Add-Ons','wp-event-manager');?></a>
		        <button class="wp-event-manager-notice-dismiss wp-event-manager-dismiss-welcome"><a href="<?php echo esc_url( add_query_arg( 'event-manager-main-admin-dismiss' ,'1' ) ) ?>"><?php _e('Dismiss','wp-event-manager');?></a></span></button>
			</div>
		</div>
        <?php
		}	
  	}

  	/**
	 * Include admin files conditionally.
	 */
	public function conditional_includes() {
		$screen = get_current_screen();
		if ( ! $screen ) {
			return;
		}
		switch ( $screen->id ) {
			case 'options-permalink':
				include 'wp-event-manager-permalink-settings.php';
				break;
		}
	}
	  	
		/**
		 * Ran on WP admin_init hook
		 */
		public function admin_init() {
		    if( ! empty( $_GET[ 'event-manager-main-admin-dismiss']) ){
			    update_option('event_manager_rating_showcase_admin_notices_dismiss', 1);
			}			
		}
}
new WP_Event_Manager_Admin();