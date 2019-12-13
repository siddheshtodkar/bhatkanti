<script type="text/template" id="happyforms-form-build-template">
	<div class="happyforms-stack-view">
		<div class="customize-control">
			<label for="" class="customize-control-title"><?php _e( 'Title', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
			<input type="text" name="post_title" value="<%= post_title %>" id="happyforms-form-name">
		</div>

		<div class="customize-control">
			<label class="customize-control-title">
				<?php _e( 'Form builder', HAPPYFORMS_TEXT_DOMAIN ); ?>
				<span class="happyforms-parts-expand-collapse-wrap">
					<a href="#" class="button expand-collapse-all <%= ( parts.length > 0 ) ? 'expand' : 'collapse' %>" data-collapse-text="<?php _e( 'Collapse all', HAPPYFORMS_TEXT_DOMAIN ); ?>" data-expand-text="<?php _e( 'Expand all', HAPPYFORMS_TEXT_DOMAIN ); ?>"><%= ( parts.length > 0 ) ? '<?php _e( 'Expand all', HAPPYFORMS_TEXT_DOMAIN ); ?>' : '<?php _e( 'Collapse all', HAPPYFORMS_TEXT_DOMAIN ); ?>' %></a>
				</span>
			</label>
			<div class="happyforms-parts-placeholder">
				<p><b><?php _e( 'Ready to get started?', HAPPYFORMS_TEXT_DOMAIN ); ?></b></p>
				<p><?php _e( 'Click any part from the sidebar to add it to your new form. Then, drag parts into order.', HAPPYFORMS_TEXT_DOMAIN ); ?></p>
				<div class="happyforms-parts-placeholder__placeholder"></div>
				<div class="happyforms-parts-placeholder__placeholder"></div>
				<div class="happyforms-parts-placeholder__placeholder"></div>
			</div>
			<div class="happyforms-form-widgets"></div>
		</div>
	</div>
</script>
