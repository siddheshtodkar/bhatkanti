<?php if ( $index > 0 ): ?></ul></li><?php endif; ?>
<li class="customize-control control-section <?php echo esc_attr( 'happyforms-' . $control['type'] . '-control' ); ?>" id="customize-control-<?php echo $control['id']; ?>">
	<h3 class="accordion-section-title"><?php echo $control['label']; ?></h3>
</li>

<li class="happyforms-style-controls-group">
	<ul>
		<li class="panel-meta customize-info accordion-section">
			<button class="customize-panel-back" tabindex="0">
				<span class="screen-reader-text"><?php _e( 'Back', HAPPYFORMS_TEXT_DOMAIN ); ?></span>
			</button>
			<div class="accordion-section-title">
				<span class="preview-notice"><?php _e( 'You are customizing', HAPPYFORMS_TEXT_DOMAIN ); ?> <strong class="panel-title"><?php echo $control['label']; ?></strong></span>
			</div>
		</li>