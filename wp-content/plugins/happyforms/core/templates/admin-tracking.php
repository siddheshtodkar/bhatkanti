<?php
$tracking = happyforms_get_tracking();
$status = $tracking->get_status();
?>

<div class="wrap">
	<div id="welcome-panel" class="welcome-panel happyforms-welcome-panel">
		<div class="welcome-panel-content">
			<?php if ( 3 === intval( $status['status'] ) ) {
				$tracking->print_template( 'success' );
			} else { ?>
				<h1><?php _e( 'Add your email to complete setup', HAPPYFORMS_TEXT_DOMAIN ); ?>&hellip;</h1>
				<p class="description"><?php _e( 'Let\'s set up HappyForms! Enter your email below to agree to notification and to share some data about your usage with', 'happyforms' ); ?> <a href="https://thethemefoundry.com" target="_blank">thethemefoundry.com</a>.</p>
				<form action="<?php echo esc_attr( $tracking->monitor_action ); ?>" method="post" id="happyforms-tracking">
					<input name="<?php echo esc_attr( $tracking->monitor_email_field ); ?>" type="email" placeholder="<?php _e( 'Email address', HAPPYFORMS_TEXT_DOMAIN ); ?>" required >
					<input name="<?php echo esc_attr( $tracking->monitor_status_field ); ?>" type="hidden" value="active" />
					<button type="submit" class="button button-primary button-hero button-block"><?php _e( 'Allow and set up HappyForms', HAPPYFORMS_TEXT_DOMAIN ); ?></button>
				</form>
			<?php } ?>
		</div>
	</div>

	<?php if ( 2 === $status['status'] ) : ?>
	<p class="welcome-panel-footer"><?php _e( 'Or, skip this step and ', HAPPYFORMS_TEXT_DOMAIN ); ?> <a href="<?php echo happyforms_get_all_form_link(); ?>" id="happyforms-tracking-skip"><?php _e( 'continue', HAPPYFORMS_TEXT_DOMAIN ); ?></a></p>
	<?php endif; ?>
</div>
