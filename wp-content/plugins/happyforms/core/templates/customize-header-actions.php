<script type="text/template" id="happyforms-customize-header-actions">
	<div id="happyforms-save-button-wrapper" class="customize-save-button-wrapper">
		<button id="happyforms-save-button" class="button-primary button" aria-label="<?php _e( 'Save Form', HAPPYFORMS_TEXT_DOMAIN ); ?>" aria-expanded="false" disabled="disabled" data-text-saved="<?php _e( 'Saved', HAPPYFORMS_TEXT_DOMAIN ); ?>" data-text-default="<?php _e( 'Save Form', HAPPYFORMS_TEXT_DOMAIN ); ?>"><?php _e( 'Save Form', HAPPYFORMS_TEXT_DOMAIN ); ?></button>
	</div>
	<a href="<?php echo esc_url( $wp_customize->get_return_url() ); ?>" id="happyforms-close-link" data-message="<?php _e( 'The changes you made will be lost if you navigate away from this page.', HAPPYFORMS_TEXT_DOMAIN ); ?>">
		<span class="screen-reader-text"><?php _e( 'Close', HAPPYFORMS_TEXT_DOMAIN ); ?></span>
	</a>
</script>
