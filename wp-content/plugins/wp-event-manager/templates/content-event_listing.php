<?php
$start_date = get_event_start_date();
$end_date = get_event_end_date();
$event_type = get_event_type();
if(is_array($event_type) && isset($event_type[0]))
	$event_type = $event_type[0]->slug;
	$banner= get_event_banner();
	
	if(is_array($banner) && isset($banner[0]) ) 
		$banner = $banner[0];
	elseif( is_array($banner) && empty($banner)) 
		$banner = ''; 
	else 
		$banner = $banner;
?>
<div class="wpem-event-box-col wpem-col wpem-col-12 wpem-col-md-6 wpem-col-lg-4 "><!----- wpem-col-lg-4 value can be change by admin settings ------->
  <div class="wpem-event-layout-wrapper">
  <div <?php event_listing_class('wpem-event-layout-wrapper'); ?>>
    <a href="<?php display_event_permalink(); ?>" class="wpem-event-action-url event-style-color <?php echo $event_type;?>">
      <div class="wpem-event-banner">
        <div class="wpem-event-banner-img" style="background-image: url('<?php echo $banner  ?>')">

          <!-- Hide in list View // Show in Box View -->
          <?php do_action('event_already_registered_title');?>     
          <div class="wpem-event-date">
            <div class="wpem-event-date-type">
              <?php if(!empty($start_date) ){ ?>
              <div class="wpem-from-date">
                <div class="wpem-date"><?php echo date_i18n( 'd', strtotime($start_date) ); ?></div>
                <div class="wpem-month"><?php echo date_i18n( 'M', strtotime($start_date) ); ?></div>
              </div>
				<?php } ?>
            </div>
          </div>
          <!-- Hide in list View // Show in Box View -->
        </div>
      </div>

      <div class="wpem-event-infomation">
          <div class="wpem-event-date">
            <div class="wpem-event-date-type">
			<?php if(!empty($start_date)) {?>
              <div class="wpem-from-date">
                <div class="wpem-date"><?php echo date_i18n( 'd', strtotime($start_date) ); ?></div>
                <div class="wpem-month"><?php echo date_i18n( 'M', strtotime($start_date) ); ?></div>
              </div>
              <?php } ?>
              <?php if( $start_date != $end_date && !empty($end_date) ){ ?>
              <div class="wpem-to-date">
                <div class="wpem-date-separator">-</div>
                <div class="wpem-date"><?php echo date_i18n( 'd', strtotime($end_date) ); ?></div>
                <div class="wpem-month"><?php echo date_i18n( 'M', strtotime($end_date) ); ?></div>
              </div>
			  <?php } ?>
            </div>
          </div>

          <div class="wpem-event-details">
            <div class="wpem-event-title"><h3 class="wpem-heading-text"><?php echo esc_html( get_the_title() ); ?></h3></div>

            <div class="wpem-event-date-time"><span class="wpem-event-date-time-text"><?php display_event_start_date();?> <?php display_date_time_separator() ?> <?php display_event_start_time();?> -<?php 
              if (isset($start_date) && isset($end_date) && $start_date != $end_date ){
                display_event_end_date();
                display_date_time_separator();
              } 
            ?> <?php display_event_end_time();?></span></div>
            <div class="wpem-event-location"><span class="wpem-event-location-text"><?php if(get_event_location()=='Anywhere' || get_event_location() == ''): echo __('Online Event','wp-event-manager'); else:  display_event_location(false); endif; ?></span></div>
            
            <?php if( get_option( 'event_manager_enable_event_types' ) && get_event_type() ) { ?>
              <div class="wpem-event-type"><?php display_event_type(); ?></div>
            <?php } ?>
            <?php do_action('event_already_registered_title');?>
            
            <!-- Show in list View // Hide in Box View -->
            <?php if(get_event_ticket_option()){  ?>
              <div class="wpem-event-ticket-type" class="wpem-event-ticket-type-text"><span class="wpem-event-ticket-type-text"><?php display_event_ticket_option();?></span></div>
            <?php } ?>
            <!-- Show in list View // Hide in Box View -->
          </div>
      </div>   
    </a>
  </div>
  </div>
</div>