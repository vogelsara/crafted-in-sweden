jQuery(document).ready(function() {

	var current_tab = jQuery('.um-account-main').attr('data-current_tab');

	if ( current_tab ) {
		jQuery('.um-account-tab[data-tab="'+current_tab+'"]').show();

		jQuery('.um-account-tab:not(:visible)').find( 'input:not(:disabled)' ).addClass('um_account_inactive').prop( 'disabled', true ).attr( 'disabled', true );
	}

	jQuery( document.body ).on( 'click', '.um-account-side li a', function(e) {
		e.preventDefault();
		var link = jQuery(this);
		
		link.parents('ul').find('li a').removeClass('current');
		link.addClass('current');
		
		var url_ = jQuery(this).attr('href');
		var tab_ = jQuery(this).attr('data-tab');
		
		jQuery('input[id="_um_account_tab"]:hidden').val( tab_ );
		
		window.history.pushState("", "", url_);

		jQuery('.um-account-tab').hide();
		jQuery('.um-account-tab[data-tab="'+tab_+'"]').fadeIn();

		jQuery('.um-account-tab:visible').find( 'input.um_account_inactive:disabled' ).removeClass('um_account_inactive').prop( 'disabled', false ).attr( 'disabled', false );
		jQuery('.um-account-tab:not(:visible)').find( 'input:not(:disabled)' ).addClass('um_account_inactive').prop( 'disabled', true ).attr( 'disabled', true );

		jQuery('.um-account-nav a').removeClass('current');
		jQuery('.um-account-nav a[data-tab="'+tab_+'"]').addClass('current');

		return false;
	});


	jQuery(document.body).on( 'click', '.um-account-nav a', function(e) {
		e.preventDefault();

		var tab_ = jQuery(this).attr('data-tab');
		var div = jQuery(this).parents('div');
		var link = jQuery(this);


		jQuery('input[id="_um_account_tab"]:hidden').val( tab_ );

		jQuery('.um-account-tab').hide();

		if ( link.hasClass('current') ) {
			div.next('.um-account-tab').slideUp();
			link.removeClass('current');
		} else {
			div.next('.um-account-tab').slideDown();
			link.parents('div').find('a').removeClass('current');
			link.addClass('current');
		}

		jQuery('.um-account-tab:visible').find( 'input.um_account_inactive:disabled' ).removeClass('um_account_inactive').prop( 'disabled', false ).attr( 'disabled', false );
		jQuery('.um-account-tab:not(:visible)').find( 'input:not(:disabled)' ).addClass('um_account_inactive').prop( 'disabled', true ).attr( 'disabled', true );

		jQuery('.um-account-side li a').removeClass('current');
		jQuery('.um-account-side li a[data-tab="'+tab_+'"]').addClass('current');

		return false;
	});
});