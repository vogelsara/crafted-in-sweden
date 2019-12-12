<?php  if ( $register = get_event_registration_method() ) :
	wp_enqueue_script( 'wp-event-manager-event-registration' );
	
	?>
	<div class="event_registration registration">
		<?php do_action( 'event_registration_start', $register ); ?>
		<div class="wpem-event-sidebar-button wpem-registration-event-button">
		<input type="button" class="registration_button wpem-theme-button" value="<?php _e( 'Register for event', 'wp-event-manager' ); ?>" />
		</div>
		<div class="registration_details wpem-register-event-form">
			<?php
				/**
				 * event_manager_registration_details_email or event_manager_registration_details_url hook
				 */
				do_action( 'event_manager_registration_details_' . $register->type, $register );
			?>
		</div>
		<?php do_action( 'event_registration_end', $register ); ?>
	</div>
<?php endif; ?>
